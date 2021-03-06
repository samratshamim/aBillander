
    <div class="page-header">
        <h3>
            <span style="color: #dd4814;">{{ l('Lines') }}</span> <!-- span style="color: #cccccc;">/</span> {{ $order->name }} -->
        </h3>        
    </div>

    <div id="div_customer_order_lines">
       <div class="table-responsive">

    <table id="order_lines" class="table table-hover">
        <thead>
            <tr>
               <th class="text-left" style="width: 60px"></th>
               <th class="text-left">{{l('Reference')}}
                           <a href="javascript:void(0);" data-toggle="popover" data-placement="top" 
                                      data-content="{{ l('Arrastre para reordenar.') }}">
                                  <i class="fa fa-question-circle abi-help"></i>
                           </a></th>
               <th class="text-left">{{l('Description')}}</th>
               <th class="text-right" xxwidth="90">{{l('Quantity')}}</th>

               <th class="text-right">{{l('Price')}}</th>
               <th class="text-right" width="90">{{l('Disc. %')}}</th>

               <th class="text-right" xwidth="90">{{l('Total')}}</th> 
               <th class="text-right" xwidth="90">{{l('With Tax')}}</th> 
               {{-- quantity * (price - discount) Con tax o no depende de la configuración de meter precios con impuesto incluido --}}
               <!-- th class="text-right" xwidth="115">{{l('Tax')}}</th -->

               <!-- th class="text-right">{{l('Line Total')}}</th --> {{-- amount * tax --}}

               <th class="text-left" style="width:1px; white-space: nowrap;"></th>
               <th class="text-left" xwidth="115">{{l('Notes', 'layouts')}}</th>
                <th class="text-right"> 
                  <a class="btn btn-sm btn-success create-order-line" title="{{l('Add New Item', [], 'layouts')}}"><i class="fa fa-plus"></i> {{l('Add New', [], 'layouts')}}</a></th>
            </tr>
        </thead>
        <tbody class="sortable">

    @if ($order->customerorderlines->count())
            <!-- tr style="color: #3a87ad; background-color: #d9edf7;" -->
            

            @foreach ($order->customerorderlines as $line)
            <tr data-id="{{ $line->id }}" data-sort-order="{{ $line->line_sort_order }}">
                <td>[{{ $line->id }}] {{$line->line_sort_order }}</td>
                <td>{{ $line->reference }}</td>
                <td>
                @if($line->line_type == 'shipping')
                  <i class="fa fa-truck abi-help" title="{{l('Shipping Cost')}}"></i> 
                @endif
                {{ $line->name }}</td>
                <td class="text-right">{{ $line->as_quantity('quantity') }}</td>
                <td class="text-right">{{ $line->as_price('unit_customer_final_price') }}</td>
                <td class="text-right">{{ $line->as_percent('discount_percent') }}</td>
                <td class="text-right">{{ $line->as_price('total_tax_excl') }}</td>
                <td class="text-right">{{ $line->as_price('total_tax_incl') }}</td>
                <!-- td class="text-right">{{ $line->as_priceable($line->total_tax_incl - $line->total_tax_excl) }}</td -->
                <td class="text-center">
                @if($line->sales_equalization)
                  <i class="fa fa-tag" style="color: #38b44a" title="{{l('Equalization Tax')}}"></i> 
                @endif
                </td>
                <td class="text-center">
                @if ($line->notes)
                 <a href="javascript:void(0);">
                    <button type="button" xclass="btn btn-xs btn-success" data-toggle="popover" data-placement="top" 
                            data-content="{{ $line->notes }}">
                        <i class="fa fa-paperclip"></i> {{l('View', [], 'layouts')}}
                    </button>
                 </a>
                @endif</td>
                <td class="text-right">
                    <!-- a class="btn btn-sm btn-info" title="{{l('XXXXXS', [], 'layouts')}}" onClick="loadcustomerorderlines();"><i class="fa fa-pencil"></i></a -->
                    
                    <a class="btn btn-sm btn-warning edit-order-line" data-id="{{$line->id}}" data-type="{{$line->line_type}}" title="{{l('Edit', [], 'layouts')}}" onClick="return false;"><i class="fa fa-pencil"></i></a>
                    
                    <a class="btn btn-sm btn-danger delete-order-line" data-id="{{$line->id}}" title="{{l('Delete', [], 'layouts')}}" 
                        data-content="{{l('You are going to delete a record. Are you sure?', [], 'layouts')}}" 
                        data-title="{{ '['.$line->reference.'] '.$line->name }}" 
                        onClick="return false;"><i class="fa fa-trash-o"></i></a>

                </td>
            </tr>
            
            @endforeach

            @php
                $max_line_sort_order = $line->line_sort_order;
            @endphp

    @else
    <tr><td colspan="9">
    <div class="alert alert-warning alert-block">
        <i class="fa fa-warning"></i>
        {{l('No records found', [], 'layouts')}}
    </div>
    </td></tr>
    @endif

        </tbody>
    </table>

    <input type="hidden" name="next_line_sort_order" id="next_line_sort_order" value="{{ ($line->line_sort_order ?? 0) + 10 }}">

       </div>
    </div>


{{-- ******************************************************************************* --}}


<div id="panel_customer_order_total" class="">
  
    @include('customer_orders._panel_customer_order_total')

</div>

