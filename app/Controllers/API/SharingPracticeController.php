<?php

namespace App\Controllers\API;

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

        return $this->response->setJSON($data);
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
        return $this->response->setJSON(['code' => 200, 'categoryModules' => CategoryModuleModel::latest()->get()]);
    }

    public function newVideo()
    {
        return $this->response->setJSON(['code' => 200, 'categoryReferences' => CategoryReferenceModel::latest()->get()]);
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
            return $this->response
                ->setJSON(['code' => 401, 'errors' => $this->validator->getErrors()])
                ->setStatusCode(401);
        }

        SharingPracticeModel::create($this->request->getPost());

        return $this->response
            ->setJSON(['code' => 200, 'messages' => "Berhasil menambahkan data"]);
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
            return $this->response
                ->setJSON(['code' => 401, 'errors' => $this->validator->getErrors()])
                ->setStatusCode(401);
        }

        SharingPracticeModel::create($this->request->getPost());

        return $this->response
            ->setJSON(['code' => 200, 'messages' => "Berhasil menambahkan data"]);
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
