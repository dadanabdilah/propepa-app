<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;

use App\Models\ArticleModel;

class ArticleController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'articles' => ArticleModel::all()
        ];

        return view('admin/articles/index', $data);
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
        return view('admin/articles/new');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if (!$this->validate([
            'title' => 'required|min_length[3]',
            'thumbnail' => 'uploaded[thumbnail]|is_image[thumbnail]',
            'content' => 'required|min_length[3]'
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        if ($file = $this->request->getFile('thumbnail')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();

                $file->move('../public/assets/images/articles', $newName);

                $result = ArticleModel::create([
                    'slug' => url_title($this->request->getPost('title'), '-', TRUE),
                    'title' => $this->request->getPost('title'),
                    'content' => $this->request->getPost('content'),
                    'thumbnail' => $newName
                ]);

                if ($result) {
                    session()->setFlashdata('message', 'Tambah Data Artikel Berhasil');
                } else {
                    session()->setFlashdata('error', 'Tambah Data Artikel Tidak Berhasil');
                }
            } else {
                session()->setFlashdata('error', 'Tambah Data Artikel Tidak Berhasil');
            }
        }

        return redirect()->to('admin/articles');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'article' => ArticleModel::find($id)
        ];

        return view('admin/articles/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if (!$this->validate([
            'title' => 'required|min_length[3]',
            'thumbnail' => 'permit_empty|uploaded[thumbnail]|is_image[thumbnail]',
            'content' => 'required|min_length[3]'
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $articleModel = ArticleModel::find($id);

        if ($file = $this->request->getFile('thumbnail')) {
            if ($file->isValid() && !$file->hasMoved()) {
                unlink('assets/images/articles/' . $articleModel->thumbnail);

                $newName = $file->getRandomName();

                $file->move('../public/assets/images/articles', $newName);

                $result = $articleModel->update([
                    'slug' => url_title($this->request->getPost('title'), '-', TRUE),
                    'title' => $this->request->getPost('title'),
                    'thumbnail' => $newName,
                    'content' => $this->request->getPost('content')
                ]);
            } else {
                $result = $articleModel->update([
                    'slug' => url_title($this->request->getPost('title'), '-', TRUE),
                    'title' => $this->request->getPost('title'),
                    'content' => $this->request->getPost('content')
                ]);
            }
        }

        if ($result) {
            session()->setFlashdata('message', 'Edit Data Artikel Berhasil');
        } else {
            session()->setFlashdata('error', 'Edit Data Artikel Tidak Berhasil');
        }

        return redirect()->to('admin/articles');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $articleModel = ArticleModel::find($id);

        unlink('assets/images/articles/' . $articleModel->thumbnail);

        $result = $articleModel->delete();

        if ($result) {
            session()->setFlashdata('message', 'Hapus Data Artikel Berhasil');
        } else {
            session()->setFlashdata('error', 'Hapus Data Artikel Tidak Berhasil');
        }

        return redirect()->to('admin/articles');
    }
}
