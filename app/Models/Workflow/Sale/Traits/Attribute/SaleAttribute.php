<?php

namespace App\Models\Workflow\Sale\Traits\Attribute;

/**
* Class SaleAttribute.
*/
trait SaleAttribute
{

   /**
   * @return string
   */
   public function getActiveLabelAttribute()
   {
      if($this->status == 0) {
         return "<label class='label label-info'>Open</label>";
      } elseif ($this->status == 1) {
         return "<label class='label label-warning'>Incomplete Payment</label>";
      } elseif ($this->status == 2) {
         return "<label class='label label-success'>Close</label>";
      }
   }

   /**
   * @return bool
   */
   public function isActive()
   {
      return $this->status == "Processed";
   }

   public function getShowButtonAttribute()
   {
      return '<a href="'.route('admin.workflow.sale.show', $this).'" class="btn btn-xs btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.view').'"></i></a> ';
   }

   /**
   * @return string
   */
   public function getEditButtonAttribute()
   {
      return '<a href="'.route('admin.workflow.sale.edit', $this).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.edit').'"></i></a> ';
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
      return '<a href="'.route('admin.workflow.sale.destroy', $this).'"
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
      return '<a href="'.route('admin.workflow.sale.restore', $this).'" name="aircon" class="btn btn-xs btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.workflows.sales.restore_sale').'"></i></a> ';
   }

   /**
   * @return string
   */
   public function getDeletePermanentlyButtonAttribute()
   {
      if(access()->id() == 1) {
         return '<a href="'.route('admin.workflow.sale.delete-permanently', $this).'" name="delete_sale_perm" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.workflows.sales.delete_permanently').'"></i></a> ';
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
      $this->getDeleteButtonAttribute();
   }

}
