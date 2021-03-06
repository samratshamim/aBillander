<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Product as Product;
use Form, DB;

use App\Events\ProductCreated;

class ProductsController extends Controller {


   protected $product;

   public function __construct(Product $product)
   {
        $this->product = $product;
   }
   
    /**
     * Display a listing of the resource.
     *
     */

    public function indexQueryRaw(Request $request)
    {
        return $this->product
                              ->filter( $request->all() )
                              ->with('measureunit')
                              ->with('combinations')                                  
                              ->with('category')
                              ->with('tax')
                              ->orderBy('reference', 'asc');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $products = $this->indexQueryRaw( $request )
//                         ->isManufactured()
                        ;

//        abi_r($products->toSql(), true);

        $products = $products->paginate( \App\Configuration::get('DEF_ITEMS_PERPAGE') );

        // abi_r($products, true);

        $products->setPath('products');     // Customize the URI used by the paginator

        return view('products.index', compact('products'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // if ( !( $request->input('cost_average') > 0 ) ) $request->merge( ['cost_average' => $request->input('cost_price')] );

        $action = $request->input('nextAction', '');

        $rules = Product::$rules['create'];

        if ( \App\Configuration::get('PRICES_ENTERED_WITH_TAX') )
            unset($rules['price']);
        else 
            unset($rules['price_tax_inc']);

        $this->validate($request, $rules);

        $tax = \App\Tax::find( $request->input('tax_id') );
        if ( \App\Configuration::get('PRICES_ENTERED_WITH_TAX') ){
            $price = $request->input('price_tax_inc')/(1.0+($tax->percent/100.0));
            $request->merge( ['price' => $price] );
        } else {
            $price_tax_inc = $request->input('price')*(1.0+($tax->percent/100.0));
            $request->merge( ['price_tax_inc' => $price_tax_inc] );
        }

        // If sequences are used:
        //
        // $product_sequences = \App\Sequence::listFor(\App\Product::class);

        // Create Product
        $product = $this->product->create($request->all());


        // Event
        // event( new ProductCreated(), $data );

/*
        // Stock Movement
        if (0)
        if ($request->input('quantity_onhand')>0) 
        {
            // Create stock movement (Initial Stock)
            $data = [   'date' =>  \Carbon\Carbon::now(), 
                        'document_reference' => '', 
                        'price' => $request->input('price'), 
    //                    'price_tax_inc' => $request->input('price_tax_inc'), 
                        'quantity' => $request->input('quantity_onhand'),  
                        'notes' => '',
                        'product_id' => $product->id, 
                        'currency_id' => \App\Context::getContext()->currency->id, 
                        'conversion_rate' => \App\Context::getContext()->currency->conversion_rate, 
                        'warehouse_id' => $request->input('warehouse_id'), 
                        'movement_type_id' => 10,
                        'model_name' => '', 'document_id' => 0, 'document_line_id' => 0, 'combination_id' => 0, 'user_id' => \Auth::id()
            ];
    
            // Initial Stock
            $stockmovement = \App\StockMovement::create( $data );
    
            // Stock movement fulfillment (perform stock movements)
            $stockmovement->process();
        }


        // Prices according to Price Lists
        if (0) {
        $plists = \App\PriceList::get();

        foreach ($plists as $list) {

            $price = $list->calculatePrice( $product );
            // $product->pricelists()->attach($list->id, array('price' => $price));
            $line = \App\PriceListLine::create( [ 'product_id' => $product->id, 'price' => $price ] );

            $list->pricelistlines()->save($line);
        }
        }
*/

        if ($action == 'completeProductData')
        return redirect('products/'.$product->id.'/edit')
                ->with('success', l('This record has been successfully created &#58&#58 (:id) ', ['id' => $product->id], 'layouts') . $request->input('name'));
        else
        return redirect('products')
                ->with('success', l('This record has been successfully created &#58&#58 (:id) ', ['id' => $product->id], 'layouts') . $request->input('name'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return $this->edit($id);
    }
   
    /**
     * Display a listing of the resource.
     *
     */

    public function editQueryRaw()
    {
        return $this->product
                        ->with('tax')
                        ->with('warehouses')
                        ->with('combinations')
                        ->with('combinations.options')
                        ->with('combinations.options.optiongroup')
                        ->with('measureunit')
                        ->with('pricelists');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->editQueryRaw()
//                        ->isManufactured()
                        ->findOrFail($id);

        
        // BOMs
        $bom = $product->bom();

        
        // Gather Attributte Groups
        $groups = array();

        if ( $product->combinations->count() )
        {
            foreach ($product->combinations as $combination) {
                foreach ($combination->options as $option) {
                    $groups[$option->optiongroup->id]['name'] = $option->optiongroup->name;
                    $groups[$option->optiongroup->id]['values'][$option->optiongroup->id.'_'.$option->id] = $option->name;
                }
            }
        } else {
            $groups = \App\OptionGroup::has('options')->orderby('position', 'asc')->pluck('name', 'id');
        }

        
        // Price Lists
        // See: https://stackoverflow.com/questions/44029961/laravel-search-relation-including-null-in-wherehas
        $pricelists = $product->pricelists; //  \App\PriceList::with('currency')->orderBy('id', 'ASC')->get();

        return view('products.edit', compact('product', 'bom', 'groups', 'pricelists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
 /*   {
        $product = Product::findOrFail($id);

        if ( isset(Product::$rules['main_data']['reference']) ) Product::$rules['main_data']['reference'] .= $product->id;

        // ToDo: reference should be '' for products with combinations (not required, not unique)
        $this->validate($request, Product::$rules[ $request->input('tab_name') ]);

        $product->update($request->all());

        return redirect('products')
                ->with('success', l('This record has been successfully updated &#58&#58 (:id) ', ['id' => $id], 'layouts') . $request->input('name'));
    } */
    {
        $product = Product::findOrFail($id);

        $rules_tab = $request->input('tab_name', 'main_data');

        if (  $rules_tab == 'detach_bom' ) {
            //
            $bomItem = $product->bomitem(); 

            $bomItem->delete();

            return redirect('products/'.$id.'/edit'.'#'.'manufacturing')
                    ->with('success', l('This record has been successfully updated &#58&#58 (:id) ', ['id' => $id], 'layouts') . $product->name);
        }

        if (  $rules_tab == 'bom_selector' ) {
            //
//            abi_r($request->all(), true);
            $this->validate($request, \App\BOMItem::$rules);

            \App\BOMItem::create($request->all() + ['product_id' => $id]);

            return redirect('products/'.$id.'/edit'.'#'.'manufacturing')
                    ->with('success', l('This record has been successfully updated &#58&#58 (:id) ', ['id' => $id], 'layouts') . $product->name);
        }

        if (  $rules_tab == 'bom_create' ) {
            //
//            abi_r($request->all(), true);
//            $this->validate($request, \App\BOMItem::$rules);

            $bom = \App\ProductBOM::create($request->all());

            \App\BOMItem::create($request->all() + ['product_bom_id' => $bom->id]);

            return redirect('productboms/'.$bom->id.'/edit')
                    ->with('success', l('Complete la Lista de Materiales para el Producto &#58&#58 (:id) ', ['id' => $product->id], 'layouts') . $product->name);
        }

//        if ( $rules_tab == 'main_data' ) $rules_tab = 'create';

        $vrules = Product::$rules[ $rules_tab ];

        if ( $product->reference == $request->input('reference')) unset($vrules['reference']);
//        if ( isset($vrules['reference']) ) $vrules['reference'] .= $product->id;

        if ($request->input('tab_name') == 'sales') {
            if ( \App\Configuration::get('PRICES_ENTERED_WITH_TAX') )
                unset($vrules['price']);
            else 
                unset($vrules['price_tax_inc']);
        }

        if ($product->product_type == 'combinable') 
        {
            // Remove reference field
            $request->merge(array('reference' => ''));
            $request->merge(array('ean13' => ''));
            unset( $vrules['reference'] );
            unset( $vrules['ean13'] );
            if ( isset($vrules['reference']) ) 
                unset( $vrules['reference'] );
        }

        $this->validate($request, $vrules);

        if ($request->input('tab_name') == 'sales') {
            $tax = \App\Tax::find( $product->tax_id );
            if ( \App\Configuration::get('PRICES_ENTERED_WITH_TAX') ){
                $price = $request->input('price_tax_inc')/(1.0+($tax->percent/100.0));
                $request->merge( ['price' => $price] );
            } else {
                $price_tax_inc = $request->input('price')*(1.0+($tax->percent/100.0));
                $request->merge( ['price_tax_inc' => $price_tax_inc] );
            }
        }

        $product->update($request->all());

        // ToDo: update combination fields, such as measure_unit, quantity_decimal_places, etc.

        return redirect('products/'.$id.'/edit'.'#'.$request->input('tab_name'))
                ->with('success', l('This record has been successfully updated &#58&#58 (:id) ', ['id' => $id], 'layouts') . $product->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // Any Documents? If any, cannot delete, only disable

        // Delete Product & Combinations Warehouse lines

        // Delete Combinations

        // Delete Images

        $this->product->findOrFail($id)->delete();

        return redirect('products')
                ->with('success', l('This record has been successfully deleted &#58&#58 (:id) ', ['id' => $id], 'layouts'));
    }



/* ********************************************************************************************* */    



    /**
     * Make Combinations for specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function combine($id, Request $request)
    {
        $groups = $request->input('groups');

        // Validate: $groups ahold not be empty, and values should match options table
        // http://laravel.io/forum/11-12-2014-how-to-validate-array-input
        // https://www.google.es/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8&client=ubuntu#q=laravel%20validate%20array%20input

        $product = $this->product->findOrFail($id);

        // Start Combinator machime!

        $data = array();

        foreach ( $groups as $group ) 
        {
            $data[] = \App\Option::where('option_group_id', '=', $group)->orderby('position', 'asc')->pluck('id');
        }

        $combos = combos($data);

        $i=0;
        foreach ( $combos as $combo ) 
        {
            $i++;

            $combination = \App\Combination::create(
                array(
//                    'reference'        => $product->reference.'-'.$i,
                    'reference'        => '',
                    'reorder_point'    => $product->reorder_point,
                    'maximum_stock'    => $product->maximum_stock,
                    'supply_lead_time' => $product->supply_lead_time,

                    'measure_unit'            => $product->measure_unit,
                    'quantity_decimal_places' => $product->quantity_decimal_places,

                    'is_default'     => $i == 1 ? 1 : 0,
                    'active'         => $product->active,
                    'blocked'        => $product->blocked,
                    'publish_to_web' => $product->publish_to_web,

                    'product_id'     => $product->id,               // Needed by autoSKU()
                )
            );
            $product->combinations()->save($combination);

            $combination->options()->attach($combo);;
        }

        // Combinations are created with stock = 0. 
        // Create combinations only alollowed if product->quantity_onhand = 0 

        $product->reference = '';
        $product->ean13 = '';
        $product->supplier_reference = '';
        $product->product_type = 'combinable';
        $product->save();



        return redirect('products/'.$combination->product_id.'/edit#combinations')
                ->with('success', l('This record has been successfully combined &#58&#58 (:id) ', ['id' => $id], 'layouts') . $product->name);
    }


    /**
     * AJAX Stuff.
     *
     * 
     */
    public function searchBOM(Request $request)
    {
        $search = $request->term;

        $boms = \App\ProductBOM::select('id', 'alias', 'name')
                                ->where(   'name',      'LIKE', '%'.$search.'%' )
                                ->orWhere( 'alias', 'LIKE', '%'.$search.'%' )
//                                ->with('measureunit')
                                ->get( intval(\App\Configuration::get('DEF_ITEMS_PERAJAX')) );
/*
        $data = [];

        foreach ($products as $product) {
            $data[] = [
                    'id' => $product->id,
                    'value' => '['.$product->reference.'] '.$product->name,
                    'reference'       => $product->reference,
                    'measure_unit_id' => $product->measure_unit_id,
            ];
        }
*/
        return response( $boms );
    }



/* ********************************************************************************************* */    


    /**
     * Return a json list of records matching the provided query
     *
     * @return json
     */
    public function ajaxProductOptionsSearch(Request $request)
    {
        $product = $this->product
                        ->with('tax')
                        ->with('combinations')
                        ->with('combinations.options')
                        ->with('combinations.options.optiongroup')
                        ->findOrFail($request->input('product_id'));

        // Gather Attributte Groups
        $groups = array();

        if ( $product->combinations->count() )
        {
            foreach ($product->combinations as $combination) {
                foreach ($combination->options as $option) {
                    $groups[$option->optiongroup->id]['name'] = $option->optiongroup->name;
                    // $groups[$option->optiongroup->id]['values'][$option->optiongroup->id.'_'.$option->id] = $option->name;
                    $groups[$option->optiongroup->id]['values'][$option->id] = $option->name;
                }
            }
        }

        $str = '';

        foreach ($groups as $i => $group) {
        
            $str .= Form::label('group['.$i.']', $group['name']) . 
                    '<div class="option_list">' . 
                    Form::select('group['.$i.']', array('0' => l('-- Please, select --', [], 'layouts')) + $group['values'], null, array('class' => 'form-control option_select')) . 
                    '</div>';
        
        }
        return '<div id="options">' . $str . '</div>';

        // sleep(5);
        // return '<select class="form-control" id="warehouse_id" name="warehouse_id"><option value="0">-- Seleccione --</option><option value="1">Main Address</option><option value="8">CALIMA 25</option></select><select class="form-control" id="warehouse_id" name="warehouse_id"><option value="0">-- Seleccione --</option><option value="1">Main Address</option><option value="8">CALIMA 25</option></select><select class="form-control" id="warehouse_id" name="warehouse_id"><option value="0">-- Seleccione --</option><option value="1">Main Address</option><option value="8">CALIMA 25</option></select>';
        // return 'Hello World! '.$request->input('product_id');

        /*

SELECT combination_id, COUNT(combination_id) tot FROM `combinations` as c
left join combination_option as co
on co.combination_id = c.id
WHERE c.product_id = 15
AND (co.option_id = 4) or (co.option_id = 10) or 1
GROUP BY combination_id ORDER BY tot DESC
LIMIT 1

SELECT page, COUNT(page ) totpages
FROM visitas
GROUP BY page ORDER BY totpages DESC
LIMIT 1

        */
    }

    /**
     * Return a json list of records matching the provided query
     *
     * @return json
     */
    public function ajaxProductCombinationSearch(Request $request)
    {
        if ($request->has('group')) {
            $combination_id = \App\Combination::getCombinationByOptions( $request->input('product_id'), $request->input('group') );

            // ToDo: what happens if $combination_id=0 -> Failed to load resource: the server responded with a status of 500 (Internal Server Error)  http://localhost/aBillander5/public/products/ajax/combination_lookup
            $combination = \App\Combination::select('id', 'product_id', 'reference')
                            ->where('id', '=', $combination_id)
                            ->Where('product_id', '=', $request->input('product_id'))
                            ->take(1)->get();
            return json_encode( $combination[0] );

        } else {
            $combination_id = 0;

        }
    }


/* ********************************************************************************************* */    


    /**
     * Return a json list of records matching the provided query
     *
     * @return json
     */
    public function ajaxProductSearch(Request $request)
    {
//        $term  = $request->has('term')  ? $request->input('term')  : null ;
//        $query = $request->has('query') ? $request->input('query') : $term;

//        if ( $query )

        if ($request->has('query'))
        {
            $onhand_only = ( $request->has('onhand_only') ? 1 : 0 );

//            return Product::searchByNameAutocomplete($query, $onhand_only);
            return Product::searchByNameAutocomplete($request->input('query'), $onhand_only);
        } else {
            // die silently
            return json_encode( [ 'query' => '', 'suggestions' => [] ] );
        }
    }


    /**
     * Return a json list of records matching the provided query
     *
     * @return json
     */
    public function ajaxProductPriceSearch(Request $request)
    {
        // Request data
        $product_id      = $request->input('product_id');
        $customer_id     = $request->input('customer_id');
        $currency_id     = $request->input('currency_id', \App\Context::getContext()->currency->id);
//        $conversion_rate = $request->input('conversion_rate');
//        $product_string  = $request->input('product_string');   // <- Esto es la salida de ajaxProductSearch

    //    $product = \App\Product::find();

        $product = $this->product
                        ->with('tax')
                        ->with('combinations')
                        ->with('combinations.options')
                        ->with('combinations.options.optiongroup')
                        ->find(intval($product_id));

        $customer = \App\Customer::find(intval($customer_id));
        
        $currency = ($currency_id == \App\Context::getContext()->currency->id) ?
                    \App\Context::getContext()->currency :
                    \App\Currency::find(intval($currency_id));

        $currency->conversion_rate = $request->input('conversion_rate', $currency->conversion_rate);

        if ( !$product || !$customer || !$currency ) {
            // Die silently
            return '';
        }

        $tax = $product->tax;

        // Calculate price per $customer_id now!
        $product->customer_price = $product->getPriceByCustomer( $customer, $currency );
        $tax_percent = $tax->percent;
        $product->customer_price->applyTaxPercent( $tax_percent );
//        if ($customer->sales_equalization) $tax_percent += $tax->extra_percent;
//        $product->price_customer_with_tax = $product->price_customer*(1.0+$tax_percent/100.0);

        // Add customer_price
/*
        $p = json_decode( $product_string, true);
        $p = array_merge($p, ['price_customer' => $product->price_customer]);
        $product_string = json_encode($p);
*/
//        $product_string = json_encode($product);

//        return view('products.ajax.show_price', compact('product', 'tax', 'customer', 'currency', 'product_string'));
        return view('products.ajax.show_price', compact( 'product', 'customer', 'currency' ) );
    }
    
}
