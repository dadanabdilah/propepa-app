<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;

use App\Models\CategoryModuleModel;

class CategoryModuleController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'categoryModules' => CategoryModuleModel::all()
        ];

        return view('admin/category-modules/index', $data);
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
        return view('admin/category-modules/new');
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

                $file->move('../public/assets/images/category-modules', $newName);

                $result = CategoryModuleModel::create([
                    'name' => $this->request->getPost('name'),
                    'photo' => $newName
                ]);

                if ($result) {
                    session()->setFlashdata('message', 'Tambah Data Kategori Modul Berhasil');
                } else {
                    session()->setFlashdata('error', 'Tambah Data Kategori Modul Tidak Berhasil');
                }
            } else {
                session()->setFlashdata('error', 'Tambah Data Kategori Modul Tidak Berhasil');
            }
        }

        return redirect()->to('admin/category-modules');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'categoryModule' => CategoryModuleModel::find($id)
        ];

        return view('admin/category-modules/edit', $data);
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

        $categoryModule = CategoryModuleModel::find($id);

        if ($file = $this->request->getFile('photo')) {
            if ($file->isValid() && !$file->hasMoved()) {
                unlink('assets/images/category-modules/' . $categoryModule->photo);

                $newName = $file->getRandomName();

                $file->move('../public/assets/images/category-modules', $newName);

                $result = $categoryModule->update([
                    'name' => $this->request->getPost('name'),
                    'photo' => $newName
                ]);
            } else {
                $result = $categoryModule->update([
                    'name' => $this->request->getPost('name'),
                ]);
            }
        }

        if ($result) {
            session()->setFlashdata('message', 'Edit Data Kategori Modul Berhasil');
        } else {
            session()->setFlashdata('error', 'Edit Data Kategori Modul Tidak Berhasil');
        }

        return redirect()->to('admin/category-modules');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $categoryModule = CategoryModuleModel::find($id);

        unlink('assets/images/category-modules/' . $categoryModule->photo);

        $result = $categoryModule->delete();

        if ($result) {
            session()->setFlashdata('message', 'Hapus Data Kategori Modul Berhasil');
        } else {
            session()->setFlashdata('error', 'Hapus Data Kategori Modul Tidak Berhasil');
        }

        return redirect()->to('admin/category-modules');
    }
}
