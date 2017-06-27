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

      Route::resource('aircon', 'AirconController');

      Route::group(['prefix' => 'aircon/{deletedAircon}'], function () {
         Route::get('delete', 'AirconStatusController@delete')->name('aircon.delete-permanently');
         Route::get('restore', 'AirconStatusController@restore')->name('aircon.restore');
      });
   });

   Route::group([
      'prefix' => 'customer',
      'as'     => 'customer.',
      'namespace' => 'Customer',
   ], function() {
      //Route::get('/', 'CustomerController@index')->name('index');

      Route::resource('/', 'CustomerController');

      Route::post('get', 'CustomerTableController')->name('get');
   });
});
