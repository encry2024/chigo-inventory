<!-- Left side column. contains the logo and sidebar -->
<!-- https://hitomi.la/reader/1138370.html#13 -->
<aside class="main-sidebar">
   <!-- sidebar: style can be found in sidebar.less -->
   <section class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
         <div class="pull-left image">
            <img src="{{ access()->user()->picture }}" class="img-circle" alt="User Image" />
         </div><!--pull-left-->
         <div class="pull-left info">
            <p>{{ access()->user()->full_name }}</p>
            <!-- Status -->
            <p>{{ access()->user()->roles[0]->name }}<p>
         </div><!--pull-left-->
      </div><!--user-panel-->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
         <li class="header">{{ trans('menus.backend.sidebar.general') }}</li>

         <li class="{{ active_class(Active::checkUriPattern('admin/dashboard')) }}">
            <a href="{{ route('admin.dashboard') }}">
               <i class="fa fa-dashboard"></i>
               <span>{{ trans('menus.backend.sidebar.dashboard') }}</span>
            </a>
         </li>

         @permissions(['view-inventory', 'view-customer'])
         <li class="header">{{ trans('menus.backend.inventory.title') }}</li>
         @endauth

         @needspermissions(['view-backend', 'view-technician'])
         <li class="{{ active_class(Active::checkUriPattern('admin/inventory/technician*')) }}">
            <a href="{{ route('admin.inventory.technician.index') }}">
               <i class="fa fa-wrench"></i>
               <span>{{ trans('menus.backend.inventory.technicians.title') }}</span>
            </a>
         </li>
         @endauth

         @needspermissions(['view-backend', 'view-inventory'])
         <li class="{{ active_class(Active::checkUriPattern('admin/inventory/item/aircon*')) }}">
            <a href="{{ route('admin.inventory.item.aircon.index') }}">
               <i class="fa fa-snowflake-o"></i>
               <span>{{ trans('menus.backend.inventory.aircon.title') }}</span>
            </a>
         </li>

         <li class="{{ active_class(Active::checkUriPattern('admin/inventory/item/peripheral*')) }}">
            <a href="{{ route('admin.inventory.item.peripheral.index') }}">
               <i class="fa fa-cogs"></i>
               <span>{{ trans('menus.backend.inventory.peripheral.title') }}</span>
            </a>
         </li>
         @endauth

         @needspermissions(['view-backend', 'view-customer'])
         <li class="{{ active_class(Active::checkUriPattern('admin/inventory/customer*')) }}">
            <a href="{{ route('admin.inventory.customer.index') }}">
               <i class="fa fa-users"></i>
               <span>{{ trans('menus.backend.inventory.customer.title') }}</span>
            </a>
         </li>
         @endauth

         @needspermissions(['view-backend', 'view-referral'])
         <li class="{{ active_class(Active::checkUriPattern('admin/inventory/referral*')) }}">
            <a href="{{ route('admin.inventory.referral.index') }}">
               <i class="fa fa-users"></i>
               <span>{{ trans('menus.backend.inventory.referral.title') }}</span>
            </a>
         </li>
         @endauth

         @permissions(['view-backend', 'view-worklow', 'view-sales', 'view-technical'])
         <li class="header">{{ trans('menus.backend.sidebar.business_workflow') }}</li>
         @endauth

         @needspermissions(['view-backend', 'view-sales'])
         <li class="{{ active_class(Active::checkUriPattern('admin/workflow/sale*')) }}">
            <a href="{{ route('admin.workflow.sale.index') }}">
               <i class="fa fa-money"></i>
               <span>{{ trans('menus.backend.workflows.sales.title') }}</span>
            </a>
         </li>
         @endauth

         @needspermissions(['view-backend', 'view-technical'])
         <li class="{{ active_class(Active::checkUriPattern('admin/workflow/technical*')) }}">
            <a href="{{ route('admin.workflow.technical.index') }}">
               <i class="fa fa-cogs"></i>
               <span>{{ trans('menus.backend.workflows.technicals.title') }}</span>
            </a>
         </li>
         @endauth

         <li class="header">{{ trans('menus.backend.sidebar.system') }}</li>
         @role(1)
         <li class="{{ active_class(Active::checkUriPattern('admin/access/*')) }} treeview">
            <a href="#">
               <i class="fa fa-key"></i>
               <span>{{ trans('menus.backend.access.title') }}</span>
               <i class="fa fa-angle-left pull-right"></i>
            </a>

            <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/access/*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/access/*'), 'display: block;') }}">
               <li class="{{ active_class(Active::checkUriPattern('admin/access/user*')) }}">
                  <a href="{{ route('admin.access.user.index') }}">
                     <i class="fa fa-circle-o"></i>
                     <span>{{ trans('labels.backend.access.users.management') }}</span>
                  </a>
               </li>

               <li class="{{ active_class(Active::checkUriPattern('admin/access/role*')) }}">
                  <a href="{{ route('admin.access.role.index') }}">
                     <i class="fa fa-circle-o"></i>
                     <span>{{ trans('labels.backend.access.roles.management') }}</span>
                  </a>
               </li>
            </ul>
         </li>
         @endauth

         <li class="{{ active_class(Active::checkUriPattern('admin/log-viewer*')) }} treeview">
            <a href="#">
               <i class="fa fa-list"></i>
               <span>{{ trans('menus.backend.log-viewer.main') }}</span>
               <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'display: block;') }}">
               <li class="{{ active_class(Active::checkUriPattern('admin/log-viewer')) }}">
                  <a href="{{ route('log-viewer::dashboard') }}">
                     <i class="fa fa-circle-o"></i>
                     <span>{{ trans('menus.backend.log-viewer.dashboard') }}</span>
                  </a>
               </li>

               <li class="{{ active_class(Active::checkUriPattern('admin/log-viewer/logs')) }}">
                  <a href="{{ route('log-viewer::logs.list') }}">
                     <i class="fa fa-circle-o"></i>
                     <span>{{ trans('menus.backend.log-viewer.logs') }}</span>
                  </a>
               </li>
            </ul>
         </li>
      </ul><!-- /.sidebar-menu -->
   </section><!-- /.sidebar -->
</aside>
