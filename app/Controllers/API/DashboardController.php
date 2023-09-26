<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;

use App\Models\CategoryModuleModel;
use App\Models\CategoryReferenceModel;

class DashboardController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'categoryModules' => CategoryModuleModel::latest()->limit(3)->get(),
            'categoryReferences' => CategoryReferenceModel::latest()->limit(3)->get(),
        ];

        return $this->response->setJSON(['code' => 200, 'datas' => $data]);
    }
}
