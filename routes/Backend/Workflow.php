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

      Route::resource('sale', 'SaleController');
   });

});
