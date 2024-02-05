<?php

// to make this input in the terminal 'php artisan make:controller ProductController'

namespace App\Http\Controllers;        //copy for /web.php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;                 //from app model + Products 
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function index()
    {               //index is from web.php
        $products = Product::all();          //this is first - get product first before view
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {              //from use illuminate\httmp\request
        //dd($request);    dd($request->name);              for displaying contents from database

        $request->validate([                 //validate data
            'image' => 'required|image|mimes:png,jpg,svg,jpeg,gif',
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'expiration_date' => 'required|date'
        ]);

        if ($request->hasFile('image')) {
           
        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        
        // Use the move method to store the file in the public directory
        $file->move(public_path('image_folder'), $fileName);

        // Set the file path for future use if needed
        $filePath = 'image_folder/' . $fileName;
    }


        

        Product::create([
            'image' =>  $filePath,
            'name' => $request->name,
            'qty' => $request->qty,
            'price' => $request->price,
            'expiration_date' => $request->expiration_date,

        ]);
        return redirect(route('product.index'));     // to return in the table 
    }

    


    
    public function edit(Product $product)
    {        //Product is model and $product is variable
        // dd($product);        to display data
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, int $id)
    {
        $request->validate([                 //validate data
            'image' => 'required|image|mimes:png,jpg,svg,jpeg,gif',
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'expiration_date' => 'required|date'
        ]);

        $data = Product::findOrFail($id);

        if ($request->hasFile('image')) {
           
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            
            // Use the move method to store the file in the public directory
            $file->move(public_path('image_folder'), $fileName);
    
            // Set the file path for future use if needed
            $filePath = 'image_folder/' . $fileName;
        }

        

        if (File::exists($data->image)){
            File::delete($data->image);
        }

        $data->update([
            'image' => $filePath,
            'name' => $request->name,
            'qty' => $request->qty,
            'price' => $request->price,
            'expiration_date' => $request->expiration_date,
        ]);

    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product Deleted Successfully');
    }
}
