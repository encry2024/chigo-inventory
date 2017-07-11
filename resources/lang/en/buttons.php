<?php

return [

   /*
   |--------------------------------------------------------------------------
   | Buttons Language Lines
   |--------------------------------------------------------------------------
   |
   | The following language lines are used in buttons throughout the system.
   | Regardless where it is placed, a button can be listed here so it is easily
   | found in a intuitive way.
   |
   */

   'backend' => [
      'access' => [
         'users' => [
            'activate'           => 'Activate',
            'change_password'    => 'Change Password',
            'clear_session'      => 'Clear Session',
            'deactivate'         => 'Deactivate',
            'delete_permanently' => 'Delete Permanently',
            'login_as'           => 'Login As :user',
            'resend_email'       => 'Resend Confirmation E-mail',
            'restore_user'       => 'Restore User',
         ],
      ],

      'inventory' => [
         'items' => [
            'aircons' => [
               'delete_permanently' => 'Delete Permanently',
               'restore_aircon'     => 'Restore Aircon',
               'activate'           => 'Activate'
            ]
         ],

         'customers' => [
            'delete_permanently' => 'Delete Permanently',
            'restore_customer'   => 'Restore Customer',
            'activate'           => 'Activate'
         ],

         'technicians' => [
            'delete_permanently' => 'Delete Permanently',
            'restore_customer'   => 'Restore Technician',
            'activate'           => 'Activate'
         ]
      ],

      'workflows' => [
         'sales' => [
            'delete_permanently' => 'Delete Permanently',
            'restore_sale'       => 'Restore Sale Workflow',
            'activate'           => 'Activate'
         ],

         'technicals' => [
            'delete_permanently'             => 'Delete Permanently',
            'restore_technical'              => 'Restore Technical Workflow',
            'activate'                       => 'Activate',
            'get_technician_schedule'      => 'Get Technician Schedules'
         ]
      ]
   ],

   'emails' => [
      'auth' => [
         'confirm_account' => 'Confirm Account',
         'reset_password'  => 'Reset Password',
      ],
   ],

   'general' => [
      'cancel' => 'Cancel',
      'continue' => 'Continue',

      'crud' => [
         'create' => 'Create',
         'delete' => 'Delete',
         'edit'   => 'Edit',
         'update' => 'Update',
         'view'   => 'View',
      ],

      'save' => 'Save',
      'view' => 'View',
   ],
];
