<?php

return [

   /*
   |--------------------------------------------------------------------------
   | Exception Language Lines
   |--------------------------------------------------------------------------
   |
   | The following language lines are used in Exceptions thrown throughout the system.
   | Regardless where it is placed, a button can be listed here so it is easily
   | found in a intuitive way.
   |
   */

   'backend' => [
      'access' => [
         'roles' => [
            'already_exists'    => 'That role already exists. Please choose a different name.',
            'cant_delete_admin' => 'You can not delete the Administrator role.',
            'create_error'      => 'There was a problem creating this role. Please try again.',
            'delete_error'      => 'There was a problem deleting this role. Please try again.',
            'has_users'         => 'You can not delete a role with associated users.',
            'needs_permission'  => 'You must select at least one permission for this role.',
            'not_found'         => 'That role does not exist.',
            'update_error'      => 'There was a problem updating this role. Please try again.',
         ],

         'users' => [
            'cant_deactivate_self'  => 'You can not do that to yourself.',
            'cant_delete_admin'  => 'You can not delete the super administrator.',
            'cant_delete_self'      => 'You can not delete yourself.',
            'cant_delete_own_session' => 'You can not delete your own session.',
            'cant_restore'          => 'This user is not deleted so it can not be restored.',
            'create_error'          => 'There was a problem creating this user. Please try again.',
            'delete_error'          => 'There was a problem deleting this user. Please try again.',
            'delete_first'          => 'This user must be deleted first before it can be destroyed permanently.',
            'email_error'           => 'That email address belongs to a different user.',
            'mark_error'            => 'There was a problem updating this user. Please try again.',
            'not_found'             => 'That user does not exist.',
            'restore_error'         => 'There was a problem restoring this user. Please try again.',
            'role_needed_create'    => 'You must choose at lease one role.',
            'role_needed'           => 'You must choose at least one role.',
            'session_wrong_driver'  => 'Your session driver must be set to database to use this feature.',
            'update_error'          => 'There was a problem updating this user. Please try again.',
            'update_password_error' => 'There was a problem changing this users password. Please try again.',
         ],
      ],

      'inventory' => [
         'items' => [
            'aircons' => [
               'create_error'          => 'There was a problem creating this aircon. Please try again.',
               'delete_error'          => 'There was a problem deleting this aircon. Please try again.',
               'cant_restore'          => 'This aircon is not deleted so it can not be restored.',
               'restore_error'         => 'There was a problem restoring this aircon. Please try again.',
               'delete_first'          => 'This aircon must be deleted first before it can be destroyed permanently.',
               'update_error'          => 'There was a problem updating this user. Please try again.',
               'upload_error'          => 'There was a problem uploading this excel file. Please try again or contact the developers'
            ]
         ],

         'customers' => [
            'create_error'          => 'There was a problem creating this customer. Please try again.',
            'delete_error'          => 'There was a problem deleting this customer. Please try again.',
            'cant_restore'          => 'This customer is not deleted so it can not be restored.',
            'restore_error'         => 'There was a problem restoring this customer. Please try again.',
            'delete_first'          => 'This customer must be deleted first before it can be destroyed permanently.'
         ],

         'technicians' => [
            'create_error'          => 'There was a problem creating this technician. Please try again.',
            'delete_error'          => 'There was a problem deleting this technician. Please try again.',
            'cant_restore'          => 'This technician is not deleted so it can not be restored.',
            'restore_error'         => 'There was a problem restoring this technician. Please try again.',
            'delete_first'          => 'This technician must be deleted first before it can be destroyed permanently.'
         ],

         'referrals' => [
            'create_error'          => 'There was a problem creating this agent referral. Please try again.',
            'delete_error'          => 'There was a problem deleting this agent referral. Please try again.',
            'cant_restore'          => 'This agent referral is not deleted so it can not be restored.',
            'restore_error'         => 'There was a problem restoring this agent referral. Please try again.',
            'delete_first'          => 'This agent referral must be deleted first before it can be destroyed permanently.'
         ]
      ],

      'workflows' => [
         'sales' => [
            'create_error'          => 'There was a problem creating this sale. Please try again.',
            'delete_error'          => 'There was a problem deleting this sale. Please try again.',
            'cant_restore'          => 'This sale is not deleted so it can not be restored.',
            'restore_error'         => 'There was a problem restoring this sale. Please try again.',
            'delete_first'          => 'This sale must be deleted first before it can be destroyed permanently.'
         ],

         'technicals' => [
            'create_error'          => 'There was a problem creating this technical. Please try again.',
            'delete_error'          => 'There was a problem deleting this technical. Please try again.',
            'cant_restore'          => 'This technical is not deleted so it can not be restored.',
            'restore_error'         => 'There was a problem restoring this technical. Please try again.',
            'delete_first'          => 'This technical must be deleted first before it can be destroyed permanently.'
         ]
      ]
   ],

   'frontend' => [
      'auth' => [
         'confirmation' => [
            'already_confirmed' => 'Your account is already confirmed.',
            'confirm'           => 'Confirm your account!',
            'created_confirm'   => 'Your account was successfully created. We have sent you an e-mail to confirm your account.',
            'mismatch'          => 'Your confirmation code does not match.',
            'not_found'         => 'That confirmation code does not exist.',
            'resend'            => 'Your account is not confirmed. Please click the confirmation link in your e-mail, or <a href="'.route('frontend.auth.account.confirm.resend', ':user_id').'">click here</a> to resend the confirmation e-mail.',
            'success'           => 'Your account has been successfully confirmed!',
            'resent'            => 'A new confirmation e-mail has been sent to the address on file.',
         ],

         'deactivated' => 'Your account has been deactivated.',
         'email_taken' => 'That e-mail address is already taken.',

         'password' => [
            'change_mismatch' => 'That is not your old password.',
            'reset_problem' => 'There was a problem resetting your password. Please resend the password reset email.',
         ],

         'registration_disabled' => 'Registration is currently closed.',
      ],
   ],
];
