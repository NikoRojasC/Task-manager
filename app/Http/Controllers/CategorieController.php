<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Categorie;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $categories = Categorie::all();

        return view('categories.categories')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        // dd($request->name);

        $request->validate([
            'name' => 'required|unique:categories|min:4',
            'color' => 'required|max:7'
        ]);


        $categorie = new Categorie;
        $categorie->name = $request->name;
        $categorie->color = $request->color;
        $categorie->save();

        return redirect()->route('categories')->with('success', 'Categorie created successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $category = Categorie::find($id);

        return view('categories.edit')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $request->validate([
            'name' => 'required|unique:categories|min:4',
            'color' => 'required|max:7'
        ]);

        $category = Categorie::find($id);

        $category->name = $request->name;
        $category->color = $request->color;
        $category->save();

        return redirect()->route("categories")->with("success", 'category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = Categorie::find($id);
        $category->todos->each(function ($todo) {
            $todo->delete();
        });
        $category->delete();

        return redirect()->route("categories")->with("success", 'category deleted successfully');
    }
}
