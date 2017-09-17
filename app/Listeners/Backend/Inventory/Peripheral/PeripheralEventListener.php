<?php

namespace App\Listeners\Backend\Inventory\Peripheral;

class PeripheralEventListener
{
   /**
   * @var string
   */
   private $history_slug = 'Peripheral';

   /**
   * @param $event
   */
   public function onCreated($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->peripheral->id)
      ->withText('trans("history.backend.inventory.items.peripherals.created") <strong>{peripheral}</strong>')
      ->withIcon('plus')
      ->withClass('bg-green')
      ->withAssets([
         'peripheral_link' => ['admin.inventory.item.peripheral.show', $event->peripheral->description, $event->peripheral->id],
      ])
      ->log();
   }

   // /**
   // * @param $event
   // */
   public function onUpdated($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->peripheral->id)
      ->withText('trans("history.backend.inventory.items.peripherals.updated") <strong>{peripheral}</strong>')
      ->withIcon('save')
      ->withClass('bg-aqua')
      ->withAssets([
         'peripheral_link' => ['admin.inventory.item.peripheral.show', $event->peripheral->description, $event->peripheral->id],
      ])
      ->log();
   }
   //
   // /**
   // * @param $event
   // */
   public function onDeleted($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->peripheral->id)
      ->withText('trans("history.backend.inventory.items.peripherals.deleted") <strong>{peripheral}</strong>')
      ->withIcon('trash')
      ->withClass('bg-maroon')
      ->withAssets([
         'peripheral_link' => ['admin.inventory.item.peripheral.show', $event->peripheral->description, $event->peripheral->id],
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
      ->withEntity($event->peripheral->id)
      ->withText('trans("history.backend.inventory.items.peripherals.restored") <strong>{peripheral}</strong>')
      ->withIcon('refresh')
      ->withClass('bg-aqua')
      ->withAssets([
         'peripheral_link' => ['admin.inventory.item.peripheral.show', $event->peripheral->description, $event->peripheral->id],
      ])
      ->log();
   }

   public function onUploaded($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->peripheral->id)
      ->withText('trans("history.backend.inventory.items.peripherals.uploaded") <strong>{peripheral}</strong>')
      ->withIcon('flag')
      ->withClass('bg-aqua')
      ->withAssets([
         'peripheral_link' => ['admin.inventory.item.peripheral.show', $event->peripheral->description, $event->peripheral->id],
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
      ->withEntity($event->peripheral->id)
      ->withText('trans("history.backend.inventory.items.peripherals.permanently_deleted") <strong>{peripheral}</strong>')
      ->withIcon('trash')
      ->withClass('bg-maroon')
      ->withAssets([
         'peripheral_string' => $event->peripheral->description,
      ])
      ->log();

      history()->withType($this->history_slug)
      ->withEntity($event->peripheral->id)
      ->withAssets([
         'peripheral_string' => $event->peripheral->description,
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
         \App\Events\Backend\Inventory\Peripheral\PeripheralCreated::class,
         'App\Listeners\Backend\Inventory\Peripheral\PeripheralEventListener@onCreated'
      );

      $events->listen(
         \App\Events\Backend\Inventory\Peripheral\PeripheralUpdated::class,
         'App\Listeners\Backend\Inventory\Peripheral\PeripheralEventListener@onUpdated'
      );

      $events->listen(
         \App\Events\Backend\Inventory\Peripheral\PeripheralDeleted::class,
         'App\Listeners\Backend\Inventory\Peripheral\PeripheralEventListener@onDeleted'
      );
      //
      $events->listen(
         \App\Events\Backend\Inventory\Peripheral\PeripheralRestored::class,
         'App\Listeners\Backend\Inventory\Peripheral\PeripheralEventListener@onRestored'
      );
      //
      $events->listen(
         \App\Events\Backend\Inventory\Peripheral\PeripheralPermanentlyDeleted::class,
         'App\Listeners\Backend\Inventory\Peripheral\PeripheralEventListener@onPermanentlyDeleted'
      );
      //
      $events->listen(
         \App\Events\Backend\Inventory\Peripheral\PeripheralUploaded::class,
         'App\Listeners\Backend\Inventory\Peripheral\PeripheralEventListener@onUploaded'
      );
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
