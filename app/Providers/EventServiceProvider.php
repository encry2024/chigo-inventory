<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
* Class EventServiceProvider.
*/
class EventServiceProvider extends ServiceProvider
{
   /**
   * The event listener mappings for the application.
   *
   * @var array
   */
   protected $listen = [];

   /**
   * Class event subscribers.
   *
   * @var array
   */
   protected $subscribe = [
      /*
      * Frontend Subscribers
      */

      /*
      * Auth Subscribers
      */
      \App\Listeners\Frontend\Auth\UserEventListener::class,

      /*
      * Backend Subscribers
      */

      /*
      * Access Subscribers
      */
      \App\Listeners\Backend\Access\User\UserEventListener::class,
      \App\Listeners\Backend\Access\Role\RoleEventListener::class,

      \App\Listeners\Backend\Inventory\Aircon\AirconEventListener::class,
      \App\Listeners\Backend\Inventory\Customer\CustomerEventListener::class,
      \App\Listeners\Backend\Inventory\Technician\TechnicianEventListener::class,
      \App\Listeners\Backend\Inventory\Referral\ReferralEventListener::class,

      \App\Listeners\Backend\Workflow\Sale\SaleEventListener::class,
      \App\Listeners\Backend\Workflow\Technical\TechnicalEventListener::class,


   ];

   /**
   * Register any events for your application.
   *
   * @return void
   */
   public function boot()
   {
      parent::boot();

      //
   }
}
