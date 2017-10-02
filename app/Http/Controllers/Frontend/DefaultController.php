<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;

class DefaultController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        
        return view('default.index', [
            'projectlist' => $projects
        ]);
    }
}
