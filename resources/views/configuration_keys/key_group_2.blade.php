@extends('layouts.master')

@section('title') {{ l('Settings') }} @parent @stop

@section('content') 
<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <div class="pull-right">
            </div>
            <h2>{{ l('Settings') }}</h2>
        </div>
    </div>
</div>

<div class="container-fluid">
   <div class="row">

        @include('configuration_keys.key_groups')
      
      <div class="col-lg-10 col-md-10 col-sm-9">

            <!-- div class="panel panel-primary" id="panel_main">
               <div class="panel-heading">
                  <h3 class="panel-title">Datos generales</h3>
               </div -->
               <div class="panel-body well">


{!! Form::open(array('url' => 'configurationkeys', 'id' => 'key_group_'.intval($tab_index), 'name' => 'key_group_'.intval($tab_index), 'class' => 'form-horizontal')) !!}


  {!! Form::hidden('tab_index', $tab_index, array('id' => 'tab_index')) !!}

  <fieldset>
    <legend>{{ l('Default Values') }}</legend>




    <div class="form-group {{ $errors->has('DEF_CARRIER') ? 'has-error' : '' }}">
      <label for="DEF_CARRIER" class="col-lg-4 control-label">{!! l('DEF_CARRIER.name') !!}</label>
      <div class="col-lg-8">
        <div class="row">
        <div class="col-lg-8">
        {!! Form::select('DEF_CARRIER', ['0' => l('-- Please, select --', [], 'layouts')] + $carrierList, old('DEF_CARRIER', $key_group['DEF_CARRIER']), array('class' => 'form-control')) !!}
        {{ $errors->first('DEF_CARRIER', '<span class="help-block">:message</span>') }}
        </div>
        <div class="col-lg-4"> </div>
        </div>
        <span class="help-block">{!! l('DEF_CARRIER.help') !!}</span>
      </div>
    </div>


    <div class="form-group {{ $errors->has('DEF_COMPANY') ? 'has-error' : '' }}">
      <label for="DEF_COMPANY" class="col-lg-4 control-label">{!! l('DEF_COMPANY.name') !!}</label>
      <div class="col-lg-8">
        <div class="row">
        <div class="col-lg-8">
        {!! Form::select('DEF_COMPANY', $companyList, old('DEF_COMPANY', $key_group['DEF_COMPANY']), array('class' => 'form-control')) !!}
        {{ $errors->first('DEF_COMPANY', '<span class="help-block">:message</span>') }}
        </div>
        <div class="col-lg-4"> </div>
        </div>
        <span class="help-block">{!! l('DEF_COMPANY.help') !!}</span>
      </div>
    </div>

    <div class="form-group {{ $errors->has('DEF_COUNTRY') ? 'has-error' : '' }}">
      <label for="DEF_COUNTRY" class="col-lg-4 control-label">{!! l('DEF_COUNTRY.name') !!}</label>
      <div class="col-lg-8">
        <div class="row">
        <div class="col-lg-8">
        {!! Form::select('DEF_COUNTRY', $countryList, old('DEF_COUNTRY', $key_group['DEF_COUNTRY']), array('class' => 'form-control')) !!}
        {{ $errors->first('DEF_COUNTRY', '<span class="help-block">:message</span>') }}
        </div>
        <div class="col-lg-4"> </div>
        </div>
        <span class="help-block">{!! l('DEF_COUNTRY.help') !!}</span>
      </div>
    </div>

    <div class="form-group {{ $errors->has('DEF_CURRENCY') ? 'has-error' : '' }}">
      <label for="DEF_CURRENCY" class="col-lg-4 control-label">{!! l('DEF_CURRENCY.name') !!}</label>
      <div class="col-lg-8">
        <div class="row">
        <div class="col-lg-8">
        {!! Form::select('DEF_CURRENCY', $currencyList, old('DEF_CURRENCY', $key_group['DEF_CURRENCY']), array('class' => 'form-control')) !!}
        {{ $errors->first('DEF_CURRENCY', '<span class="help-block">:message</span>') }}
        </div>
        <div class="col-lg-4"> </div>
        </div>
        <span class="help-block">{!! l('DEF_CURRENCY.help') !!}</span>
      </div>
    </div>

    <div class="form-group {{ $errors->has('DEF_CUSTOMER_INVOICE_SEQUENCE') ? 'has-error' : '' }}">
      <label for="DEF_CUSTOMER_INVOICE_SEQUENCE" class="col-lg-4 control-label">{!! l('DEF_CUSTOMER_INVOICE_SEQUENCE.name') !!}</label>
      <div class="col-lg-8">
        <div class="row">
        <div class="col-lg-8">
        {!! Form::select('DEF_CUSTOMER_INVOICE_SEQUENCE', ['0' => l('-- Please, select --', [], 'layouts')] + [], old('DEF_CUSTOMER_INVOICE_SEQUENCE', $key_group['DEF_CUSTOMER_INVOICE_SEQUENCE']), array('class' => 'form-control')) !!}
        {{ $errors->first('DEF_CUSTOMER_INVOICE_SEQUENCE', '<span class="help-block">:message</span>') }}
        </div>
        <div class="col-lg-4"> </div>
        </div>
        <span class="help-block">{!! l('DEF_CUSTOMER_INVOICE_SEQUENCE.help') !!}</span>
      </div>
    </div>

    <div class="form-group {{ $errors->has('DEF_CUSTOMER_INVOICE_TEMPLATE') ? 'has-error' : '' }}">
      <label for="DEF_CUSTOMER_INVOICE_TEMPLATE" class="col-lg-4 control-label">{!! l('DEF_CUSTOMER_INVOICE_TEMPLATE.name') !!}</label>
      <div class="col-lg-8">
        <div class="row">
        <div class="col-lg-8">
        {!! Form::select('DEF_CUSTOMER_INVOICE_TEMPLATE', ['0' => l('-- Please, select --', [], 'layouts')] + [], old('DEF_CUSTOMER_INVOICE_TEMPLATE', $key_group['DEF_CUSTOMER_INVOICE_TEMPLATE']), array('class' => 'form-control')) !!}
        {{ $errors->first('DEF_CUSTOMER_INVOICE_TEMPLATE', '<span class="help-block">:message</span>') }}
        </div>
        <div class="col-lg-4"> </div>
        </div>
        <span class="help-block">{!! l('DEF_CUSTOMER_INVOICE_TEMPLATE.help') !!}</span>
      </div>
    </div>

    <div class="form-group {{ $errors->has('DEF_CUSTOMER_PAYMENT_METHOD') ? 'has-error' : '' }}">
      <label for="DEF_CUSTOMER_PAYMENT_METHOD" class="col-lg-4 control-label">{!! l('DEF_CUSTOMER_PAYMENT_METHOD.name') !!}</label>
      <div class="col-lg-8">
        <div class="row">
        <div class="col-lg-8">
        {!! Form::select('DEF_CUSTOMER_PAYMENT_METHOD', ['0' => l('-- Please, select --', [], 'layouts')] + $payment_methodList, old('DEF_CUSTOMER_PAYMENT_METHOD', $key_group['DEF_CUSTOMER_PAYMENT_METHOD']), array('class' => 'form-control')) !!}
        {{ $errors->first('DEF_CUSTOMER_PAYMENT_METHOD', '<span class="help-block">:message</span>') }}
        </div>
        <div class="col-lg-4"> </div>
        </div>
        <span class="help-block">{!! l('DEF_CUSTOMER_PAYMENT_METHOD.help') !!}</span>
      </div>
    </div>

    <div class="form-group {{ $errors->has('DEF_LANGUAGE') ? 'has-error' : '' }}">
      <label for="DEF_LANGUAGE" class="col-lg-4 control-label">{!! l('DEF_LANGUAGE.name') !!}</label>
      <div class="col-lg-8">
        <div class="row">
        <div class="col-lg-8">
        {!! Form::select('DEF_LANGUAGE', $languageList, old('DEF_LANGUAGE', $key_group['DEF_LANGUAGE']), array('class' => 'form-control')) !!}
        {{ $errors->first('DEF_LANGUAGE', '<span class="help-block">:message</span>') }}
        </div>
        <div class="col-lg-4"> </div>
        </div>
        <span class="help-block">{!! l('DEF_LANGUAGE.help') !!}</span>
      </div>
    </div>

    <div class="form-group {{ $errors->has('DEF_MEASURE_UNIT_FOR_BOMS') ? 'has-error' : '' }}">
      <label for="DEF_MEASURE_UNIT_FOR_BOMS" class="col-lg-4 control-label">{!! l('DEF_MEASURE_UNIT_FOR_BOMS.name') !!}</label>
      <div class="col-lg-8">
        <div class="row">
        <div class="col-lg-8">
        {!! Form::select('DEF_MEASURE_UNIT_FOR_BOMS', ['0' => l('-- Please, select --', [], 'layouts')] + $measure_unitList, old('DEF_MEASURE_UNIT_FOR_BOMS', $key_group['DEF_MEASURE_UNIT_FOR_BOMS']), array('class' => 'form-control')) !!}
        {{ $errors->first('DEF_MEASURE_UNIT_FOR_BOMS', '<span class="help-block">:message</span>') }}
        </div>
        <div class="col-lg-4"> </div>
        </div>
        <span class="help-block">{!! l('DEF_MEASURE_UNIT_FOR_BOMS.help') !!}</span>
      </div>
    </div>

    <div class="form-group {{ $errors->has('DEF_MEASURE_UNIT_FOR_PRODUCTS') ? 'has-error' : '' }}">
      <label for="DEF_MEASURE_UNIT_FOR_PRODUCTS" class="col-lg-4 control-label">{!! l('DEF_MEASURE_UNIT_FOR_PRODUCTS.name') !!}</label>
      <div class="col-lg-8">
        <div class="row">
        <div class="col-lg-8">
        {!! Form::select('DEF_MEASURE_UNIT_FOR_PRODUCTS', ['0' => l('-- Please, select --', [], 'layouts')] + $measure_unitList, old('DEF_MEASURE_UNIT_FOR_PRODUCTS', $key_group['DEF_MEASURE_UNIT_FOR_PRODUCTS']), array('class' => 'form-control')) !!}
        {{ $errors->first('DEF_MEASURE_UNIT_FOR_PRODUCTS', '<span class="help-block">:message</span>') }}
        </div>
        <div class="col-lg-4"> </div>
        </div>
        <span class="help-block">{!! l('DEF_MEASURE_UNIT_FOR_PRODUCTS.help') !!}</span>
      </div>
    </div>

    <div class="form-group {{ $errors->has('DEF_OUTSTANDING_AMOUNT') ? 'has-error' : '' }}">
      <label for="DEF_OUTSTANDING_AMOUNT" class="col-lg-4 control-label">{!! l('DEF_OUTSTANDING_AMOUNT.name') !!}</label>
      <div class="col-lg-8">
        <div class="row">
        <div class="col-lg-6">
        <input class="form-control" type="text" id="DEF_OUTSTANDING_AMOUNT" name="DEF_OUTSTANDING_AMOUNT" placeholder="" value="{{ old('DEF_OUTSTANDING_AMOUNT', $key_group['DEF_OUTSTANDING_AMOUNT']) }}" />
        {{ $errors->first('DEF_OUTSTANDING_AMOUNT', '<span class="help-block">:message</span>') }}
        </div>
        <div class="col-lg-6"> </div>
        </div>
        <span class="help-block">{!! l('DEF_OUTSTANDING_AMOUNT.help') !!}</span>
      </div>
    </div>

    <div class="form-group {{ $errors->has('DEF_TAX') ? 'has-error' : '' }}">
      <label for="DEF_TAX" class="col-lg-4 control-label">{!! l('DEF_TAX.name') !!}</label>
      <div class="col-lg-8">
        <div class="row">
        <div class="col-lg-8">
        {!! Form::select('DEF_TAX', ['0' => l('-- Please, select --', [], 'layouts')] + $taxList, old('DEF_TAX', $key_group['DEF_TAX']), array('class' => 'form-control')) !!}
        {{ $errors->first('DEF_TAX', '<span class="help-block">:message</span>') }}
        </div>
        <div class="col-lg-4"> </div>
        </div>
        <span class="help-block">{!! l('DEF_TAX.help') !!}</span>
      </div>
    </div>

    <div class="form-group {{ $errors->has('DEF_WAREHOUSE') ? 'has-error' : '' }}">
      <label for="DEF_WAREHOUSE" class="col-lg-4 control-label">{!! l('DEF_WAREHOUSE.name') !!}</label>
      <div class="col-lg-8">
        <div class="row">
        <div class="col-lg-8">
        {!! Form::select('DEF_WAREHOUSE', ['0' => l('-- Please, select --', [], 'layouts')] + $warehouseList, old('DEF_WAREHOUSE', $key_group['DEF_WAREHOUSE']), array('class' => 'form-control')) !!}
        {{ $errors->first('DEF_WAREHOUSE', '<span class="help-block">:message</span>') }}
        </div>
        <div class="col-lg-4"> </div>
        </div>
        <span class="help-block">{!! l('DEF_WAREHOUSE.help') !!}</span>
      </div>
    </div>




    <div class="form-group">
      <div class="col-lg-8 col-lg-offset-4">
        <!-- button class="btn btn-default">Cancelar</button -->
        <button type="submit" class="btn btn-primary">
          <i class="fa fa-hdd-o"></i>
                     &nbsp; {{l('Save', [], 'layouts')}}
          </button>
      </div>
    </div>
  </fieldset>
{!! Form::close() !!}



               </div>

               <!-- div class="panel-footer text-right">
               </div>

            </div -->

      </div><!-- div class="col-lg-10 col-md-10 col-sm-9" -->

   </div>
</div>

@endsection