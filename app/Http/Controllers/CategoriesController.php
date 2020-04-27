<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function create()
    {
        return view('manage.categories.create');
    }

    public function index()
    {
        $categories = Category::all();
        return view('manage.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255'
        ]);

        $category = Category::create($validatedData);

        session()->flash('success', 'A new category has been created!');

        return redirect()->route('manage.categories.index');
    }

    public function update(Category $category, Request $request)
    {
        $category->update(request()->validate([
            'name' => 'required|max:255'
        ]));

        // session()->flash('success', 'The category has been updated!');
        // return redirect()->route('manage.categories.index');

        return 'The category has been updated!';
    }
}
