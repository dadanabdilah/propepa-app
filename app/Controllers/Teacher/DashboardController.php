<?php

namespace App\Controllers\Teacher;

use App\Controllers\BaseController;

use App\Models\CategoryReferenceModel;
use App\Models\CategoryModuleModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $data = [
            'categoryModules' => CategoryModuleModel::latest()->limit(3)->get(),
            'categoryReferences' => CategoryReferenceModel::latest()->limit(3)->get(),
        ];

        return view('teachers/dashboard/index', $data);
    }
}
