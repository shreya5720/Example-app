<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\students;
class StudentController extends Controller
{
    public function store(Request $request){
        $request->validate([
        'Name'=>'required|string|max:255',
        'email'=>'required|string|email',
        'Marks'=>'required|integer',
        'password'=>'required|string|min:6',
        'Description'=>'required|string',
        'Subject'=>'required|string'

        ]);

        $add=students::create($request->all());
        return response()->json($add);
    }
    public function view(){
        $view=students::all();
        return response()->json($view);
    }
}
