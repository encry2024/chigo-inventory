<?php

namespace App\Providers;

use App\Models\Access\User\User;

use App\Models\Inventory\Item\Aircon\Aircon;
use App\Models\Inventory\Item\Peripheral\Peripheral;
use App\Models\Inventory\Customer\Customer;
use App\Models\Inventory\Technician\Technician;
use App\Models\Inventory\Referral\Referral;

use App\Models\Workflow\Sale\Sale;
use App\Models\Workflow\Technical\Technical;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

/**
* Class RouteServiceProvider.
*/
class RouteServiceProvider extends ServiceProvider
{
   /**
   * This namespace is applied to your controller routes.
   *
   * In addition, it is set as the URL generator's root namespace.
   *
   * @var string
   */
   protected $namespace = 'App\Http\Controllers';

   /**
   * Define your route model bindings, pattern filters, etc.
   *
   * @return void
   */
   public function boot()
   {
      /*
      * Register route model bindings
      */

      /*
      * This allows us to use the Route Model Binding with SoftDeletes on
      * On a model by model basis
      */
      $this->bind('deletedUser', function ($value) {
         $user = new User();

         return User::withTrashed()->where($user->getRouteKeyName(), $value)->first();
      });

      $this->bind('deletedAircon', function ($value) {
         $aircon = new Aircon();

         return Aircon::withTrashed()->where($aircon->getRouteKeyName(), $value)->first();
      });

      $this->bind('deletedCustomer', function ($value) {
         $customer = new Customer();

         return Customer::withTrashed()->where($customer->getRouteKeyName(), $value)->first();
      });

      $this->bind('deletedSale', function ($value) {
         $sale = new Sale();

         return Sale::withTrashed()->where($sale->getRouteKeyName(), $value)->first();
      });

      $this->bind('deletedTechnical', function ($value) {
         $technical = new Technical();

         return Technical::withTrashed()->where($technical->getRouteKeyName(), $value)->first();
      });

      $this->bind('deletedTechnician', function ($value) {
         $technician = new Technician();

         return Technician::withTrashed()->where($technician->getRouteKeyName(), $value)->first();
      });

      $this->bind('deletedReferral', function ($value) {
         $referral = new Referral();

         return Referral::withTrashed()->where($referral->getRouteKeyName(), $value)->first();
      });

      $this->bind('deletedPeripheral', function ($value) {
         $peripheral = new Peripheral();

         return Peripheral::withTrashed()->where($peripheral->getRouteKeyName(), $value)->first();
      });

      parent::boot();
   }

   /**
   * Define the routes for the application.
   *
   * @return void
   */
   public function map()
   {
      $this->mapApiRoutes();

      $this->mapWebRoutes();

      //
   }

   /**
   * Define the "web" routes for the application.
   *
   * These routes all receive session state, CSRF protection, etc.
   *
   * @return void
   */
   protected function mapWebRoutes()
   {
      Route::middleware('web')
      ->namespace($this->namespace)
      ->group(base_path('routes/web.php'));
   }

   /**
   * Define the "api" routes for the application.
   *
   * These routes are typically stateless.
   *
   * @return void
   */
   protected function mapApiRoutes()
   {
      Route::prefix('api')
      ->middleware('api')
      ->namespace($this->namespace)
      ->group(base_path('routes/api.php'));
   }
}
