<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;

use Exception;

class StudyCommunityController extends ResourceController
{
    public function __construct()
    {
        helper('setting');
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        try {
            $data = [
                'whatsapp' => setting()->get('App.siteWhatsappGroupURL'),
                'telegram' => setting()->get('App.siteTelegramGroupURL')
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
    public function new()
    {
        //
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
