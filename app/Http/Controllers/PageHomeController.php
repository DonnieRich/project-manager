<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class PageHomeController extends Controller
{
    public function index()
    {
        // $projects = Project::all()->where('public', true);
        $projects = Project::query()
            ->where('public', true)
            ->get();
        return view('home', compact('projects'));
    }
}
