<div class="pull-right mb-10 hidden-sm hidden-xs">
   {{ link_to_route('admin.workflow.sale.index', trans('menus.backend.workflows.sales.all'), [], ['class' => 'btn btn-primary btn-xs']) }}
   {{ link_to_route('admin.workflow.sale.generate_gatepass', 'Generate Gatepass', [], ['class' => 'btn btn-info btn-xs']) }}
   @needspermissions(['view-backend', 'view-sales', 'manage-sales'])
   {{ link_to_route('admin.workflow.sale.create', trans('menus.backend.workflows.sales.create'), [], ['class' => 'btn btn-success btn-xs']) }}
   {{ link_to_route('admin.workflow.sale.deleted', trans('menus.backend.workflows.sales.deleted'), [], ['class' => 'btn btn-danger btn-xs']) }}
   @endauth
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
   <div class="btn-group">
      <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
         {{ trans('menus.backend.access.users.main') }} <span class="caret"></span>
      </button>

      <ul class="dropdown-menu" role="menu">
         <li>{{ link_to_route('admin.workflow.sale.index', trans('menus.backend.workflows.sales.all')) }}</li>
         <li>{{ link_to_route('admin.workflow.sale.generate_gatepass', 'Generate Gatepass') }}</li>
         @needspermissions(['view-backend', 'view-sales', 'manage-sales'])
         <li>{{ link_to_route('admin.workflow.sale.create', trans('menus.backend.workflows.sales.create')) }}</li>
         <li>{{ link_to_route('admin.workflow.sale.deleted', trans('menus.backend.workflows.sales.deleted')) }}</li>
         @endauth
      </ul>
   </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
