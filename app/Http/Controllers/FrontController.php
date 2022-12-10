<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    public function home()
    {
        $projects = Project::has('images')->with(['technologies', 'images', 'categories'])->orderBy('featured', 'desc')->get();
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

    public function sendMessage(Request $request)
    {
        $validator = Validator::make($request->all(), Contact::$rules);

        if ($validator->fails()) {
            return redirect(route('home') . '/#contact');
        }

        Contact::create($validator->validated());
        return redirect(route('home') . '/#contact')->with('success_message', 'Thank you!');
    }
}
