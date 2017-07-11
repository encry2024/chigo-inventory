<?php

return [

   /*
   |--------------------------------------------------------------------------
   | History Language Lines
   |--------------------------------------------------------------------------
   |
   | The following language lines contain strings associated to the
   | system adding lines to the history table.
   |
   */

   'backend' => [
      'none'            => 'There is no recent history.',
      'none_for_type'   => 'There is no history for this type.',
      'none_for_entity' => 'There is no history for this :entity.',
      'recent_history'  => 'Recent History',

      'roles' => [
         'created' => 'created role',
         'deleted' => 'deleted role',
         'updated' => 'updated role',
      ],

      'users' => [
         'changed_password'    => 'changed password for user',
         'created'             => 'created user',
         'deactivated'         => 'deactivated user',
         'deleted'             => 'deleted user',
         'permanently_deleted' => 'permanently deleted user',
         'updated'             => 'updated user',
         'reactivated'         => 'reactivated user',
         'restored'            => 'restored user',
      ],

      'inventory' => [
         'items' => [
            'aircons' => [
               'created'             => 'created aircon',
               'deleted'             => 'deleted aircon',
               'restored'            => 'restored aircon',
               'permanently_deleted' => 'permanently deleted aircon',
               'updated'             => 'updated aircon',
            ],
         ],
      ],

      'customer' => [
         'created'             => 'created customer/client',
         'deleted'             => 'deleted customer/client',
         'restored'            => 'restored customer/client',
         'permanently_deleted' => 'permanently deleted customer/client',
         'updated'             => 'updated customer/client',
      ],

      'technician' => [
         'created'             => 'created technician',
         'deleted'             => 'deleted technician',
         'restored'            => 'restored technician',
         'permanently_deleted' => 'permanently deleted technician',
         'updated'             => 'updated technician',
      ],

      'workflows' => [
         'sales' => [
            'created'             => 'created sale workflow',
            'deleted'             => 'deleted sale workflow',
            'restored'            => 'restored sale workflow',
            'permanently_deleted' => 'permanently deleted sale workflow',
         ],

         'technicals' => [
            'created'             => 'created technical workflow',
            'deleted'             => 'deleted technical workflow',
            'restored'            => 'restored technical workflow',
            'permanently_deleted' => 'permanently deleted technical workflow',
         ]
      ],
   ],
];
