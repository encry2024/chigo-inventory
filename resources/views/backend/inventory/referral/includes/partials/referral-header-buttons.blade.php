<div class="pull-right mb-10 hidden-sm hidden-xs">
   {{ link_to_route('admin.inventory.referral.index', trans('menus.backend.inventory.referral.all'), [], ['class' => 'btn btn-primary btn-xs']) }}
   @needspermissions(['view-backend', 'view-referral', 'manage-referral'])
   {{ link_to_route('admin.inventory.referral.create', trans('menus.backend.inventory.referral.create'), [], ['class' => 'btn btn-success btn-xs']) }}
   {{ link_to_route('admin.inventory.referral.deleted', trans('menus.backend.inventory.referral.deleted'), [], ['class' => 'btn btn-danger btn-xs']) }}
   @endauth
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
   <div class="btn-group">
      <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
         {{ trans('menus.backend.access.users.main') }} <span class="caret"></span>
      </button>

      <ul class="dropdown-menu" role="menu">
         <li>{{ link_to_route('admin.inventory.referral.index', trans('menus.backend.inventory.referral.all')) }}</li>
         @needspermissions(['view-backend', 'view-referral', 'manage-referral'])
         <li>{{ link_to_route('admin.inventory.referral.create', trans('menus.backend.inventory.referral.create')) }}</li>
         <li>{{ link_to_route('admin.inventory.referral.deleted', trans('menus.backend.inventory.referral.deleted')) }}</li>
         @endauth
      </ul>
   </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
