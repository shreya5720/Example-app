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
    
    public function update($id,Request $request){
        $update=students::find($id);
        $update->update($request->all());
        return response()->json($update);
    }
    public function delete($id){
        $delete=students::find($id);
        $delete->delete();
        return response()->json($delete);
    }
    public function where(){
        $select_data=students::where('Marks','>',50)->get();
        return response()->json($select_data);
    }
    public function select(){
        $select=students::select('name','Marks')->get();
        return response()->json($select);
    }

}
