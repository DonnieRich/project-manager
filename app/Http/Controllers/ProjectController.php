<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function store(Request $request)
    {
        $project_attributes = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        Project::create($project_attributes);

        return redirect('/projects');
    }
}
