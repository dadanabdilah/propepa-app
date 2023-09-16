<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;

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
        return view('admin/study-communities/index');
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
        setting()->set('App.siteWhatsappGroupURL', $this->request->getPost('whatsapp_group_url'));
        setting()->set('App.siteTelegramGroupURL', $this->request->getPost('telegram_group_url'));

        session()->setFlashdata('message', 'Edit Data Komunitas Belajar Berhasil');

        return redirect()->to('admin/study-communities');
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
