<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    public function home()
    {
        $projects = Project::with(['technologies', 'images', 'categories'])->get();
        $categories = Category::pluck('title')
            ->mapWithKeys(fn ($category) => [Str::slug($category) => $category]);

        return view('home', compact('projects', 'categories'));
    }

    public function project(Project $project)
    {
        return view('project', compact('project'));
    }
}
