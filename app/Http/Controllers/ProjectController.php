<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Project;
use App\Models\Technology;
use Carbon\Carbon;
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
            [
                'title' => 'Featured',
                'data'  => 'featured',
                'defaultContent' => '-'
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

        $validated['featured'] = isset($request['featured'])
            ? Carbon::now()
            : null;

        $project = Project::create($validated);

        if (isset($validated['image'])) {
            foreach ($validated['image'] as $image) {
                $imageTitle = $image->hashName();
                $image->move(public_path('uploaded'), $imageTitle);

                $images[] = Image::create([
                    'url' => 'uploaded/' . $imageTitle,
                    'project_id' => $project->id
                ]);
            }
            $project->images()->saveMany($images);
        }

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
        $categories = Category::get(['id', 'title']);
        $technologies = Technology::get(['id', 'name']);

        return view('admin.projects.edit', compact('project', 'categories', 'technologies'));
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
        $validated = $request->validate(Project::$rules, Project::$messages);

        $validated['featured'] = isset($request['featured'])
            ? Carbon::now()
            : null;

        $project->update($validated);

        if (isset($validated['image'])) {
            $project->images()->delete();
            foreach ($validated['image'] as $image) {
                $imageTitle = $image->hashName();
                $image->move(public_path('uploaded'), $imageTitle);

                $images[] = Image::create([
                    'url' => 'uploaded/' . $imageTitle,
                    'project_id' => $project->id
                ]);
            }
            $project->images()->saveMany($images);
        }

        $project
            ->categories()
            ->sync(
                isset($validated['categories'])
                    ? $validated['categories']
                    : []
            );

        $project
            ->technologies()
            ->sync(
                isset($validated['technologies'])
                    ? $validated['technologies']
                    : []
            );

        return redirect()->route('admin.projects.index')
            ->with('success_message', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->categories()->detach();
        $project->technologies()->detach();
        $project->images()->delete();

        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success_message', 'Project deleted successfully');
    }
}
