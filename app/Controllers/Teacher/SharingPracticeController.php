<?php

namespace App\Controllers\Teacher;

use CodeIgniter\RESTful\ResourceController;

use App\Models\SharingPracticeModel;
use App\Models\CategoryReferenceModel;
use App\Models\CategoryModuleModel;

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
            'sharingPractices' => SharingPracticeModel::where('user_id', auth()->id())->latest()->get(),
            'sharingPracticesModule' => SharingPracticeModel::where('user_id', auth()->id())->whereNotNull('category_module_id')->count(),
            'sharingPracticesVideo' => SharingPracticeModel::where('user_id', auth()->id())->whereNotNull('category_reference_id')->count(),
        ];

        return view('teachers/sharing-practices/index', $data);
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
    public function newModule()
    {
        $data = [
            'categoryModules' => CategoryModuleModel::latest()->get(),
        ];

        return view('teachers/sharing-practices/new-module', $data);
    }

    public function newVideo()
    {
        $data = [
            'categoryReferences' => CategoryReferenceModel::latest()->get(),
        ];

        return view('teachers/sharing-practices/new-video', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function createModule()
    {
        if (!$this->validate([
            'title' => 'required',
            'url' => 'required',
            'type' => 'required',
            'description' => 'required',
            'category_module_id' => 'required'
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $result = SharingPracticeModel::create($this->request->getPost());

        if ($result) {
            session()->setFlashdata('message', 'Tambah Data Modul Praktik Berbagi Berhasil');
        } else {
            session()->setFlashdata('error', 'Tambah Data Modul Praktik Berbagi Tidak Berhasil');
        }

        return redirect()->to('sharing-practices');
    }

    public function createVideo()
    {
        if (!$this->validate([
            'title' => 'required',
            'url' => 'required',
            'type' => 'required',
            'description' => 'required',
            'category_reference_id' => 'required'
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $result = SharingPracticeModel::create($this->request->getPost());

        if ($result) {
            session()->setFlashdata('message', 'Tambah Data Video Praktik Berbagi Berhasil');
        } else {
            session()->setFlashdata('error', 'Tambah Data Video Praktik Berbagi Tidak Berhasil');
        }

        return redirect()->to('sharing-practices');
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
        //
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
