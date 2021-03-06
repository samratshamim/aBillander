<?php

// github.com/gocanto/gocanyo-pkg


Route::group([

	'middleware' =>  ['web', 'auth'],
	'namespace' => 'Queridiam\FSxConnector\Http\Controllers',
	'prefix'    => 'fsx'

], function () {

//	Route::get('orders', ['as' => 'worders', 'uses' => 'WooOrdersController@index']);
//	Route::get('orders/statuses', 'WooOrdersController@getStatuses');	// Semms this endpoint does not exist /!\
//	Route::get('orders/{id}', 'WooOrdersController@show');
//	Route::post('orders/{id}', ['as' => 'wostatus', 'uses' => 'WooOrdersController@update']);



	Route::get('/', ['uses' => 'FSxOrdersController@index', 
	                 'as'   => 'fsxorders.index'] );


	Route::get('fsxconfigurations', ['uses' => 'FSxConfigurationsController@index', 
	                 'as'   => 'fsxconfigurations'] );


	Route::get('fsxorders', ['uses' => 'FSxOrdersController@index', 
	                 'as'   => 'fsxorders.index'] );


	Route::get('fsxlog', ['uses' => 'FsxLoggersController@index', 
	                 'as'   => 'fsxlog.index'] );
	Route::get('fsxlog/empty', ['uses' => 'FsxLoggersController@empty', 
	                 'as'   => 'fsxlog.empty'] );


	Route::get('dummy', function () {

		return 'Hello world!';

	});


/*
	Route::get( 'wooconnect/configuration', 'WooConnectController@configurationsEdit')
			->name('wooconnect.configuration');
	Route::post('wooconnect/configuration', 'WooConnectController@configurationsUpdate')
			->name('wooconnect.configuration.update');

	Route::get( 'wooconnect/configuration/taxes', 'WooConnectController@configurationTaxesEdit')
			->name('wooconnect.configuration.taxes');
	Route::post('wooconnect/configuration/taxes', 'WooConnectController@configurationTaxesUpdate')
			->name('wooconnect.configuration.taxes.update');

	Route::get( 'wooconnect/configuration/paymentgateways', 'WooConnectController@configurationPaymentGatewaysEdit')
			->name('wooconnect.configuration.paymentgateways');
	Route::post('wooconnect/configuration/paymentgateways', 'WooConnectController@configurationPaymentGatewaysUpdate')
			->name('wooconnect.configuration.paymentgateways.update');

    Route::get('worders/{id}/import' , array('uses' => 'WooOrdersController@import', 
                                                        'as'   => 'worders.import' ));
    Route::get('worders/{id}/invoice', array('uses' => 'WooOrdersController@invoice', 
                                                        'as'   => 'worders.invoice' ));
    Route::get('worders/imported', array('uses' => 'WooOrdersController@importedIndex', 
                                                        'as'   => 'worders.imported' ));
    Route::resource('worders', 'WooOrdersController');
*/

});

