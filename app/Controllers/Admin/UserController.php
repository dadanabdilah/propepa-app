<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;

use App\Models\UserIdentityModel;
use CodeIgniter\Shield\Models\GroupModel;

class UserController extends ResourceController
{
    private $UserIdentity, $GroupModel;

    protected $modelName = 'App\Models\UserModel';

    public function __construct()
    {
        helper(['position']);

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
        $data = [
            'users' => $this->model->getIdentity(),
            'identities' => $this->UserIdentity->findAll()
        ];

        return view('admin/users/index', $data);
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
        return view('admin/users/new');
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
            'group' => 'required|in_list[admin,teacher,student]',
            'password' => 'required|min_length[7]'
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
            'username' => time(),
            'active' => 0
        ];

        $result = $this->model->save($request);
        $userId = $this->model->getInsertID();

        $requestIdentity = [
            'user_id' => $userId,
            'type' => 'email_password',
            'name' => $this->request->getPost('name'),
            'institution' => $this->request->getPost('institution'),
            'whatsapp_number' => $this->request->getPost('whatsapp_number'),
            'address' => $this->request->getPost('address'),
            'secret' => $this->request->getPost('email'),
            'secret2' => password_hash(base64_encode(hash('sha384', $this->request->getPost('password'), true)), PASSWORD_DEFAULT)
        ];

        $this->UserIdentity->save($requestIdentity);

        $requestGroup = [
            'user_id' => $userId,
            'group' => $this->request->getPost('group')
        ];

        $this->GroupModel->save($requestGroup);

        if ($result) {
            session()->setFlashdata('message', 'Tambah Data Pengguna Berhasil');
        } else {
            session()->setFlashdata('error', 'Tambah Data Pengguna Tidak Berhasil');
        }

        return redirect()->to('admin/users');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'user' => $this->model->getIdentityById($id)
        ];

        return view('admin/users/edit', $data);
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
            'group' => 'required|in_list[admin,teacher,student]',
            'password' => 'permit_empty|min_length[7]'
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
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
                'secret2' => password_hash(base64_encode(hash('sha384', $this->request->getPost('password'), true)), PASSWORD_DEFAULT)
            ];
        }

        $result = $this->UserIdentity->save($requestIdentity);

        $user = $this->model->find($id);
        $user->syncGroups($this->request->getPost('group'));

        if ($result) {
            session()->setFlashdata('message', 'Update Data Pengguna Berhasil');
        } else {
            session()->setFlashdata('error', 'Update Data Pengguna Tidak Berhasil');
        }

        return redirect()->to('admin/users');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $result = $this->model->delete($id);

        if ($result) {
            session()->setFlashdata('message', 'Hapus Data Pengguna Berhasil');
        } else {
            session()->setFlashdata('error', 'Hapus Data Pengguna Tidak Berhasil');
        }

        return redirect()->to('admin/users');
    }
}
