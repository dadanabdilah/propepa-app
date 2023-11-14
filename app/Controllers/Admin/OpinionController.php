<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\I18n\Time;

use App\Models\OpinionModel;

use Pusher\Pusher;
use Kreait\Firebase\Factory;

class OpinionController extends ResourceController
{
    private $database;

    public function __construct()
    {
        $firebase = (new Factory)
            ->withServiceAccount('credential_firebase.json')
            ->withDatabaseUri('https://propepa-cf3d3-default-rtdb.asia-southeast1.firebasedatabase.app');

        $this->database = $firebase->createDatabase();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'opinions' => $this->database->getReference('opinions')->getValue(),
            'PUSHER_APP_KEY' => env('PUSHER_APP_KEY')
        ];

        return view('admin/opinions/index', $data);
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
         // Firebase
        $request = [
            'message' => $this->request->getPost('message'),
            'user_id' => auth()->id(),
            'user_name' => auth()->user()->name,
            'created_at' =>  Time::now('Asia/Jakarta', 'id_ID')
        ];

        $message = $this->database->getReference('opinions')->push($request);

        /*
        MySQL
        
        OpinionModel::create([
            'opinion' => $this->request->getPost('opinion'),
            'user_id' => auth()->id()
        ]);

        $data = [
            'opinions' => OpinionModel::with('User')->latest()->first()
        ];
        */

        $data = [
            'opinions' => $this->database->getReference('opinions/'.$message->getKey())->getValue(),
            'key' => $message->getKey()
        ];

        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $pusher->trigger('my-channel', 'my-event', $data);
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
         // Firebase
         $result = $this->database->getReference('opinions/'.$id)->remove();

        /*
        MySQL
        
        $opinion = OpinionModel::find($id);

        $result = $opinion->delete();
        */

        if ($result) {
            session()->setFlashdata('message', 'Hapus Opini Berhasil');
        } else {
            session()->setFlashdata('error', 'Hapus Opini Tidak Berhasil');
        }

        return redirect()->to('admin/opinions');
    }
}
