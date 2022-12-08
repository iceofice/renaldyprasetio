<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    public function home()
    {
        $projects = Project::has('images')->with(['technologies', 'images', 'categories'])->get();
        $categories = Category::pluck('title')
            ->mapWithKeys(fn ($category) => [$category => Str::slug($category)]);

        return view('home', compact('projects', 'categories'));
    }

    public function project(Project $project)
    {
        if ($project->images->isEmpty()) {
            abort(404);
        }
        if ($project->has('images'))
            return view('project', compact('project'));
    }
}
