<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;

use Exception;

class LoginController extends BaseController
{
    /**
     * Attempts to log the user in.
     */
    public function loginAction()
    {
        try {
            $rules = setting('Validation.login') ?? [
                'email' => [
                    'label' => 'Auth.email',
                    'rules' => config('AuthSession')->emailValidationRules,
                ],
                'password' => [
                    'label' => 'Auth.password',
                    'rules' => 'required',
                ]
            ];

            if (!$this->validateData($this->request->getPost(), $rules)) {
                return $this->response
                    ->setJSON(['code' => 401, 'errors' => $this->validator->getErrors()])
                    ->setStatusCode(401);
            }

            $credentials             = $this->request->getPost(setting('Auth.validFields'));
            $credentials             = array_filter($credentials);
            $credentials['password'] = $this->request->getPost('password');

            $result = auth()->attempt($credentials);
            if (!$result->isOK()) {
                return $this->response
                    ->setJSON(['code' => 401, 'error' => $result->reason()])
                    ->setStatusCode(401);
            }

            $token = auth()->user()->generateAccessToken('PROPEPA');

            return $this->response
                ->setJSON(['code' => 200, 'token' => $token->raw_token, 'user' => $result->extraInfo()]);
        } catch (Exception $error) {
            return $this->response
                ->setJSON([
                    'code' => 500,
                    'message' => 'Something went wrong',
                    'error' => $error,
                ]);
        }
    }

    public function logoutAction()
    {
        try {
            auth()->user()->revokeAllAccessTokens();
            auth()->logout();

            return $this->response
                ->setJSON(['code' => 200, 'message' => 'Successfully logged out']);
        } catch (Exception $error) {
            return $this->response
                ->setJSON([
                    'code' => 500,
                    'message' => 'Something went wrong',
                    'error' => $error,
                ]);
        }
    }
}
