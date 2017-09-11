<?php

Route::group([
   'prefix'     => 'workflow',
   'as'         => 'workflow.',
   'namespace'  => 'Workflow',
], function () {

   Route::group([
      'namespace' => 'Sale',
   ], function() {
      Route::post('sales/get', 'SaleTableController')->name('sale.get');

      Route::get('sale/deactivated', 'SaleController@getDeactivated')->name('sale.deactivated');

      Route::get('sale/deleted', 'SaleStatusController@getDeleted')->name('sale.deleted');

      Route::patch('sale/{sale}/update_status', 'SaleController@updateStatus')->name('sale.update_status');

      Route::get('sale/deliveries', 'SaleController@fetchDeliverySales')->name('sale.get_deliveries');

      Route::get('sale/{sale}/for-checkout', 'SaleController@saleForCheckout')->name('sale.for_checkout');

      Route::get('sale/generate/gatepass', 'SaleController@generateGatepass')->name('sale.generate_gatepass');

      Route::resource('/sale', 'SaleController');

      Route::group(['prefix' => 'sale/{deletedSale}'], function () {
         Route::get('delete', 'SaleStatusController@delete')->name('sale.delete-permanently');
         Route::get('restore', 'SaleStatusController@restore')->name('sale.restore');
      });
   });

   Route::group([
      'namespace' => 'Technical',
   ], function() {
      Route::post('technical/get', 'TechnicalTableController')->name('technical.get');
      Route::get('technical/schedule/{schedule}', 'TechnicalController@create')->name('technical.process_technical_workflow');

      Route::get('technical/get/schedule', 'TechnicalController@validateDateTime')->name('technical.valdiate_schedule');
      Route::post('technical/confirm_schedules', 'TechnicalController@confirmSchedules')->name('technical.confirm_schedules');

      Route::get('technical/schedules', 'TechnicalController@fetchTechnicalSchedules')->name('technical.fetch_technical_schedules');


      Route::get('technical/fetch-technical-schedules', 'TechnicalController@fetchTechnicalForReceipt')->name('technical.for_receipt');

      Route::get('technical/show-calendar', 'TechnicalController@showCalendar')->name('technical.show_calendar');

      Route::get('technical/{technical}/receipt', 'TechnicalController@createReceipt')->name('technical.create_receipt');

      Route::get('technical/gate_pass', function() {
         return view('backend.workflow.gatepass');
      });

      Route::resource('/technical', 'TechnicalController');
   });

});
