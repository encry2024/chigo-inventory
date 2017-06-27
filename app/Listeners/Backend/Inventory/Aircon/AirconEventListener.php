<?php

namespace App\Listeners\Backend\Inventory\Aircon;

class AirconEventListener
{
   /**
   * @var string
   */
   private $history_slug = 'Aircon';

   /**
   * @param $event
   */
   public function onCreated($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->aircon->id)
      ->withText('trans("history.backend.inventory.items.aircons.created") <strong>{aircon}</strong>')
      ->withIcon('plus')
      ->withClass('bg-green')
      ->withAssets([
         'aircon_link' => ['admin.inventory.item.aircon.show', $event->aircon->name, $event->aircon->id],
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
      ->withEntity($event->aircon->id)
      ->withText('trans("history.backend.inventory.items.aircons.deleted") <strong>{aircon}</strong>')
      ->withIcon('trash')
      ->withClass('bg-maroon')
      ->withAssets([
         'aircon_link' => ['admin.inventory.item.aircon.show', $event->aircon->name, $event->aircon->id],
      ])
      ->log();
   }
   //
   /**
   * @param $event
   */
   public function onRestored($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->aircon->id)
      ->withText('trans("history.backend.inventory.items.aircons.restored") <strong>{aircon}</strong>')
      ->withIcon('refresh')
      ->withClass('bg-aqua')
      ->withAssets([
         'aircon_link' => ['admin.inventory.item.aircon.show', $event->aircon->name, $event->aircon->id],
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
      ->withEntity($event->aircon->id)
      ->withText('trans("history.backend.inventory.items.aircons.permanently_deleted") <strong>{aircon}</strong>')
      ->withIcon('trash')
      ->withClass('bg-maroon')
      ->withAssets([
         'aircon_string' => $event->aircon->name,
      ])
      ->log();

      history()->withType($this->history_slug)
      ->withEntity($event->aircon->id)
      ->withAssets([
         'aircon_string' => $event->aircon->name,
      ])
      ->updateUserLinkAssets();
   }
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
         \App\Events\Backend\Inventory\Aircon\AirconCreated::class,
         'App\Listeners\Backend\Inventory\Aircon\AirconEventListener@onCreated'
      );

      // $events->listen(
      //    \App\Events\Backend\Access\User\UserUpdated::class,
      //    'App\Listeners\Backend\Access\User\UserEventListener@onUpdated'
      // );
      //
      $events->listen(
         \App\Events\Backend\Inventory\Aircon\AirconDeleted::class,
         'App\Listeners\Backend\Inventory\Aircon\AirconEventListener@onDeleted'
      );
      //
      $events->listen(
         \App\Events\Backend\Inventory\Aircon\AirconRestored::class,
         'App\Listeners\Backend\Inventory\Aircon\AirconEventListener@onRestored'
      );
      //
      $events->listen(
         \App\Events\Backend\Inventory\Aircon\UserPermanentlyDeleted::class,
         'App\Listeners\Backend\Inventory\Aircon\AirconEventListener@onPermanentlyDeleted'
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
