<div class="pull-right mb-10 hidden-sm hidden-xs">
   {{ link_to_route('admin.inventory.item.peripheral.index', trans('menus.backend.inventory.peripheral.all'), [], ['class' => 'btn btn-primary btn-xs']) }}
   @needspermissions(['view-backend', 'view-inventory', 'manage-inventory'])
   {{ link_to_route('admin.inventory.item.peripheral.create', trans('menus.backend.inventory.peripheral.create'), [], ['class' => 'btn btn-success btn-xs']) }}
   {{ link_to_route('admin.inventory.item.peripheral.deleted', trans('menus.backend.inventory.peripheral.deleted'), [], ['class' => 'btn btn-danger btn-xs']) }}
   @endauth
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
   <div class="btn-group">
      <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
         {{ trans('menus.backend.access.users.main') }} <span class="caret"></span>
      </button>

      <ul class="dropdown-menu" role="menu">
         <li>{{ link_to_route('admin.inventory.item.peripheral.index', trans('menus.backend.inventory.peripheral.all')) }}</li>
         @needspermissions(['view-backend', 'view-inventory', 'manage-inventory'])
         <li>{{ link_to_route('admin.inventory.item.peripheral.create', trans('menus.backend.inventory.peripheral.create')) }}</li>
         <li>{{ link_to_route('admin.inventory.item.peripheral.deleted', trans('menus.backend.inventory.peripheral.deleted')) }}</li>
         @endauth
      </ul>
   </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
