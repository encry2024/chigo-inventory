<?php

namespace App\Models\Inventory\Item\Aircon\Traits\Attribute;

/**
* Class UserAttribute.
*/
trait AirconAttribute
{

   /**
   * @return string
   */
   public function getActiveLabelAttribute()
   {
      if ($this->status == 1) {
         return "<label class='label label-primary'>".trans('labels.general.checked_in').'</label>';
      } elseif ($this->status == 2) {
         return "<label class='label label-warning'>".trans('labels.general.pending').'</label>';
      } elseif ($this->status == 0) {
         return "<label class='label label-success'>".trans('labels.general.checked_out').'</label>';
      }
   }

   public function getShowButtonAttribute()
   {
      return '<a href="'.route('admin.inventory.item.aircon.show', $this).'" class="btn btn-xs btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.view').'"></i></a> ';
   }

   /**
   * @return string
   */
   public function getEditButtonAttribute()
   {
      return '<a href="'.route('admin.inventory.item.aircon.edit', $this).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.edit').'"></i></a> ';
   }

   /**
   * @return string
   */
   // public function getStatusButtonAttribute()
   // {
   //    if ($this->id != access()->id()) {
   //       switch ($this->status) {
   //          case 0:
   //          return '<a href="'.route('admin.inventory.item.aircon.mark', [
   //             $this,
   //             1,
   //             ]).'" class="btn btn-xs btn-success"><i class="fa fa-play" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.inventory.item.aircons.activate').'"></i></a> ';
   //             // No break
   //
   //             case 1:
   //             return '<a href="'.route('admin.inventory.item.aircon.mark', [
   //                $this,
   //                0,
   //                ]).'" class="btn btn-xs btn-warning"><i class="fa fa-pause" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.inventory.item.aircons.deactivate').'"></i></a> ';
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
      return '<a href="'.route('admin.inventory.item.aircon.destroy', $this).'"
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
      return '<a href="'.route('admin.inventory.item.aircon.restore', $this).'" name="aircon" class="btn btn-xs btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.inventory.items.aircons.restore_aircon').'"></i></a> ';
   }

   /**
   * @return string
   */
   public function getLogButtonAttribute()
   {
      return '<a href="'.route('admin.inventory.item.aircon.log', $this).'" name="aircon" class="btn btn-xs btn-info"><i class="fa fa-flag" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.inventory.items.aircons.log_aircon').'"></i></a> ';
   }

   /**
   * @return string
   */
   public function getDeletePermanentlyButtonAttribute()
   {
      if(access()->id() == 1) {
         return '<a href="'.route('admin.inventory.item.aircon.delete-permanently', $this).'" name="delete_user_perm" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.inventory.items.aircons.delete_permanently').'"></i></a> ';
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
