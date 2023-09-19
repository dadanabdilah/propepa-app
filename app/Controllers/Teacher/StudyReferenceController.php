<?php

namespace App\Controllers\Teacher;

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
            'categoryReferences' => CategoryReferenceModel::latest()->get(),
        ];

        return view('teachers/study-references/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = [
            'categoryReference' => CategoryReferenceModel::find($id),
            'studyReferences' => StudyReferenceModel::where('category_reference_id', $id)->get()
        ];

        return view('teachers/study-references/show', $data);
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

        return view('teachers/study-references/new', $data);
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
