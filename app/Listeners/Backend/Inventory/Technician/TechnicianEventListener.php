<?php

namespace App\Listeners\Backend\Inventory\Technician;

class TechnicianEventListener
{
   /**
   * @var string
   */
   private $history_slug = 'Technician';

   /**
   * @param $event
   */
   public function onCreated($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->technician->id)
      ->withText('trans("history.backend.technician.created") <strong>{technician}</strong>')
      ->withIcon('plus')
      ->withClass('bg-green')
      ->withAssets([
         'technician_link' => ['admin.inventory.technician.show', $event->technician->name, $event->technician->id],
      ])
      ->log();
   }

   // /**
   // * @param $event
   // */
   public function onUpdated($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->technician->id)
      ->withText('trans("history.backend.technician.updated") <strong>{technician}</strong>')
      ->withIcon('save')
      ->withClass('bg-aqua')
      ->withAssets([
         'technician_link' => ['admin.inventory.technician.show', $event->technician->name, $event->technician->id],
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
      ->withEntity($event->technician->id)
      ->withText('trans("history.backend.technician.deleted") <strong>{technician}</strong>')
      ->withIcon('trash')
      ->withClass('bg-maroon')
      ->withAssets([
         'technician_link' => ['admin.inventory.technician.show', $event->technician->name, $event->technician->id],
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
      ->withEntity($event->technician->id)
      ->withText('trans("history.backend.technician.restored") <strong>{technician}</strong>')
      ->withIcon('refresh')
      ->withClass('bg-aqua')
      ->withAssets([
         'technician_link' => ['admin.inventory.technician.show', $event->technician->name, $event->technician->id],
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
      ->withEntity($event->technician->id)
      ->withText('trans("history.backend.technician.permanently_deleted") <strong>{technician}</strong>')
      ->withIcon('trash')
      ->withClass('bg-maroon')
      ->withAssets([
         'technician_string' => $event->technician->name,
      ])
      ->log();

      history()->withType($this->history_slug)
      ->withEntity($event->technician->id)
      ->withAssets([
         'technician_string' => $event->technician->name,
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
         \App\Events\Backend\Inventory\Technician\TechnicianCreated::class,
         'App\Listeners\Backend\Inventory\Technician\TechnicianEventListener@onCreated'
      );

      $events->listen(
         \App\Events\Backend\Inventory\Technician\TechnicianUpdated::class,
         'App\Listeners\Backend\Inventory\Technician\TechnicianEventListener@onUpdated'
      );

      $events->listen(
         \App\Events\Backend\Inventory\Technician\TechnicianDeleted::class,
         'App\Listeners\Backend\Inventory\Technician\TechnicianEventListener@onDeleted'
      );
      //
      $events->listen(
         \App\Events\Backend\Inventory\Technician\TechnicianRestored::class,
         'App\Listeners\Backend\Inventory\Technician\TechnicianEventListener@onRestored'
      );

      $events->listen(
         \App\Events\Backend\Inventory\Technician\TechnicianPermanentlyDeleted::class,
         'App\Listeners\Backend\Inventory\Technician\TechnicianEventListener@onPermanentlyDeleted'
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
