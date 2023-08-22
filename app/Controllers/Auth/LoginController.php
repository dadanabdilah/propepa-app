<?php

namespace App\Controllers\Auth;

use CodeIgniter\Shield\Controllers\LoginController as LoginCon;
use CodeIgniter\Shield\Authentication\Passwords;

class LoginController extends LoginCon
{
    protected function getValidationRules(): array
    {
        return setting('Validation.login') ?? [
            'username' => [
                'label' => 'Auth.username',
                'rules' => config('AuthSession')->usernameValidationRules,
            ],
            // 'email' => [
            //     'label' => 'Auth.email',
            //     'rules' => config('AuthSession')->emailValidationRules,
            // ],
            'password' => [
                'label'  => 'Auth.password',
                'rules'  => 'required|' . Passwords::getMaxLenghtRule(),
                'errors' => [
                    'max_byte' => 'Auth.errorPasswordTooLongBytes',
                ],
            ],
        ];
    }
}
