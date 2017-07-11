<?php

namespace App\Listeners\Backend\Workflow\Sale;

class SaleEventListener
{
   /**
   * @var string
   */
   private $history_slug = 'Sale';

   /**
   * @param $event
   */
   public function onCreated($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->sale->id)
      ->withText('trans("history.backend.workflows.sales.created") <strong>{sale}</strong>')
      ->withIcon('plus')
      ->withClass('bg-green')
      ->withAssets([
         'sale_link' => ['admin.workflow.sale.show', $event->sale->reference_number, $event->sale->id],
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
      ->withEntity($event->sale->id)
      ->withText('trans("history.backend.workflows.sales.deleted") <strong>{sale}</strong>')
      ->withIcon('trash')
      ->withClass('bg-maroon')
      ->withAssets([
         'sale_link' => ['admin.workflow.sale.show', $event->sale->reference_number, $event->sale->id],
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
      ->withEntity($event->sale->id)
      ->withText('trans("history.backend.workflows.sales.restored") <strong>{sale}</strong>')
      ->withIcon('refresh')
      ->withClass('bg-aqua')
      ->withAssets([
         'sale_link' => ['admin.workflow.sale.show', $event->sale->reference_number, $event->sale->id],
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
      ->withEntity($event->sale->id)
      ->withText('trans("history.backend.workflows.sales.permanently_deleted") <strong>{sale}</strong>')
      ->withIcon('trash')
      ->withClass('bg-maroon')
      ->withAssets([
         'sale_string' => $event->sale->reference_number,
      ])
      ->log();

      history()->withType($this->history_slug)
      ->withEntity($event->sale->id)
      ->withAssets([
         'sale_string' => $event->sale->reference_number,
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
         \App\Events\Backend\Workflow\Sale\SaleCreated::class,
         'App\Listeners\Backend\Workflow\Sale\SaleEventListener@onCreated'
      );

      // $events->listen(
      //    \App\Events\Backend\Access\User\UserUpdated::class,
      //    'App\Listeners\Backend\Access\User\UserEventListener@onUpdated'
      // );
      //
      $events->listen(
         \App\Events\Backend\Workflow\Sale\SaleDeleted::class,
         'App\Listeners\Backend\Workflow\Sale\SaleEventListener@onDeleted'
      );
      //
      $events->listen(
         \App\Events\Backend\Workflow\Sale\SaleRestored::class,
         'App\Listeners\Backend\Workflow\Sale\SaleEventListener@onRestored'
      );
      //
      $events->listen(
         \App\Events\Backend\Workflow\Sale\UserPermanentlyDeleted::class,
         'App\Listeners\Backend\Workflow\Sale\SaleEventListener@onPermanentlyDeleted'
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
