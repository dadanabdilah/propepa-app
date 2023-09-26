<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;

use App\Models\UserModel;
use App\Models\UserIdentityModel;
use CodeIgniter\Shield\Models\GroupModel;

class RegisterController extends BaseController
{
    private $UserIdentity, $GroupModel, $UserModel;

    public function __construct()
    {
        $this->UserModel = new UserModel;
        $this->UserIdentity = new UserIdentityModel;
        $this->GroupModel = new GroupModel;
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if (!$this->validate([
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[auth_identities.secret]',
            'password' => 'required|min_length[7]',
            'password_confirm' => 'required|matches[password]'
        ])) {
            return $this->response
                ->setJSON(['code' => 401, 'errors' => $this->validator->getErrors()])
                ->setStatusCode(401);
        }

        $request = [
            'username' => time(),
            'active' => 1
        ];

        $this->UserModel->save($request);

        $userId = $this->UserModel->getInsertID();

        $requestIdentity = [
            'user_id' => $userId,
            'type' => 'email_password',
            'name' => $this->request->getPost('name'),
            'institution' => $this->request->getPost('institution'),
            'whatsapp_number' => $this->request->getPost('whatsapp_number'),
            'address' => $this->request->getPost('address'),
            'secret' => $this->request->getPost('email'),
            'secret2' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT, $this->getHashOptions())
        ];

        $this->UserIdentity->save($requestIdentity);

        $requestGroup = [
            'user_id' => $userId,
            'group' => 'teacher'
        ];

        $this->GroupModel->save($requestGroup);

        return $this->response
            ->setJSON(['code' => 200, 'messages' => "Berhasil menambahkan data"]);
    }

    private function getHashOptions(): array
    {
        return [
            'cost' => 10,
        ];
    }
}
