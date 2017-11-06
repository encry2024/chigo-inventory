<?php

use Carbon\Carbon;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;

/**
* Class PermissionTableSeeder.
*/
class PermissionTableSeeder extends Seeder
{
   use DisableForeignKeys, TruncateTable;

   /**
   * Run the database seed.
   *
   * @return void
   */
   public function run()
   {
      $this->disableForeignKeys();
      $this->truncateMultiple([config('access.permissions_table'), config('access.permission_role_table')]);

      /**
      * Don't need to assign any permissions to administrator because the all flag is set to true
      * in RoleTableSeeder.php.
      */

      /**
      * Misc Access Permissions.
      */
      $permission_model = config('access.permission');
      $viewBackend = new $permission_model();
      $viewBackend->name = 'view-backend';
      $viewBackend->display_name = 'View Backend';
      $viewBackend->sort = 1;
      $viewBackend->created_at = Carbon::now();
      $viewBackend->updated_at = Carbon::now();
      $viewBackend->save();

      $permission_model = config('access.permission');
      $viewBackend = new $permission_model();
      $viewBackend->name = 'view-technical';
      $viewBackend->display_name = 'View Technical';
      $viewBackend->sort = 2;
      $viewBackend->created_at = Carbon::now();
      $viewBackend->updated_at = Carbon::now();
      $viewBackend->save();

      $permission_model = config('access.permission');
      $viewBackend = new $permission_model();
      $viewBackend->name = 'manage-technical';
      $viewBackend->display_name = 'Manage Technical';
      $viewBackend->sort = 3;
      $viewBackend->created_at = Carbon::now();
      $viewBackend->updated_at = Carbon::now();
      $viewBackend->save();

      $permission_model = config('access.permission');
      $viewBackend = new $permission_model();
      $viewBackend->name = 'view-sales';
      $viewBackend->display_name = 'View Sales';
      $viewBackend->sort = 4;
      $viewBackend->created_at = Carbon::now();
      $viewBackend->updated_at = Carbon::now();
      $viewBackend->save();

      $permission_model = config('access.permission');
      $viewBackend = new $permission_model();
      $viewBackend->name = 'manage-sales';
      $viewBackend->display_name = 'Manage Sales';
      $viewBackend->sort = 5;
      $viewBackend->created_at = Carbon::now();
      $viewBackend->updated_at = Carbon::now();
      $viewBackend->save();

      $permission_model = config('access.permission');
      $viewBackend = new $permission_model();
      $viewBackend->name = 'view-customer';
      $viewBackend->display_name = 'View Customer';
      $viewBackend->sort = 6;
      $viewBackend->created_at = Carbon::now();
      $viewBackend->updated_at = Carbon::now();
      $viewBackend->save();

      $permission_model = config('access.permission');
      $viewBackend = new $permission_model();
      $viewBackend->name = 'manage-customer';
      $viewBackend->display_name = 'Manage Customer';
      $viewBackend->sort = 7;
      $viewBackend->created_at = Carbon::now();
      $viewBackend->updated_at = Carbon::now();
      $viewBackend->save();

      $permission_model = config('access.permission');
      $viewBackend = new $permission_model();
      $viewBackend->name = 'view-inventory';
      $viewBackend->display_name = 'View Inventory';
      $viewBackend->sort = 8;
      $viewBackend->created_at = Carbon::now();
      $viewBackend->updated_at = Carbon::now();
      $viewBackend->save();

      $permission_model = config('access.permission');
      $viewBackend = new $permission_model();
      $viewBackend->name = 'manage-inventory';
      $viewBackend->display_name = 'Manage Inventory';
      $viewBackend->sort = 9;
      $viewBackend->created_at = Carbon::now();
      $viewBackend->updated_at = Carbon::now();
      $viewBackend->save();

      $permission_model = config('access.permission');
      $viewBackend = new $permission_model();
      $viewBackend->name = 'view-workflow';
      $viewBackend->display_name = 'View Workflow';
      $viewBackend->sort = 10;
      $viewBackend->created_at = Carbon::now();
      $viewBackend->updated_at = Carbon::now();
      $viewBackend->save();

      $permission_model = config('access.permission');
      $viewBackend = new $permission_model();
      $viewBackend->name = 'manage-workflow';
      $viewBackend->display_name = 'Manage Workflow';
      $viewBackend->sort = 11;
      $viewBackend->created_at = Carbon::now();
      $viewBackend->updated_at = Carbon::now();
      $viewBackend->save();

      $permission_model = config('access.permission');
      $viewBackend = new $permission_model();
      $viewBackend->name = 'view-collection';
      $viewBackend->display_name = 'View Collection';
      $viewBackend->sort = 12;
      $viewBackend->created_at = Carbon::now();
      $viewBackend->updated_at = Carbon::now();
      $viewBackend->save();

      $permission_model = config('access.permission');
      $viewBackend = new $permission_model();
      $viewBackend->name = 'manage-collection';
      $viewBackend->display_name = 'Manage Collection';
      $viewBackend->sort = 13;
      $viewBackend->created_at = Carbon::now();
      $viewBackend->updated_at = Carbon::now();
      $viewBackend->save();

      $permission_model = config('access.permission');
      $viewBackend = new $permission_model();
      $viewBackend->name = 'view-technician';
      $viewBackend->display_name = 'View Technician';
      $viewBackend->sort = 14;
      $viewBackend->created_at = Carbon::now();
      $viewBackend->updated_at = Carbon::now();
      $viewBackend->save();

      $permission_model = config('access.permission');
      $viewBackend = new $permission_model();
      $viewBackend->name = 'manage-technician';
      $viewBackend->display_name = 'Manage Technician';
      $viewBackend->sort = 15;
      $viewBackend->created_at = Carbon::now();
      $viewBackend->updated_at = Carbon::now();
      $viewBackend->save();

      $permission_model = config('access.permission');
      $viewBackend = new $permission_model();
      $viewBackend->name = 'view-referral';
      $viewBackend->display_name = 'View Referral';
      $viewBackend->sort = 16;
      $viewBackend->created_at = Carbon::now();
      $viewBackend->updated_at = Carbon::now();
      $viewBackend->save();

      $permission_model = config('access.permission');
      $viewBackend = new $permission_model();
      $viewBackend->name = 'manage-referral';
      $viewBackend->display_name = 'Manage Referral';
      $viewBackend->sort = 17;
      $viewBackend->created_at = Carbon::now();
      $viewBackend->updated_at = Carbon::now();
      $viewBackend->save();

      $permission_model = config('access.permission');
      $viewBackend = new $permission_model();
      $viewBackend->name = 'view-report';
      $viewBackend->display_name = 'View Report';
      $viewBackend->sort = 18;
      $viewBackend->created_at = Carbon::now();
      $viewBackend->updated_at = Carbon::now();
      $viewBackend->save();

      $permission_model = config('access.permission');
      $viewBackend = new $permission_model();
      $viewBackend->name = 'manage-report';
      $viewBackend->display_name = 'Manage Report';
      $viewBackend->sort = 19;
      $viewBackend->created_at = Carbon::now();
      $viewBackend->updated_at = Carbon::now();
      $viewBackend->save();

      $this->enableForeignKeys();
   }
}
