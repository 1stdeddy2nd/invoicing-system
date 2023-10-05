<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Fruit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class FruitController extends Controller
{
    public function index(): View
    {
        $fruits = Fruit::join('categories', 'fruits.category_id', '=', 'categories.id')
            ->select('fruits.*', 'categories.name as category_name')
            ->get();
        return view('fruit.index')->with([
            'fruits' => $fruits,
        ]);
    }

    public function create(): View
    {
        return view('fruit.create')->with([
            'category' => Category::all()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'unit' => 'required',
            'category_id' => 'required',
        ]);

        $fruit = new Fruit;
        $fruit->name = $request->name;
        $fruit->price = $request->price;
        $fruit->unit = $request->unit;
        $fruit->category_id = $request->category_id;
        $fruit->save();

        return Redirect::route('fruit.index')->with('success', 'Fruit created successfully!');
    }

    public function show($id): View
    {
        return view('fruit.edit')->with([
            'fruit' => Fruit::find($id),
            'category' => Category::all()
        ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'unit' => 'required',
            'category_id' => 'required',
        ]);

        $fruit = Fruit::find($id);
        $fruit->name = $request->name;
        $fruit->price = $request->price;
        $fruit->unit = $request->unit;
        $fruit->category_id = $request->category_id;
        $fruit->save();

        return Redirect::route('fruit.index')->with('success', 'Fruit updated successfully!');
    }


    public function destroy($id): RedirectResponse
    {
        $fruit = Fruit::find($id);
        $fruit->delete();

        return Redirect::route('fruit.index')->with('success', 'Fruit deleted successfully!');
    }
}
