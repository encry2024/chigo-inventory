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

      Route::resource('/technical', 'TechnicalController');
   });

});
