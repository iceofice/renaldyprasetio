<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TechnologyController extends Controller
{
    public function __construct()
    {
        View::share('modelName', 'Technology');
        View::share('routeName', 'technologies');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::all();
        $columns = [
            [
                'title' => 'ID',
                'data'  => 'id'
            ],
            [
                'title' => 'Name',
                'data'  => 'name'
            ],
        ];
        return view('admin.technologies.index', compact('technologies', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(Technology::$rules);

        Technology::create($validated);

        return redirect()->route('admin.technologies.index')
            ->with('success_message', 'Technology added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technology $technology)
    {
        $validated = $request->validate(Technology::$rules);

        $technology->update($validated);

        return redirect()->route('admin.technologies.index')
            ->with('success_message', 'Technology updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        if ($technology->projects->isNotEmpty()) {
            return redirect()->route('admin.categories.index')
                ->with('error_message', 'The technology has one/more projects!');
        }

        $technology->delete();

        return redirect()->route('admin.technologies.index')
            ->with('success_message', 'Technology deleted successfully');
    }
}
