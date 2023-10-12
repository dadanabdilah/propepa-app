<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;

use App\Models\StudyReferenceModel;
use App\Models\CategoryReferenceModel;

use Exception;

class StudyReferenceController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        try {
            return $this->response->setJSON(['code' => 200, 'studyReferences' => StudyReferenceModel::with('CategoryReference')->latest()->get()]);
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
        try {
            $data = [
                'categoryReference' => CategoryReferenceModel::find($id),
                'studyReferences' => StudyReferenceModel::where('category_reference_id', $id)->get()
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
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
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
