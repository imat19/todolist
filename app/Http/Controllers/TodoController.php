<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index(){
        return view('index')->with('todos', Todo::latest()->get());
    }

    public function create(Request $request){
        $todo = new Todo;
        $todo->description = $request->description;
        $todo->save();

        return redirect()->route('index')->with('success', $request->description . " ".'Added');
    }

    public function update($id){
        $todo = Todo::find($id);
        $todo->status = 'completed';
        $todo->save();
        
        return redirect()->route('index')->with('sucess', 'Todo updated');
    }

    public function delete($id) {
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('index')->with('sucess', 'Todo deleted');
    }
}
