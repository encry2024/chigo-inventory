<?php

return [

   /*
   |--------------------------------------------------------------------------
   | Labels Language Lines
   |--------------------------------------------------------------------------
   |
   | The following language lines are used in labels throughout the system.
   | Regardless where it is placed, a label can be listed here so it is easily
   | found in a intuitive way.
   |
   */

   'general' => [
      'all'     => 'All',
      'yes'     => 'Yes',
      'no'      => 'No',
      'custom'  => 'Custom',
      'actions' => 'Actions',
      'active'  => 'Active',
      'buttons' => [
         'save'   => 'Save',
         'update' => 'Update',
      ],
      'hide'              => 'Hide',
      'inactive'          => 'Inactive',
      'none'              => 'None',
      'show'              => 'Show',
      'toggle_navigation' => 'Toggle Navigation',
      'deployable'        => 'Deployable'
   ],

   'backend' => [
      'inventory' => [
         'aircon' => [
            'management'   => 'Aircon Management',
            'availables'   => 'Available Aircons',

            'create'       => 'Create Aircon',
            'edit'         => 'Edit Aircon',
            'delete'       => 'Delete Aircon',

            'deleted'      => 'Deleted Aircons',
            'view'         => 'View :aircon',

            'table' => [
               'id'                 => 'ID',
               'name'               => 'Name',
               'serial_number'      => 'Serial Number',
               'status'             => 'Deployment Status',
               'date_created'       => 'Date Created',
               'last_updated'       => 'Last Updated',
               'no_deleted_aircon'  => 'aircon total|aircons total',
            ],

            'tabs' => [
               'titles' => [
                  'overview' => 'Overview',
                  'history'  => 'History',
               ],

               'content' => [
                  'overview' => [
                     'created_at'   => 'Created At',
                     'deleted_at'   => 'Deleted At',
                     'category'     => 'Category',
                     'last_updated' => 'Last Updated',
                     'name'         => 'Name',
                     'status'       => 'Status',
                  ],
               ],
            ],
         ],

         'customer' => [
            'management'   => 'Customer Management',
            'availables'   => 'Available Customer',

            'create'       => 'Create Customer',
            'edit'         => 'Edit Customer',
            'delete'       => 'Delete Customer',

            'table' => [
               'id'                 => 'ID',
               'company_name'       => 'Company Name',
               'contact_number'     => 'Contact Number',
               'email'              => 'Company E-mail',
               'note'               => 'Note',
               'other_category'     => 'Other Category',
               'address'            => 'address',
               'date_created'       => 'Date Created',
               'last_updated'       => 'Last Updated',
            ]
         ]
      ],

      'access' => [
         'roles' => [
            'create'     => 'Create Role',
            'edit'       => 'Edit Role',
            'management' => 'Role Management',

            'table' => [
               'number_of_users' => 'Number of Users',
               'permissions'     => 'Permissions',
               'role'            => 'Role',
               'sort'            => 'Sort',
               'total'           => 'role total|roles total',
            ],
         ],

         'users' => [
            'active'              => 'Active Users',
            'all_permissions'     => 'All Permissions',
            'change_password'     => 'Change Password',
            'change_password_for' => 'Change Password for :user',
            'create'              => 'Create User',
            'deactivated'         => 'Deactivated Users',
            'deleted'             => 'Deleted Users',
            'edit'                => 'Edit User',
            'management'          => 'User Management',
            'no_permissions'      => 'No Permissions',
            'no_roles'            => 'No Roles to set.',
            'permissions'         => 'Permissions',

            'table' => [
               'confirmed'      => 'Confirmed',
               'created'        => 'Created',
               'email'          => 'E-mail',
               'id'             => 'ID',
               'last_updated'   => 'Last Updated',
               'name'           => 'Name',
               'first_name'     => 'First Name',
               'last_name'      => 'Last Name',
               'no_deactivated' => 'No Deactivated Users',
               'no_deleted'     => 'No Deleted Users',
               'roles'          => 'Roles',
               'total'          => 'user total|users total',
            ],

            'tabs' => [
               'titles' => [
                  'overview' => 'Overview',
                  'history'  => 'History',
               ],

               'content' => [
                  'overview' => [
                     'avatar'       => 'Avatar',
                     'confirmed'    => 'Confirmed',
                     'created_at'   => 'Created At',
                     'deleted_at'   => 'Deleted At',
                     'email'        => 'E-mail',
                     'last_updated' => 'Last Updated',
                     'name'         => 'Name',
                     'first_name'   => 'First Name',
                     'last_name'    => 'Last Name',
                     'status'       => 'Status',
                  ],
               ],
            ],

            'view' => 'View User',
         ],
      ],
   ],

   'frontend' => [

      'auth' => [
         'login_box_title'    => 'Login',
         'login_button'       => 'Login',
         'login_with'         => 'Login with :social_media',
         'register_box_title' => 'Register',
         'register_button'    => 'Register',
         'remember_me'        => 'Remember Me',
      ],

      'passwords' => [
         'forgot_password'                 => 'Forgot Your Password?',
         'reset_password_box_title'        => 'Reset Password',
         'reset_password_button'           => 'Reset Password',
         'send_password_reset_link_button' => 'Send Password Reset Link',
      ],

      'macros' => [
         'country' => [
            'alpha'   => 'Country Alpha Codes',
            'alpha2'  => 'Country Alpha 2 Codes',
            'alpha3'  => 'Country Alpha 3 Codes',
            'numeric' => 'Country Numeric Codes',
         ],

         'macro_examples' => 'Macro Examples',

         'state' => [
            'mexico' => 'Mexico State List',
            'us'     => [
               'us'       => 'US States',
               'outlying' => 'US Outlying Territories',
               'armed'    => 'US Armed Forces',
            ],
         ],

         'territories' => [
            'canada' => 'Canada Province & Territories List',
         ],

         'timezone' => 'Timezone',
      ],

      'user' => [
         'passwords' => [
            'change' => 'Change Password',
         ],

         'profile' => [
            'avatar'             => 'Avatar',
            'created_at'         => 'Created At',
            'edit_information'   => 'Edit Information',
            'email'              => 'E-mail',
            'last_updated'       => 'Last Updated',
            'name'               => 'Name',
            'first_name'         => 'First Name',
            'last_name'          => 'Last Name',
            'update_information' => 'Update Information',
         ],
      ],

   ],
];
