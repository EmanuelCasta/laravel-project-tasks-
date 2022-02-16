<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Todo;

class TodosController extends Controller
{
    /**
     * index para mostrar todos los elementos
     * store para guardar un todo
     * update para actualizar un todo
     * destroy para eliminar un todo
     * edit para mostrar el formulario 
     */

    public function store(Request $request){
        
        $request->validate([
            'title' => 'required|min:3',
        ]);

        $todo = new Todo();

        $todo->title = $request->title;

        $todo->save();

        return redirect()->route('todos')->with('success', 'Tarea creada');
    }

    public function index(){
        $todos = Todo::all();

        return view('todos.index',['todos' => $todos]);
    }

    public function show($id){
        $todos = Todo::find($id);


        return view('todos.show',['todo' => $todos]);
    }

    public function update(Request $request, $id){

        $todos = Todo::find($id);
        $todos->title = $request->title;
        $todos->save();
        
        return redirect()->route('todos')->with('success', 'Tarea Actualizada');

    }
    public function destroy($id){
        $todos = Todo::find($id); 
        $todos->delete();

        return redirect()->route('todos')->with('success', 'Tarea eliminada');
    }
}
