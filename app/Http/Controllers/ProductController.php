<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    //This method will show created Product Page
    public function create(){
        return view('product.create');
    }

    // This method will store in db
    public function store(Request $request)
{
    $rules = [
        'name' => 'required|min:2',
        'sku' => 'required|min:3',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return redirect()->route('product.create')->withInput()->withErrors($validator);
    }

    // Handle image upload
    $imageName = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
    }

    // Create a new product
    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'sku' => $request->sku,
        'description' => $request->description,
        'image' => $imageName,
    ]);

    return redirect()->route('product.index')->with('success', 'Product created successfully.');
}
public function index(){
    $product = Product::all(); // Fetch all products from the database
    return view('product.list', compact('product'));
}
public function edit($id){
    $product = Product::findorFail($id); // Fetch all products from the database
    return view('product.edit', ['product'=>$product]);
}
public function update($id, Request $request){
    $product = Product::findOrFail($id); // Fetch the product from the database

    $rules = [
        'name' => 'required|min:2',
        'sku' => 'required|min:3',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return redirect()->route('product.edit', $product->id)->withInput()->withErrors($validator);
    }

    // Handle image upload
    $imageName = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
    }

    // Update the product
    $product->update([
        'name' => $request->name,
        'price' => $request->price,
        'sku' => $request->sku,
        'description' => $request->description,
    ]);

    return redirect()->route('product.index')->with('success', 'Product updated successfully.');
}
public function destroy($id){
    $product = Product::findorFail($id); 
    File::delete(public_path('uploads/products/'.$product->image));

    $product->delete();
    return redirect()->route('product.index')->with('success','Product deleted Successfully');
}
public function filterbyid(Request $request){
    $request=validate([
        'id' =>'required|array',
        'ids.*'=>'integer'        
    ]);
    $product=Product::whereIn('id',$request->input('ids'))->get();
    return view('product.filter',compact('products'));
}

public function home(Request $request){

    $name= $request->name;
    return $name;
    // return  $request;
}   


}


