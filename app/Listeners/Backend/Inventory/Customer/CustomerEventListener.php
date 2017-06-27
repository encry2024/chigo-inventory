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
   // public function onDeleted($event)
   // {
   //    history()->withType($this->history_slug)
   //    ->withEntity($event->user->id)
   //    ->withText('trans("history.backend.users.deleted") <strong>{user}</strong>')
   //    ->withIcon('trash')
   //    ->withClass('bg-maroon')
   //    ->withAssets([
   //       'user_link' => ['admin.access.user.show', $event->user->full_name, $event->user->id],
   //    ])
   //    ->log();
   // }
   //
   // /**
   // * @param $event
   // */
   // public function onRestored($event)
   // {
   //    history()->withType($this->history_slug)
   //    ->withEntity($event->user->id)
   //    ->withText('trans("history.backend.users.restored") <strong>{user}</strong>')
   //    ->withIcon('refresh')
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
   // public function onPermanentlyDeleted($event)
   // {
   //    history()->withType($this->history_slug)
   //    ->withEntity($event->user->id)
   //    ->withText('trans("history.backend.users.permanently_deleted") <strong>{user}</strong>')
   //    ->withIcon('trash')
   //    ->withClass('bg-maroon')
   //    ->withAssets([
   //       'user_string' => $event->user->full_name,
   //    ])
   //    ->log();
   //
   //    history()->withType($this->history_slug)
   //    ->withEntity($event->user->id)
   //    ->withAssets([
   //       'user_string' => $event->user->full_name,
   //    ])
   //    ->updateUserLinkAssets();
   // }
   //
   // /**
   // * @param $event
   // */
   // public function onPasswordChanged($event)
   // {
   //    history()->withType($this->history_slug)
   //    ->withEntity($event->user->id)
   //    ->withText('trans("history.backend.users.changed_password") <strong>{user}</strong>')
   //    ->withIcon('lock')
   //    ->withClass('bg-blue')
   //    ->withAssets([
   //       'user_link' => ['admin.access.user.show', $event->user->full_name, $event->user->id],
   //    ])
   //    ->log();
   // }
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
      // $events->listen(
      //    \App\Events\Backend\Access\User\UserDeleted::class,
      //    'App\Listeners\Backend\Access\User\UserEventListener@onDeleted'
      // );
      //
      // $events->listen(
      //    \App\Events\Backend\Access\User\UserRestored::class,
      //    'App\Listeners\Backend\Access\User\UserEventListener@onRestored'
      // );
      //
      // $events->listen(
      //    \App\Events\Backend\Access\User\UserPermanentlyDeleted::class,
      //    'App\Listeners\Backend\Access\User\UserEventListener@onPermanentlyDeleted'
      // );
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
