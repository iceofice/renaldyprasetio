<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CategoryController extends Controller
{
    public function __construct()
    {
        View::share('modelName', 'Category');
        View::share('routeName', 'categories');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
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
        return view('admin.categories.index', compact('categories', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(Category::$rules);

        Category::create($validated);

        return redirect()->route('admin.categories.index')
            ->with('success_message', 'Category added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate(Category::$rules);

        $category->update($validated);

        return redirect()->route('admin.categories.index')
            ->with('success_message', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->projects->isNotEmpty()) {
            return redirect()->route('admin.categories.index')
                ->with('error_message', 'The category has one/more projects!');
        }
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success_message', 'Category deleted successfully');
    }
}
