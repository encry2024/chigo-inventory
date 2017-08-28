<?php

return [

   /*
   |--------------------------------------------------------------------------
   | Menus Language Lines
   |--------------------------------------------------------------------------
   |
   | The following language lines are used in menu items throughout the system.
   | Regardless where it is placed, a menu item can be listed here so it is easily
   | found in a intuitive way.
   |
   */

   'backend' => [
      'access' => [
         'title' => 'Access Management',

         'roles' => [
            'all'        => 'All Roles',
            'create'     => 'Create Role',
            'edit'       => 'Edit Role',
            'management' => 'Role Management',
            'main'       => 'Roles',
         ],

         'users' => [
            'all'             => 'All Users',
            'change-password' => 'Change Password',
            'create'          => 'Create User',
            'deactivated'     => 'Deactivated Users',
            'deleted'         => 'Deleted Users',
            'edit'            => 'Edit User',
            'main'            => 'Users',
            'view'            => 'View User',
         ],
      ],

      'inventory' => [
         'title' => 'Inventory Management',
         'category' => [
            'title'  => 'Category Management',
            'view'   => 'View Category'
         ],

         'customer' => [
            'title'        => 'Customer Management',
            'all'          => 'All Customers',
            'create'       => 'Create Customer',
            'deleted'      => 'Deleted Customers',
            'edit'         => 'Edit Customer',
            'view'         => 'View Customer',
            'deactivated'  => 'Deactivated Customers',
         ],

         'aircon' => [
            'title'        => 'Aircon Management',
            'all'          => 'All Aircons',
            'create'       => 'Create Aircon',
            'deleted'      => 'Deleted Aircons',
            'edit'         => 'Edit Aircon',
            'view'         => 'View Aircon',
            'deactivated'  => 'Deactivated Aircons',
            'import'       => 'Import Aircon Excel',
            'pendings'     => 'Pending Aircons',
            'check_in'     => 'Check-in Aircons',
            'check_out'    => 'Check-out Aircons',
            'checked_out_aircons' => 'View Checked-Out Aircons',
            'view_pending_aircons'  => 'View Pending Aircons',
            'view_check_out'        => 'View Checked-Out Aircons'
         ],

         'peripherals' => [
            'title'     => 'Peripherals Management',
            'all'       => 'All Peripherals',
            'create'    => 'Create Peripheral',
            'deleted'   => 'Deleted Peripherals',
            'edit'      => 'Edit Peripheral',
            'view'      => 'View Peripheral'
         ],

         'technicians' => [
            'title'     => 'Technician Management',
            'all'       => 'All Techncians',
            'create'    => 'Create Techncian',
            'deleted'   => 'Deleted Techncians',
            'edit'      => 'Edit Techncian',
            'view'      => 'View Techncian'
         ]
      ],

      'workflows' => [
         'sales' => [
            'title' => 'Sales Workflow',

            'all'       => 'All Sales',
            'create'    => 'Create Sale Workflow',
            'deleted'   => 'Deleted Sale Workflow',
            'edit'      => 'Edit Sale Workflow',
            'view'      => 'View Sale Workflow'
         ],

         'technicals' => [
            'title'     => 'Technicals Workflow',

            'all'       => 'All Technicals',
            'create'    => 'Create Technical Workflow',
            'deleted'   => 'Deleted Technical Workflow',
            'edit'      => 'Edit Technical Workflow',
            'view'      => 'View Technical Workflow'
         ]
      ],

      'log-viewer' => [
         'main'      => 'Log Viewer',
         'dashboard' => 'Dashboard',
         'logs'      => 'Logs',
      ],

      'sidebar' => [
         'dashboard' => 'Dashboard',
         'general'   => 'General',
         'system'    => 'System',
         'business_workflow' => 'Workflow Management'
      ],
   ],

   'language-picker' => [
      'language' => 'Language',
      /*
      * Add the new language to this array.
      * The key should have the same language code as the folder name.
      * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
      * Be sure to add the new language in alphabetical order.
      */
      'langs' => [
         'ar'    => 'Arabic',
         'zh'    => 'Chinese Simplified',
         'zh-TW' => 'Chinese Traditional',
         'da'    => 'Danish',
         'de'    => 'German',
         'el'    => 'Greek',
         'en'    => 'English',
         'es'    => 'Spanish',
         'fr'    => 'French',
         'id'    => 'Indonesian',
         'it'    => 'Italian',
         'ja'    => 'Japanese',
         'nl'    => 'Dutch',
         'pt_BR' => 'Brazilian Portuguese',
         'ru'    => 'Russian',
         'sv'    => 'Swedish',
         'th'    => 'Thai',
      ],
   ],
];
