<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;

use App\Models\SharingPracticeModel;

class SharingPracticeController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'sharingPractices' => SharingPracticeModel::latest()->get()
        ];

        return view('admin/sharing-practices/index', $data);
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
        $data = [
            'sharingPractice' => SharingPracticeModel::find($id),
        ];

        return view('admin/sharing-practices/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if (!$this->validate([
            'status' => 'required'
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $sharingPractice = SharingPracticeModel::find($id);

        $result = $sharingPractice->update([
            'status' => $this->request->getPost('status'),
        ]);

        if ($result) {
            session()->setFlashdata('message', 'Edit Data Praktik Berbagi Berhasil');
        } else {
            session()->setFlashdata('error', 'Edit Data Praktik Berbagi Tidak Berhasil');
        }

        return redirect()->to('admin/sharing-practices');
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
}
