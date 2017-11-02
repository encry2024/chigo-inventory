<div class="pull-right mb-10 hidden-sm hidden-xs">
   {{ link_to_route('admin.inventory.item.aircon.index', trans('menus.backend.inventory.aircon.all'), [], ['class' => 'btn btn-primary btn-xs']) }}
   {{ link_to_route('admin.inventory.item.aircon.checked_out_aircons', trans('menus.backend.inventory.aircon.view_check_out'), [], ['class' => 'btn btn-primary btn-xs']) }}
   {{ link_to_route('admin.inventory.item.aircon.check_in.page', trans('menus.backend.inventory.aircon.check_in'), [], ['class' => 'btn btn-info btn-xs']) }}
   {{ link_to_route('admin.inventory.item.aircon.check_out.page', trans('menus.backend.inventory.aircon.check_out'), [], ['class' => 'btn btn-info btn-xs']) }}
   @needspermissions(['view-backend', 'view-inventory', 'manage-inventory'])
   {{ link_to_route('admin.inventory.item.aircon.import', trans('menus.backend.inventory.aircon.import'), [], ['class' => 'btn btn-success btn-xs']) }}
   @endauth
   {{ link_to_route('admin.inventory.item.aircon.deactivated', trans('menus.backend.inventory.aircon.deactivated'), [], ['class' => 'btn btn-warning btn-xs']) }}
   {{ link_to_route('admin.inventory.item.aircon.view.pending', trans('menus.backend.inventory.aircon.view_pending_aircons'), [], ['class' => 'btn btn-warning btn-xs']) }}
   {{ link_to_route('admin.inventory.item.aircon.deleted', trans('menus.backend.inventory.aircon.deleted'), [], ['class' => 'btn btn-danger btn-xs']) }}
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
   <div class="btn-group">
      <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
         {{ trans('menus.backend.access.users.main') }} <span class="caret"></span>
      </button>

      <ul class="dropdown-menu" role="menu">
         <li>{{ link_to_route('admin.inventory.item.aircon.index', trans('menus.backend.inventory.aircon.all')) }}</li>
         <li>{{ link_to_route('admin.inventory.item.aircon.checked_out_aircons', trans('menus.backend.inventory.aircon.view_check_out')) }}</li>
         <li>{{ link_to_route('admin.inventory.item.aircon.check_in.page', trans('menus.backend.inventory.aircon.check_in')) }}</li>
         <li>{{ link_to_route('admin.inventory.item.aircon.check_out.page', trans('menus.backend.inventory.aircon.check_out')) }}</li>
         @needspermissions(['view-backend', 'view-inventory', 'manage-inventory'])
         <li>{{ link_to_route('admin.inventory.item.aircon.import', trans('menus.backend.inventory.aircon.import')) }}</li>
         @endauth
         <li>{{ link_to_route('admin.inventory.item.aircon.deactivated', trans('menus.backend.inventory.aircon.deactivated')) }}</li>
         <li>{{ link_to_route('admin.inventory.item.aircon.view.pending', trans('menus.backend.inventory.aircon.view_pending_aircons')) }}</li>
         <li>{{ link_to_route('admin.inventory.item.aircon.deleted', trans('menus.backend.inventory.aircon.deleted')) }}</li>
      </ul>
   </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
