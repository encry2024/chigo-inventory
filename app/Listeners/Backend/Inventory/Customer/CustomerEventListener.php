<?php

namespace App\Listeners\Backend\Inventory\Customer;

class CustomerEventListener
{
   /**
   * @var string
   */
   private $history_slug = 'Customer';

   /**
   * @param $event
   */
   public function onCreated($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->customer->id)
      ->withText('trans("history.backend.customer.created") <strong>{customer}</strong>')
      ->withIcon('plus')
      ->withClass('bg-green')
      ->withAssets([
         'customer_link' => ['admin.inventory.customer.show', $event->customer->company_name, $event->customer->id],
      ])
      ->log();
   }

   // /**
   // * @param $event
   // */
   // public function onUpdated($event)
   // {
   //    history()->withType($this->history_slug)
   //    ->withEntity($event->user->id)
   //    ->withText('trans("history.backend.users.updated") <strong>{user}</strong>')
   //    ->withIcon('save')
   //    ->withClass('bg-aqua')
   //    ->withAssets([
   //       'user_link' => ['admin.access.user.show', $event->user->full_name, $event->user->id],
   //    ])
   //    ->log();
   // }
   //
   // /**
   // * @param $event
   // */
   public function onDeleted($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->customer->id)
      ->withText('trans("history.backend.customer.deleted") <strong>{customer}</strong>')
      ->withIcon('trash')
      ->withClass('bg-maroon')
      ->withAssets([
         'customer_link' => ['admin.inventory.customer.show', $event->customer->company_name, $event->customer->id],
      ])
      ->log();
   }
   //
   // /**
   // * @param $event
   // */
   public function onRestored($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->customer->id)
      ->withText('trans("history.backend.customer.restored") <strong>{customer}</strong>')
      ->withIcon('refresh')
      ->withClass('bg-aqua')
      ->withAssets([
         'customer_link' => ['admin.inventory.customer.show', $event->customer->company_name, $event->customer->id],
      ])
      ->log();
   }
   //
   // /**
   // * @param $event
   // */
   public function onPermanentlyDeleted($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->customer->id)
      ->withText('trans("history.backend.customer.permanently_deleted") <strong>{customer}</strong>')
      ->withIcon('trash')
      ->withClass('bg-maroon')
      ->withAssets([
         'customer_string' => $event->customer->company_name,
      ])
      ->log();

      history()->withType($this->history_slug)
      ->withEntity($event->customer->id)
      ->withAssets([
         'customer_string' => $event->customer->company_name,
      ])
      ->updateUserLinkAssets();
   }

   //
   // /**
   // * @param $event
   // */
   // public function onDeactivated($event)
   // {
   //    history()->withType($this->history_slug)
   //    ->withEntity($event->user->id)
   //    ->withText('trans("history.backend.users.deactivated") <strong>{user}</strong>')
   //    ->withIcon('times')
   //    ->withClass('bg-yellow')
   //    ->withAssets([
   //       'user_link' => ['admin.access.user.show', $event->user->full_name, $event->user->id],
   //    ])
   //    ->log();
   // }
   //
   // /**
   // * @param $event
   // */
   // public function onReactivated($event)
   // {
   //    history()->withType($this->history_slug)
   //    ->withEntity($event->user->id)
   //    ->withText('trans("history.backend.users.reactivated") <strong>{user}</strong>')
   //    ->withIcon('check')
   //    ->withClass('bg-green')
   //    ->withAssets([
   //       'user_link' => ['admin.access.user.show', $event->user->full_name, $event->user->id],
   //    ])
   //    ->log();
   // }

   /**
   * Register the listeners for the subscriber.
   *
   * @param \Illuminate\Events\Dispatcher $events
   */
   public function subscribe($events)
   {
      $events->listen(
         \App\Events\Backend\Inventory\Customer\CustomerCreated::class,
         'App\Listeners\Backend\Inventory\Customer\CustomerEventListener@onCreated'
      );

      // $events->listen(
      //    \App\Events\Backend\Access\User\UserUpdated::class,
      //    'App\Listeners\Backend\Access\User\UserEventListener@onUpdated'
      // );
      //
      $events->listen(
         \App\Events\Backend\Inventory\Customer\CustomerDeleted::class,
         'App\Listeners\Backend\Inventory\Customer\CustomerEventListener@onDeleted'
      );
      //
      $events->listen(
         \App\Events\Backend\Inventory\Customer\CustomerRestored::class,
         'App\Listeners\Backend\Inventory\Customer\CustomerEventListener@onRestored'
      );

      $events->listen(
         \App\Events\Backend\Inventory\Customer\CustomerPermanentlyDeleted::class,
         'App\Listeners\Backend\Inventory\Customer\CustomerEventListener@onPermanentlyDeleted'
      );
      //
      // $events->listen(
      //    \App\Events\Backend\Access\User\UserPasswordChanged::class,
      //    'App\Listeners\Backend\Access\User\UserEventListener@onPasswordChanged'
      // );
      //
      // $events->listen(
      //    \App\Events\Backend\Access\User\UserDeactivated::class,
      //    'App\Listeners\Backend\Access\User\UserEventListener@onDeactivated'
      // );
      //
      // $events->listen(
      //    \App\Events\Backend\Access\User\UserReactivated::class,
      //    'App\Listeners\Backend\Access\User\UserEventListener@onReactivated'
      // );
   }
}
