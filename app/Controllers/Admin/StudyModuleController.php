<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;

use App\Models\StudyModuleModel;
use App\Models\CategoryModuleModel;

class StudyModuleController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'studyModules' => StudyModuleModel::with('CategoryModule')->get()
        ];

        return view('admin/study-modules/index', $data);
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
        $data = [
            'categoryModules' => CategoryModuleModel::latest()->get()
        ];

        return view('admin/study-modules/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if (!$this->validate([
            'title' => 'required',
            'url_module' => 'required',
            'description' => 'required',
            'category_module_id' => 'required|integer'
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $result = StudyModuleModel::create($this->request->getPost());

        if ($result) {
            session()->setFlashdata('message', 'Tambah Data Modul Belajar Berhasil');
        } else {
            session()->setFlashdata('error', 'Tambah Data Modul Belajar Tidak Berhasil');
        }

        return redirect()->to('admin/study-modules');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'categoryModules' => CategoryModuleModel::latest()->get(),
            'studyModule' => StudyModuleModel::find($id)
        ];

        return view('admin/study-modules/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if (!$this->validate([
            'title' => 'required',
            'url_module' => 'required',
            'description' => 'required',
            'category_module_id' => 'required|integer'
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $studyModule = StudyModuleModel::find($id);

        $result = $studyModule->update($this->request->getPost());

        if ($result) {
            session()->setFlashdata('message', 'Edit Data Modul Belajar Berhasil');
        } else {
            session()->setFlashdata('error', 'Edit Data Modul Belajar Tidak Berhasil');
        }

        return redirect()->to('admin/study-modules');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $studyModule = StudyModuleModel::find($id);

        $result = $studyModule->delete();

        if ($result) {
            session()->setFlashdata('message', 'Hapus Data Modul Belajar Berhasil');
        } else {
            session()->setFlashdata('error', 'Hapus Data Modul Belajar Tidak Berhasil');
        }

        return redirect()->to('admin/study-modules');
    }
}
