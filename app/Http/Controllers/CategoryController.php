<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function index(): View
    {
        return view('category.index')->with([
            'categories' => Category::all(),
        ]);
    }

    public function create(): View
    {
        return view('category.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return Redirect::route('category.index')->with('success', 'Category created successfully!');
    }

    public function show($id): View
    {
        return view('category.edit')->with([
            'category' => Category::find($id),
        ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required'
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        return Redirect::route('category.index')->with('success', 'Category updated successfully!');
    }


    public function destroy($id): RedirectResponse
    {
        $category = Category::find($id);
        $category->delete();

        return Redirect::route('category.index')->with('success', 'Category deleted successfully!');
    }
}
