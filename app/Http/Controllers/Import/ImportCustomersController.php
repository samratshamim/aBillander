<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Customer;
use App\Address;

use Excel;

class ImportCustomersController extends Controller
{
/*
   use BillableTrait;

   protected $customer, $customerOrder, $customerOrderLine;

   public function __construct(Customer $customer, CustomerOrder $customerOrder, CustomerOrderLine $customerOrderLine)
   {
        $this->customer = $customer;
        $this->customerOrder = $customerOrder;
        $this->customerOrderLine = $customerOrderLine;
   }
*/
    public static $table = 'customers';

    public static $column_mask;		// Column fields (?)

//    public $entities = array();	// This controller is for ONE entity

    public $available_fields = array();

    public $required_fields = array();

//    public $cache_image_deleted = array();

    public static $default_values = array();
/*
    public static $validators = [];
*/
    public $separator = ';';

    public $multiple_value_separator = ',';


// //////////////////////////////////////////////////// //   

   protected $customer;
   protected $address;

   public function __construct(Customer $customer, Address $address)
   {
        $this->customer = $customer;
        $this->address  = $address;
   }


    /**
     * Import a file of the resource.
     *
     * @return 
     */
    public function import()
    {
        return view('imports.customers');
/*
		$country = $this->country->findOrFail($id);
		
		return view('countries.edit', compact('country'));

        $customer_orders = $this->customerOrder
                            ->with('customer')
                            ->with('currency')
                            ->with('paymentmethod')
                            ->orderBy('id', 'desc')->get();

        return view('customer_orders.index', compact('customer_orders'));
*/        
    }

    public function process(Request $request)
    {
        $extra_data = [
            'extension' => ( $request->file('data_file') ? 
                             $request->file('data_file')->getClientOriginalExtension() : 
                             null 
                            ),
        ];

        $rules = [
                'data_file' => 'required | max:8000',
                'extension' => 'in:csv,xlsx,xls,ods', // all working except for ods
        ];

        $this->validate($request->merge( $extra_data ), $rules);

/*
        $data_file = $request->file('data_file');

        $data_file_full = $request->file('data_file')->getRealPath();   // /tmp/phpNJt6Fl

        $ext    = $data_file->getClientOriginalExtension();
*/

/*
        abi_r($data_file);
        abi_r($data_file_full);
        abi_r($ext, true);
*/

/*
        \Validator::make(
            [
                'document' => $data_file,
                'format'   => $ext
            ],[
                'document' => 'required',
                'format'   => 'in:csv,xlsx,xls,ods' // all working except for ods
            ]
        )->passOrDie();
*/

        // Avaiable fields
        // https://www.youtube.com/watch?v=STJV2hTO1Zs&t=4s
        // $columns = \DB::getSchemaBuilder()->getColumnListing( self::$table );

//        abi_r($columns);


        

        // Start Logger
        $logger = \App\ActivityLogger::setup( 'Import Customers', __METHOD__ );        // 'Import Customers :: ' . \Carbon\Carbon::now()->format('Y-m-d H:i:s')


        $logger->empty();
        $logger->start();

        $file = $request->file('data_file')->getClientOriginalName();   // . '.' . $request->file('data_file')->getClientOriginalExtension();

        $logger->log("INFO", 'Se cargarán los Clientes desde el Fichero: <br /><span class="log-showoff-format">{file}</span> .', ['file' => $file]);



        $truncate = $request->input('truncate', 0);
        $params = ['simulate' => $request->input('simulate', 0)];

        // Truncate table
        if ( $truncate > 0 ) {

            $nbr = Customer::count();
            
            Customer::truncate();

            // SELECT * FROM `addresses` where `addressable_type`='App\\Customer'

            // Soft-deleting...We dont want thies here!
            // $this->address->where('addressable_type', 'App\\Customer')->delete();

            // $collection = Address::where('addressable_type', "App\\Customer")->get(['id']);
            // Address::destroy($collection->toArray());

            \DB::table('addresses')->where('addressable_type', "App\\Customer")->delete();

            // Note: This solution is for resetting the auto_increment of the table without truncating the table itself
            $max = \DB::table('addresses')->max('id') + 1; 
            \DB::statement("ALTER TABLE addresses AUTO_INCREMENT = $max");

            $logger->log("INFO", "Se han borrado todos los Clientes antes de la Importación. En total {nbr} Clientes.", ['nbr' => $nbr]);
        }


        try{
            
            $this->processFile( $request->file('data_file'), $logger, $params );

        }
        catch(\Exception $e){

                $logger->log("ERROR", "Se ha producido un error:<br />" . $e->getMessage());

        }


        $logger->stop();


        return redirect('activityloggers/'.$logger->id)
                ->with('success', l('Se han cargado los Clientes desde el Fichero: <strong>:file</strong> .', ['file' => $file]));


//        abi_r('Se han cargado: '.$i.' productos');



        // See: https://www.google.com/search?client=ubuntu&channel=fs&q=laravel-excel+%22Serialization+of+%27Illuminate%5CHttp%5CUploadedFile%27+is+not+allowed%22&ie=utf-8&oe=utf-8
        // https://laracasts.com/discuss/channels/laravel/serialization-of-illuminatehttpuploadedfile-is-not-allowed-on-queue

        // See: https://github.com/LaravelDaily/Laravel-Import-CSV-Demo/blob/master/app/Http/Controllers/ImportController.php
        // https://www.youtube.com/watch?v=STJV2hTO1Zs&t=4s
/*
        Excel::filter('chunk')->load('file.csv')->chunk(250, function($results)
        {
                foreach($results as $row)
                {
                    // do stuff
                }
        });

        Excel::filter('chunk')->load(database_path('seeds/csv/users.csv'))->chunk(250, function($results) {
            foreach ($results as $row) {
                $user = User::create([
                    'username' => $row->username,
                    // other fields
                ]);
            }
        });
*/
        // See: https://www.youtube.com/watch?v=z_AhZ2j5sI8  Modificar datos importados
    }


    /**
     * Process a file of the resource.
     *
     * @return 
     */
    protected function processFile( $file, $logger, $params = [] )
    {

        // 
        // See: https://www.youtube.com/watch?v=rWjj9Slg1og
        // https://laratutorials.wordpress.com/2017/10/03/how-to-import-excel-file-in-laravel-5-and-insert-the-data-in-the-database-laravel-tutorials/
        Excel::filter('chunk')->load( $file )->chunk(250, function ($reader) use ( $logger, $params )
        {
            
 /*           $reader->each(function ($sheet){
                // ::firstOrCreate($sheet->toArray);
                abi_r($sheet);
            });

            $reader->each(function($sheet) {
                // Loop through all rows
                $sheet->each(function($row) {
                    // Loop through all columns
                });
            });
*/

// Process reader STARTS

            if ( $params['simulate'] > 0 ) 
                $logger->log("WARNING", "Modo SIMULACION. Se mostrarán errores, pero no se cargará nada en la base de datos.");

            $i = 0;
            $i_ok = 0;
            $max_id = 2000;


            if(!empty($reader) && $reader->count()) {

                
                // Customer::unguard();        
                        

                foreach($reader as $row)
                {
                    // do stuff
                    if ($i > $max_id) break;

                    // Prepare data
                    $data = $row->toArray();

                    $item = '[<span class="log-showoff-format">'.$data['reference_external'].'</span>] <span class="log-showoff-format">'.$data['name_fiscal'].'</span>';

                    // Some Poor Man checks:
                    if ( strlen( $data['name_fiscal'] ) > 128 )
                            $logger->log("ERROR", "Cliente ".$item.":<br />" . "El campo 'name_fiscal' es demasiado largo (128). ".$data['name_fiscal']);

                    if ( strlen( $data['name_commercial'] ) > 64 )
                            $logger->log("ERROR", "Cliente ".$item.":<br />" . "El campo 'name_commercial' es demasiado largo (64). ".$data['name_commercial']);

                    if ( $data['identification'] )
                    {
                        $data['identification'] = Customer::normalize_spanish_nif_cif_nie( $data['identification'] );
                        
                        // if ( Customer::check_spanish_nif_cif_nie( $data['identification'] ) <= 0 )
                        //    $logger->log("ERROR", "Cliente ".$item.":<br />" . "El campo 'identification' es inválido. ".$data['identification']);
                    }
/*
                    $data['reference_external'] = intval( $data['reference_external'] );
                    $data['id'] = $data['reference_external'];
                    if ( $data['reference_external'] <= 0 ) {
                        $data['reference_external'] = '';
                        unset( $data['id'] );
                    }
*/
                    // 'webshop_id'
                    $data['webshop_id'] = '';
                    $reference_external = intval( $data['reference_external'] );
                    if ( $reference_external > 50000 ) 
                        $data['webshop_id'] = $reference_external - 50000;

                    $data['notes'] = $data['notes'] ?? '';

                    if ( strlen( $data['address1'] ) > 128 )
                    {
                            $data['notes'] .= "\n" . $data['address1'];

                            $logger->log("ERROR", "Cliente ".$item.":<br />" . "El campo 'address1' es demasiado largo (128). ".$data['address1']);
                    }

                    if ( strlen( $data['firstname'] ) > 32 )
                    {
                            $data['notes'] .= "\n" . $data['firstname'];

                            $logger->log("ERROR", "Cliente ".$item.":<br />" . "El campo 'firstname' es demasiado largo (32). ".$data['firstname']);
                    }

                    if ( strlen( $data['lastname'] ) > 32 )
                    {
                            $data['notes'] .= "\n" . $data['lastname'];

                            $logger->log("ERROR", "Cliente ".$item.":<br />" . "El campo 'lastname' es demasiado largo (32). ".$data['lastname']);
                    }

                    if ( strlen( $data['email'] ) > 128 )
                    {
                            $data['notes'] .= "\n" . $data['email'];

                            $logger->log("ERROR", "Cliente ".$item.":<br />" . "El campo 'email' es demasiado largo (128). ".$data['email']);
                    }

                    if ( strlen( $data['phone'] ) > 32 )
                    {
                            $data['notes'] .= "\n" . $data['phone'];

                            $logger->log("ERROR", "Cliente ".$item.":<br />" . "El campo 'phone' es demasiado largo (32). ".$data['phone']);
                    }

                    if ( strlen( $data['phone_mobile'] ) > 32 )
                    {
                            $data['notes'] .= "\n" . $data['phone_mobile'];

                            $logger->log("ERROR", "Cliente ".$item.":<br />" . "El campo 'phone_mobile' es demasiado largo (32). ".$data['phone_mobile']);
                    }


                    if ( $data['country'] != 'ESPAÑA' )
                    {
                            $data['country_id'] =$data['country'];
/*
                            $data['country_name'] = $data['country'];
                            $data['state_name']   = $data['state_id'];

                            $data['country_id'] = null;
                            $data['state_id']   = null;

                            $logger->log("ERROR", "Cliente ".$item.":<br />" . "El campo 'country' es inválido: " . $data['country']);
*/
                            // continue;
                    } else {
                            $data['country_id'] = 1;
                    }

                    $data['alias'] = l('Main Address', [],'addresses');

                    $data['outstanding_amount_allowed'] = \App\Configuration::get('DEF_OUTSTANDING_AMOUNT');


                    if ( $data['notes'] )
                    {
                        $data['notes'] = trim( $data['notes'] );

                        $logger->log("WARNING", "Cliente ".$item.":<br />" . "El campo 'notes' es: " . $data['notes']);
                    }


                    // http://fideloper.com/laravel-database-transactions
                    // https://stackoverflow.com/questions/45231810/how-can-i-use-db-transaction-in-laravel


                    \DB::beginTransaction();
                    try {
                        if ( !($params['simulate'] > 0) ) 
                        {
                            // Create Customer
                            // $product = $this->product->create( $data );
    //                        $customer = $this->customer->storeOrUpdate( [ 'reference_external' => $data['reference_external'] ], $data );
                            $customer = new Customer;
                            $customer = $customer->fill($data);
                            if ( isset($data['id']) ) $customer->id = $data['id'];
                            else unset( $customer->id );
                            $customer->save();

                            // $logger->log("TIMER", " Se ha creado el Cliente: ".$item." - " . $customer->id);

                            unset( $data['webshop_id'] );

                            $address = $this->address->create($data);
                            $customer->addresses()->save($address);

                            $customer->update(['invoicing_address_id' => $address->id, 'shipping_address_id' => $address->id]);

                        }

                        $i_ok++;

                    }
                    catch(\Exception $e) {

                            \DB::rollback();

                            $item = '[<span class="log-showoff-format">'.$data['reference_external'].'</span>] <span class="log-showoff-format">'.$data['name_fiscal'].'</span>';

                            $logger->log("ERROR", "Se ha producido un error al procesar el Cliente ".$item.":<br />" . $e->getMessage());

                    }

                    // If we reach here, then
                    // data is valid and working.
                    // Commit the queries!
                    \DB::commit();

                    $i++;

                }   // End foreach


                // Customer::reguard();


            } else {

                // No data in file
                $logger->log('WARNING', 'No se encontraton datos de Clientes en el fichero.');
            }

            $logger->log('INFO', 'Se han creado / actualizado {i} Clientes.', ['i' => $i_ok]);

            $logger->log('INFO', 'Se han procesado {i} Clientes.', ['i' => $i]);

// Process reader          
    
        }, false);      // should not queue $shouldQueue

    }
}