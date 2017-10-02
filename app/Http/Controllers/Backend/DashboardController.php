<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
}
