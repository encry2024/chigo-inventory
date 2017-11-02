<div class="pull-right mb-10 hidden-sm hidden-xs">
   {{ link_to_route('admin.inventory.technician.index', trans('menus.backend.inventory.technicians.all'), [], ['class' => 'btn btn-primary btn-xs']) }}
   @needspermissions(['view-backend', 'view-technician', 'manage-technician'])
   {{ link_to_route('admin.inventory.technician.create', trans('menus.backend.inventory.technicians.create'), [], ['class' => 'btn btn-success btn-xs']) }}
   @endauth
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
   <div class="btn-group">
      <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
         {{ trans('menus.backend.access.users.main') }} <span class="caret"></span>
      </button>

      <ul class="dropdown-menu" role="menu">
         <li>{{ link_to_route('admin.inventory.technician.index', trans('menus.backend.access.users.all')) }}</li>
         @needspermissions(['view-backend', 'view-technician', 'manage-technician'])
         <li>{{ link_to_route('admin.inventory.technician.create', trans('menus.backend.access.users.create')) }}</li>
         @endauth
      </ul>
   </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
