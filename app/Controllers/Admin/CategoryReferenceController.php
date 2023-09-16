<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;

use App\Models\CategoryReferenceModel;

class CategoryReferenceController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'categoryReferences' => CategoryReferenceModel::all()
        ];

        return view('admin/category-references/index', $data);
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
        return view('admin/category-references/new');
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
            'photo' => 'uploaded[photo]|is_image[photo]'
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        if ($file = $this->request->getFile('photo')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();

                $file->move('../public/assets/images/category-references', $newName);

                $result = CategoryReferenceModel::create([
                    'name' => $this->request->getPost('name'),
                    'photo' => $newName
                ]);

                if ($result) {
                    session()->setFlashdata('message', 'Tambah Data Kategori Referensi Berhasil');
                } else {
                    session()->setFlashdata('error', 'Tambah Data Kategori Referensi Tidak Berhasil');
                }
            } else {
                session()->setFlashdata('error', 'Tambah Data Kategori Referensi Tidak Berhasil');
            }
        }

        return redirect()->to('admin/category-references');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'categoryReference' => CategoryReferenceModel::find($id)
        ];

        return view('admin/category-references/edit', $data);
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
            'photo' => 'permit_empty|uploaded[photo]|is_image[photo]'
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $categoryReference = CategoryReferenceModel::find($id);

        if ($file = $this->request->getFile('photo')) {
            if ($file->isValid() && !$file->hasMoved()) {
                unlink('assets/images/category-references/' . $categoryReference->photo);

                $newName = $file->getRandomName();

                $file->move('../public/assets/images/category-references', $newName);

                $result = $categoryReference->update([
                    'name' => $this->request->getPost('name'),
                    'photo' => $newName
                ]);
            } else {
                $result = $categoryReference->update([
                    'name' => $this->request->getPost('name'),
                ]);
            }
        }

        if ($result) {
            session()->setFlashdata('message', 'Edit Data Kategori Referensi Berhasil');
        } else {
            session()->setFlashdata('error', 'Edit Data Kategori Referensi Tidak Berhasil');
        }

        return redirect()->to('admin/category-references');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $categoryReference = CategoryReferenceModel::find($id);

        unlink('assets/images/category-references/' . $categoryReference->photo);

        $result = $categoryReference->delete();

        if ($result) {
            session()->setFlashdata('message', 'Hapus Data Kategori Referensi Berhasil');
        } else {
            session()->setFlashdata('error', 'Hapus Data Kategori Referensi Tidak Berhasil');
        }

        return redirect()->to('admin/category-references');
    }
}
