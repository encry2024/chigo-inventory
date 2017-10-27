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
   ], function() {
      Route::group([
         'namespace' => 'Aircon',
      ], function() {
         // Route::get('/', 'AirconController@index')->name('index');
         Route::post('aircon/get', 'AirconTableController')->name('aircon.get');

         Route::get('aircon/deactivated', 'AirconController@getDeactivated')->name('aircon.deactivated');

         Route::get('aircon/deleted', 'AirconStatusController@getDeleted')->name('aircon.deleted');

         Route::get('aircon/import', 'AirconController@importAirconExcel')->name('aircon.import');
         Route::post('aircon/import', 'AirconController@import')->name('aircon.import.data');

         Route::get('aircon/check-in', 'AirconController@checkInAircon')->name('aircon.check_in.page');
         Route::post('aircon/check-in', 'AirconController@postCheckInAircon')->name('aircon.check_in.post');
         Route::get('aircon/check-out', 'AirconController@checkOutAircon')->name('aircon.check_out.page');
         Route::post('aircon/check-out', 'AirconController@postCheckOutAircon')->name('aircon.check_out.post');

         Route::get('aircon/checked-out', 'AirconController@checkedOutAircon')->name('aircon.checked_out_aircons');
         Route::get('aircon/view/pending', 'AirconController@pendingAircons')->name('aircon.view.pending');
         Route::get('aircon/{customer_id}/associated', 'AirconController@fetchAirconByCustomerId')->name('aircon.fetch_by_customer');

         Route::resource('aircon', 'AirconController');

         Route::group(['prefix' => 'aircon/{deletedAircon}'], function () {
            Route::get('delete', 'AirconStatusController@delete')->name('aircon.delete-permanently');
            Route::get('restore', 'AirconStatusController@restore')->name('aircon.restore');
         });
      });

      Route::group([
         'namespace' => 'Peripheral'
      ], function() {
         Route::post('peripheral/get', 'PeripheralTableController')->name('peripheral.get');
         Route::get('peripheral/{peripheral}/get_selected_name', 'PeripheralController@getSelectedPeripheralName')->name('peripheral.get_selected_peripheral_name');

         Route::get('peripheral/deleted', 'PeripheralStatusController@getDeleted')->name('peripheral.deleted');

         Route::resource('peripheral', 'PeripheralController');

         Route::group(['prefix' => 'peripheral/{deletedPeripheral}'], function () {
            Route::get('delete', 'PeripheralStatusController@delete')->name('peripheral.delete-permanently');
            Route::get('restore', 'PeripheralStatusController@restore')->name('peripheral.restore');
         });
      });
   });

   Route::group([
      'namespace' => 'Referral',
   ], function() {


      Route::post('referral/get', 'ReferralTableController')->name('referral.get');

      Route::get('referral/deleted', 'ReferralStatusController@getDeleted')->name('referral.deleted');

      Route::resource('referral', 'ReferralController');

      Route::group(['prefix' => 'referral/{deletedReferral}'], function () {
         Route::get('delete', 'ReferralStatusController@delete')->name('referral.delete-permanently');
         Route::get('restore', 'ReferralStatusController@restore')->name('referral.restore');
      });
   });

   Route::group([
      'namespace' => 'Customer',
   ], function() {
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
