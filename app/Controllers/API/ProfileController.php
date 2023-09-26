<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;

use App\Models\UserIdentityModel;

class ProfileController extends ResourceController
{
    private $UserIdentity;

    protected $modelName = 'App\Models\UserModel';

    public function __construct()
    {
        $this->UserIdentity = new UserIdentityModel;
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        return $this->response->setJSON(['code' => 200, 'user' => $this->model->getIdentityById(auth()->id())]);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
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
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if (!$this->validate([
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[auth_identities.secret,id,' . $id . ']',
            'password' => 'permit_empty|min_length[7]'
        ])) {
            return $this->response
                ->setJSON(['code' => 401, 'errors' => $this->validator->getErrors()])
                ->setStatusCode(401);
        }

        $identityId = $this->UserIdentity->select('id AS identity_id')->where('user_id', $id)->first()->identity_id;

        $requestIdentity = [
            'id' => $identityId,
            'user_id' => $id,
            'name' => $this->request->getPost('name'),
            'institution' => $this->request->getPost('institution'),
            'whatsapp_number' => $this->request->getPost('whatsapp_number'),
            'address' => $this->request->getPost('address'),
            'secret' => $this->request->getPost('email')
        ];

        if (!empty($this->request->getPost('password'))) {
            $requestIdentity += [
                'secret2' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT, $this->getHashOptions())
            ];
        }

        $result = $this->UserIdentity->save($requestIdentity);

        return $this->response
            ->setJSON(['code' => 200, 'messages' => "Berhasil menambahkan data"]);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }

    private function getHashOptions(): array
    {
        return [
            'cost' => 10,
        ];
    }
}
