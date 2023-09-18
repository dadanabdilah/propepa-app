<?php

namespace App\Controllers\Teacher;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('teachers/dashboard/index');
    }
}
