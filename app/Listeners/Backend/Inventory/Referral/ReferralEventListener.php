<?php

namespace App\Listeners\Backend\Inventory\Referral;

class ReferralEventListener
{
   /**
   * @var string
   */
   private $history_slug = 'Referral';

   /**
   * @param $event
   */
   public function onCreated($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->referral->id)
      ->withText('trans("history.backend.inventory.referrals.created") <strong>{referral}</strong>')
      ->withIcon('plus')
      ->withClass('bg-green')
      ->withAssets([
         'referral_link' => ['admin.inventory.referral.show', $event->referral->name, $event->referral->id],
      ])
      ->log();
   }

   // /**
   // * @param $event
   // */
   public function onUpdated($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->referral->id)
      ->withText('trans("history.backend.inventory.referrals.updated") <strong>{referral}</strong>')
      ->withIcon('save')
      ->withClass('bg-aqua')
      ->withAssets([
         'referral_link' => ['admin.inventory.referral.show', $event->referral->name, $event->referral->id],
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
      ->withEntity($event->referral->id)
      ->withText('trans("history.backend.inventory.referrals.deleted") <strong>{referral}</strong>')
      ->withIcon('trash')
      ->withClass('bg-maroon')
      ->withAssets([
         'referral_link' => ['admin.inventory.referral.show', $event->referral->name, $event->referral->id],
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
      ->withEntity($event->referral->id)
      ->withText('trans("history.backend.inventory.referrals.restored") <strong>{referral}</strong>')
      ->withIcon('refresh')
      ->withClass('bg-aqua')
      ->withAssets([
         'referral_link' => ['admin.inventory.referral.show', $event->referral->name, $event->referral->id],
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
      ->withEntity($event->referral->id)
      ->withText('trans("history.backend.inventory.referrals.permanently_deleted") <strong>{referral}</strong>')
      ->withIcon('trash')
      ->withClass('bg-maroon')
      ->withAssets([
         'referral_string' => $event->referral->name,
      ])
      ->log();

      history()->withType($this->history_slug)
      ->withEntity($event->referral->id)
      ->withAssets([
         'referral_string' => $event->referral->name,
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
         \App\Events\Backend\Inventory\Referral\ReferralCreated::class,
         'App\Listeners\Backend\Inventory\Referral\ReferralEventListener@onCreated'
      );

      $events->listen(
         \App\Events\Backend\Inventory\Referral\ReferralUpdated::class,
         'App\Listeners\Backend\Inventory\Referral\ReferralEventListener@onUpdated'
      );

      $events->listen(
         \App\Events\Backend\Inventory\Referral\ReferralDeleted::class,
         'App\Listeners\Backend\Inventory\Referral\ReferralEventListener@onDeleted'
      );
      //
      $events->listen(
         \App\Events\Backend\Inventory\Referral\ReferralRestored::class,
         'App\Listeners\Backend\Inventory\Referral\ReferralEventListener@onRestored'
      );
      //
      $events->listen(
         \App\Events\Backend\Inventory\Referral\ReferralPermanentlyDeleted::class,
         'App\Listeners\Backend\Inventory\Referral\ReferralEventListener@onPermanentlyDeleted'
      );
   }
}
