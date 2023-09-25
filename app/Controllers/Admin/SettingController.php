<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;

class SettingController extends ResourceController
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
        return view('admin/settings/index');
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
        if ($file = $this->request->getFile('logo')) {
            if ($file->isValid() && !$file->hasMoved()) {
                unlink('assets/images/main/' . setting()->get('App.siteLogo'));

                $newName = $file->getRandomName();

                $file->move('../public/assets/images/main', $newName);

                setting()->set('App.siteLogo', $newName);
            }
        }

        setting()->set('App.siteName', $this->request->getPost('site_name'));
        setting()->set('App.siteIntroText', $this->request->getPost('intro_text'));
        setting()->set('App.siteAbout', $this->request->getPost('about_text'));
        setting()->set('App.siteVideoURL', $this->request->getPost('video_youtube'));
        setting()->set('App.siteAddress', $this->request->getPost('address'));
        setting()->set('App.siteMail', $this->request->getPost('email_address'));
        setting()->set('App.sitePhone', $this->request->getPost('phone_number'));
        setting()->set('App.siteURL', $this->request->getPost('site_url'));
        setting()->set('App.siteMaps', $this->request->getPost('site_maps'));

        session()->setFlashdata('message', 'Edit Pengaturan Berhasil');

        return redirect()->to('admin/settings');
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
