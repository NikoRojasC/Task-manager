<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Todo;
use App\Models\Categorie;


class TodosController extends Controller
{
    //

    public function store(Request $request)
    {



        $request->validate([
            'task' => 'required|min:4'
        ]);

        $todo = new Todo();
        $todo->task = $request->task;
        $todo->categorie_id = $request->categorie_id;
        $todo->save();


        return redirect()->route('todos')->with('success', 'Task created ok');
    }


    public function index()
    {

        $todos = Todo::all();
        $categories = Categorie::all();

        return view('todos.todos', ['todos' => $todos, 'categories' => $categories]);
    }

    public function show($id)
    {
        $todo = Todo::find($id);



        return view('todos.show', ['todo' => $todo]);
    }


    public function edit(Request $request, $id)
    {
        $request->validate([
            'task' => 'required|min:4'
        ]);
        $todo = Todo::find($id);

        $todo->task = $request->task;
        $todo->save();

        return redirect()->route('todos')->with('success', 'Task updated');
    }

    public function delete($id)
    {
        $todo = Todo::find($id);
        $todo->delete();


        return redirect()->route('todos')->with('success', 'Task deleted');
    }
}
