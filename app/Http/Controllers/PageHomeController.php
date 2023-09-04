<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class PageHomeController extends Controller
{
    public function index()
    {
        // $projects = Project::all()->where('public', true)->orderBy('updated_at', 'desc');
        $projects = Project::query()
            ->public()
            ->orderByDesc('updated_at')
            ->get();

        return view('home', compact('projects'));
    }
}
