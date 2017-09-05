<?php

namespace App\Listeners\Backend\Workflow\Technical;

class TechnicalEventListener
{
   /**
   * @var string
   */
   private $history_slug = 'Technical';

   /**
   * @param $event
   */
   public function onCreated($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->technical->id)
      ->withText('trans("history.backend.workflows.technicals.created") <strong>{technical}</strong>')
      ->withIcon('plus')
      ->withClass('bg-green')
      ->withAssets([
         'technical_link' => ['admin.workflow.technical.show', $event->technical->reference_id, $event->technical->id],
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
      ->withEntity($event->technical->id)
      ->withText('trans("history.backend.workflows.technicals.deleted") <strong>{technical}</strong>')
      ->withIcon('trash')
      ->withClass('bg-maroon')
      ->withAssets([
         'technical_link' => ['admin.workflow.technical.show', $event->technical->reference_number, $event->technical->id],
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
      ->withEntity($event->technical->id)
      ->withText('trans("history.backend.workflows.technicals.restored") <strong>{technical}</strong>')
      ->withIcon('refresh')
      ->withClass('bg-aqua')
      ->withAssets([
         'technical_link' => ['admin.workflow.technical.show', $event->technical->reference_number, $event->technical->id],
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
      ->withEntity($event->technical->id)
      ->withText('trans("history.backend.workflows.technicals.permanently_deleted") <strong>{technical}</strong>')
      ->withIcon('trash')
      ->withClass('bg-maroon')
      ->withAssets([
         'technical_string' => $event->technical->reference_number,
      ])
      ->log();

      history()->withType($this->history_slug)
      ->withEntity($event->technical->id)
      ->withAssets([
         'technical_string' => $event->technical->reference_number,
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
         \App\Events\Backend\Workflow\Technical\TechnicalCreated::class,
         'App\Listeners\Backend\Workflow\Technical\TechnicalEventListener@onCreated'
      );

      // $events->listen(
      //    \App\Events\Backend\Access\User\UserUpdated::class,
      //    'App\Listeners\Backend\Access\User\UserEventListener@onUpdated'
      // );
      //
      $events->listen(
         \App\Events\Backend\Workflow\Technical\TechnicalDeleted::class,
         'App\Listeners\Backend\Workflow\Technical\TechnicalEventListener@onDeleted'
      );
      //
      $events->listen(
         \App\Events\Backend\Workflow\Technical\TechnicalRestored::class,
         'App\Listeners\Backend\Workflow\Technical\TechnicalEventListener@onRestored'
      );
      //
      $events->listen(
         \App\Events\Backend\Workflow\Technical\TechnicalPermanentlyDeleted::class,
         'App\Listeners\Backend\Workflow\Technical\TechnicalEventListener@onPermanentlyDeleted'
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
