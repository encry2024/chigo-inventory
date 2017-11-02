<div class="pull-right mb-10 hidden-sm hidden-xs">
   {{ link_to_route('admin.workflow.technical.index', trans('menus.backend.workflows.technicals.all'), [], ['class' => 'btn btn-primary btn-xs']) }}
   @needspermissions(['view-backend', 'view-technical', 'manage-technical'])
   {{ link_to_route('admin.workflow.technical.valdiate_schedule', trans('menus.backend.workflows.technicals.create'), [], ['class' => 'btn btn-success btn-xs']) }}
   {{ link_to_route('admin.workflow.technical.show_calendar', trans('menus.backend.workflows.technicals.receipt'), [], ['class' => 'btn btn-success btn-xs']) }}
   @endauth
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
   <div class="btn-group">
      <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
         {{ trans('menus.backend.access.users.main') }} <span class="caret"></span>
      </button>

      <ul class="dropdown-menu" role="menu">
         <li>{{ link_to_route('admin.workflow.technical.index', trans('menus.backend.workflows.technicals.all')) }}</li>
         @needspermissions(['view-backend', 'view-technical', 'manage-technical'])
         <li>{{ link_to_route('admin.workflow.technical.valdiate_schedule', trans('menus.backend.workflows.technicals.create')) }}</li>
         <li>{{ link_to_route('admin.workflow.technical.show_calendar', trans('menus.backend.workflows.technicals.receipt')) }}</li>
         @endauth
      </ul>
   </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
