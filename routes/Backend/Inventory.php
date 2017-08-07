<?php

Route::group([
   'prefix'     => 'inventory',
   'as'         => 'inventory.',
   'namespace'  => 'Inventory',
], function () {

   /*
   * Search Specific Functionality
   */
   Route::group([
      'prefix' => 'item',
      'as'     => 'item.',
      'namespace' => 'Aircon',
   ], function() {
      // Route::get('/', 'AirconController@index')->name('index');
      Route::post('aircon/get', 'AirconTableController')->name('aircon.get');

      Route::get('aircon/deactivated', 'AirconController@getDeactivated')->name('aircon.deactivated');

      Route::get('aircon/deleted', 'AirconStatusController@getDeleted')->name('aircon.deleted');

      Route::get('aircon/import', 'AirconController@importAirconExcel')->name('aircon.import');
      Route::post('aircon/import', 'AirconController@import')->name('aircon.import.data');

      Route::get('aircon/log/pending', 'AirconController@logPendingAircons')->name('aircon.log_pending_aircon');
      Route::post('aircon/log/pending', 'AirconController@changeAirconLog')->name('aircon.log.data');

      Route::get('aircon/get/checked-out', 'AirconController@checkedOutAircon')->name('aircon.checked_out_aircons');
      Route::get('aircon/view/pending', 'AirconController@pendingAircons')->name('aircon.view.pending');

      Route::resource('aircon', 'AirconController');

      Route::group(['prefix' => 'aircon/{deletedAircon}'], function () {
         Route::get('delete', 'AirconStatusController@delete')->name('aircon.delete-permanently');
         Route::get('restore', 'AirconStatusController@restore')->name('aircon.restore');
      });
   });

   Route::group([
      'namespace' => 'Customer',
   ], function() {
      //Route::get('/', 'CustomerController@index')->name('index');
      Route::get('customer/deleted', 'CustomerStatusController@getDeleted')->name('customer.deleted');

      Route::post('customer/get', 'CustomerTableController')->name('customer.get');

      Route::resource('customer', 'CustomerController');

      Route::group(['prefix' => 'customer/{deletedCustomer}'], function () {
         Route::get('delete', 'CustomerStatusController@delete')->name('customer.delete-permanently');
         Route::get('restore', 'CustomerStatusController@restore')->name('customer.restore');
      });
   });

   Route::group([
      'namespace' => 'Technician',
   ], function() {
      Route::post('/get', 'TechnicianTableController')->name('technician.get');

      Route::resource('technician', 'TechnicianController');
   });
});
