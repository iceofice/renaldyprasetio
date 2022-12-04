<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProjectController extends Controller
{
    public function __construct()
    {
        View::share('modelName', 'Project');
        View::share('routeName', 'projects');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $columns = [
            [
                'title' => 'ID',
                'data'  => 'id'
            ],
            [
                'title' => 'Title',
                'data'  => 'title'
            ],
        ];
        return view('admin.projects.index', compact('projects', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get(['id', 'title']);
        $technologies = Technology::get(['id', 'name']);
        return view('admin.projects.create', compact('categories', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(Project::$rules, Project::$messages);
        $project = Project::create($validated);


        if (isset($validated['categories']))
            $project->categories()->attach($validated['categories']);

        if (isset($validated['technologies']))
            $project->technologies()->attach($validated['technologies']);

        return redirect()->route('admin.projects.index')
            ->with('success_message', 'Project added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success_message', 'Project deleted successfully');
    }
}
