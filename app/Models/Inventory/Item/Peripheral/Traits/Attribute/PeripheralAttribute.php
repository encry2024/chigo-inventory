<?php

namespace App\Models\Inventory\Item\Peripheral\Traits\Attribute;

/**
* Class PeripheralAttribute.
*/
trait PeripheralAttribute
{

   /**
   * @return string
   */
   // public function getActiveLabelAttribute()
   // {
   //    if ($this->status == 1) {
   //       return "<label class='label label-primary'>".trans('labels.general.checked_in').'</label>';
   //    } elseif ($this->status == 2) {
   //       return "<label class='label label-warning'>".trans('labels.general.pending').'</label>';
   //    } elseif ($this->status == 0) {
   //       return "<label class='label label-success'>".trans('labels.general.checked_out').'</label>';
   //    }
   // }

   public function getShowButtonAttribute()
   {
      return '<a href="'.route('admin.inventory.item.peripheral.show', $this).'" class="btn btn-xs btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.view').'"></i></a> ';
   }

   /**
   * @return string
   */
   public function getEditButtonAttribute()
   {
      return '<a href="'.route('admin.inventory.item.peripheral.edit', $this).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.edit').'"></i></a> ';
   }

   /**
   * @return string
   */
   // public function getStatusButtonAttribute()
   // {
   //    if ($this->id != access()->id()) {
   //       switch ($this->status) {
   //          case 0:
   //          return '<a href="'.route('admin.inventory.item.peripheral.mark', [
   //             $this,
   //             1,
   //             ]).'" class="btn btn-xs btn-success"><i class="fa fa-play" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.inventory.item.peripherals.activate').'"></i></a> ';
   //             // No break
   //
   //             case 1:
   //             return '<a href="'.route('admin.inventory.item.peripheral.mark', [
   //                $this,
   //                0,
   //                ]).'" class="btn btn-xs btn-warning"><i class="fa fa-pause" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.inventory.item.peripherals.deactivate').'"></i></a> ';
   //                // No break
   //
   //                default:
   //                return '';
   //                // No break
   //             }
   //          }
   //
   //          return '';
   //       }

   /**
   * @return string
   */

   /**
   * @return string
   */
   public function getDeleteButtonAttribute()
   {
      return '<a href="'.route('admin.inventory.item.peripheral.destroy', $this).'"
      data-method="delete"
      data-trans-button-cancel="'.trans('buttons.general.cancel').'"
      data-trans-button-confirm="'.trans('buttons.general.crud.delete').'"
      data-trans-title="'.trans('strings.backend.general.are_you_sure').'"
      class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.delete').'"></i></a> ';
   }

   /**
   * @return string
   */
   public function getRestoreButtonAttribute()
   {
      return '<a href="'.route('admin.inventory.item.peripheral.restore', $this).'" name="peripheral" class="btn btn-xs btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.inventory.items.peripherals.restore_peripheral').'"></i></a> ';
   }

   /**
   * @return string
   */
   public function getLogButtonAttribute()
   {
      return '<a href="'.route('admin.inventory.item.peripheral.log', $this).'" name="peripheral" class="btn btn-xs btn-info"><i class="fa fa-flag" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.inventory.items.peripherals.log_peripheral').'"></i></a> ';
   }

   /**
   * @return string
   */
   public function getDeletePermanentlyButtonAttribute()
   {
      if(access()->id() == 1) {
         return '<a href="'.route('admin.inventory.item.peripheral.delete-permanently', $this).'" name="delete_peripheral_perm" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.inventory.items.peripherals.delete_permanently').'"></i></a> ';
      }
   }

   /**
   * @return string
   */
   public function getActionButtonsAttribute()
   {
      if ($this->trashed()) {
         return $this->getRestoreButtonAttribute().
         $this->getDeletePermanentlyButtonAttribute();
      }

      return
      $this->getShowButtonAttribute().
      $this->getEditButtonAttribute().
      $this->getDeleteButtonAttribute();
   }
}
