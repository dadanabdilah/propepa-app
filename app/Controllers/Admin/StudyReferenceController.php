<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;

use App\Models\StudyReferenceModel;
use App\Models\CategoryReferenceModel;

class StudyReferenceController extends ResourceController
{
    // protected $modelName = 'App\Models\StudyReferenceModel';

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'studyReferences' => StudyReferenceModel::with('CategoryReference')->get()
        ];

        return view('admin/study-references/index', $data);
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
            'categoryReferences' => CategoryReferenceModel::latest()->get()
        ];

        return view('admin/study-references/new', $data);
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
            'url_video' => 'required',
            'description' => 'required',
            'category_reference_id' => 'required|integer'
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $result = StudyReferenceModel::create($this->request->getPost());

        if ($result) {
            session()->setFlashdata('message', 'Tambah Data Referensi Belajar Berhasil');
        } else {
            session()->setFlashdata('error', 'Tambah Data Referensi Belajar Tidak Berhasil');
        }

        return redirect()->to('admin/study-references');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'categoryReferences' => CategoryReferenceModel::latest()->get(),
            'studyReference' => StudyReferenceModel::find($id)
        ];

        return view('admin/study-references/edit', $data);
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
            'url_video' => 'required',
            'description' => 'required',
            'category_reference_id' => 'required|integer'
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $studyReference = StudyReferenceModel::find($id);

        $result = $studyReference->update($this->request->getPost());

        if ($result) {
            session()->setFlashdata('message', 'Edit Data Referensi Belajar Berhasil');
        } else {
            session()->setFlashdata('error', 'Edit Data Referensi Belajar Tidak Berhasil');
        }

        return redirect()->to('admin/study-references');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $studyReference = StudyReferenceModel::find($id);

        $result = $studyReference->delete();

        if ($result) {
            session()->setFlashdata('message', 'Hapus Data Referensi Belajar Berhasil');
        } else {
            session()->setFlashdata('error', 'Hapus Data Referensi Belajar Tidak Berhasil');
        }

        return redirect()->to('admin/study-references');
    }
}
