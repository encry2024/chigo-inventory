<?php

return [

   /*
   |--------------------------------------------------------------------------
   | Alert Language Lines
   |--------------------------------------------------------------------------
   |
   | The following language lines contain alert messages for various scenarios
   | during CRUD operations. You are free to modify these language lines
   | according to your application's requirements.
   |
   */

   'backend' => [
      'roles' => [
         'created' => 'The role was successfully created.',
         'deleted' => 'The role was successfully deleted.',
         'updated' => 'The role was successfully updated.',
      ],

      'users' => [
         'confirmation_email'  => 'A new confirmation e-mail has been sent to the address on file.',
         'created'             => 'The user was successfully created.',
         'deleted'             => 'The user was successfully deleted.',
         'deleted_permanently' => 'The user was deleted permanently.',
         'restored'            => 'The user was successfully restored.',
         'session_cleared'     => "The user's session was successfully cleared.",
         'updated'             => 'The user was successfully updated.',
         'updated_password'    => "The user's password was successfully updated.",
      ],

      'workflow' => [
         'sales' => [
            'created'             => 'The sale was successfully created.',
            'deleted'             => 'The sale was successfully deleted.',
            'restored'            => 'The sale was successfully restored.',
            'deleted_permanently' => 'The sale was deleted permanently.',
            'updated'             => 'The sale was successfully updated.'
         ],

         'technicals' => [
            'created'             => 'The technical was successfully created.',
            'deleted'             => 'The technical was successfully deleted.',
            'restored'            => 'The technical was successfully restored.',
            'deleted_permanently' => 'The technical was deleted permanently.',
            'updated'             => 'The technical was successfully updated.'
         ],
      ],

      'inventory' => [
         'items' => [
            'aircons' => [
               'created'             => 'The aircon was successfully created.',
               'deleted'             => 'The aircon was successfully deleted.',
               'restored'            => 'The aircon was successfully restored.',
               'deleted_permanently' => 'The aircon was deleted permanently.',
               'updated'             => 'The aircon was successfully updated.',
               'uploaded'            => 'The excel file for aircons was successfully uploaded.',
               'change_log'          => 'Aircon :aircon was :changed_log'
            ],

            'peripherals' => [
               'created'             => 'The peripheral was successfully created.',
               'deleted'             => 'The peripheral was successfully deleted.',
               'restored'            => 'The peripheral was successfully restored.',
               'deleted_permanently' => 'The peripheral was deleted permanently.',
               'updated'             => 'The peripheral was successfully updated.',
               'uploaded'            => 'The excel file for peripherals was successfully uploaded.',
               'change_log'          => 'Peripheral :peripheral was :changed_log'
            ]
         ],

         'customers' => [
            'created'             => 'The customer was successfully created.',
            'deleted'             => 'The customer was successfully deleted.',
            'restored'            => 'The customer was successfully restored.',
            'deleted_permanently' => 'The customer was deleted permanently.',
            'updated'             => 'The customer was successfully updated.'
         ],

         'technicians' => [
            'created'             => 'The technician was successfully created.',
            'deleted'             => 'The technician was successfully deleted.',
            'restored'            => 'The technician was successfully restored.',
            'deleted_permanently' => 'The technician was deleted permanently.',
            'updated'             => 'The technician was successfully updated.'
         ],

         'referral' => [
            'created'             => 'The agent referral was successfully created.',
            'deleted'             => 'The agent referral was successfully deleted.',
            'restored'            => 'The agent referral was successfully restored.',
            'deleted_permanently' => 'The agent referral was deleted permanently.',
            'updated'             => 'The agent referral was successfully updated.'
         ]
      ],
   ],
];
