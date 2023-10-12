<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;

use App\Models\SharingPracticeModel;
use App\Models\CategoryReferenceModel;
use App\Models\CategoryModuleModel;

use Exception;

class SharingPracticeController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        try {
            $data = [
                'sharingPractices' => SharingPracticeModel::where('user_id', auth()->id())->latest()->get(),
                'sharingPracticesModule' => SharingPracticeModel::where('user_id', auth()->id())->whereNotNull('category_module_id')->count(),
                'sharingPracticesVideo' => SharingPracticeModel::where('user_id', auth()->id())->whereNotNull('category_reference_id')->count(),
            ];

            return $this->response->setJSON(['code' => 200, 'datas' => $data]);
        } catch (Exception $error) {
            return $this->response
                ->setJSON([
                    'code' => 500,
                    'message' => 'Something went wrong',
                    'error' => $error,
                ]);
        }
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
        try {
            return $this->response->setJSON(['code' => 200, 'categoryModules' => CategoryModuleModel::latest()->get()]);
        } catch (Exception $error) {
            return $this->response
                ->setJSON([
                    'code' => 500,
                    'message' => 'Something went wrong',
                    'error' => $error,
                ]);
        }
    }

    public function newVideo()
    {
        try {
            return $this->response->setJSON(['code' => 200, 'categoryReferences' => CategoryReferenceModel::latest()->get()]);
        } catch (Exception $error) {
            return $this->response
                ->setJSON([
                    'code' => 500,
                    'message' => 'Something went wrong',
                    'error' => $error,
                ]);
        }
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function createModule()
    {
        try {
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
        } catch (Exception $error) {
            return $this->response
                ->setJSON([
                    'code' => 500,
                    'message' => 'Something went wrong',
                    'error' => $error,
                ]);
        }
    }

    public function createVideo()
    {
        try {
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
        } catch (Exception $error) {
            return $this->response
                ->setJSON([
                    'code' => 500,
                    'message' => 'Something went wrong',
                    'error' => $error,
                ]);
        }
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
