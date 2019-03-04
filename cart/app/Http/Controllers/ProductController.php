<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('list', compact('products'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('show', compact('product'));
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $product->image = $path;
        }
        $product->save();
        return redirect()->route('index');

    }
    public function edit($id)
    {
        $product = Product::where('id',$id)->first();
        return view('edit', compact('product'));
    }
    public function update(Request $request,$id)
    {
        $product = Product::where('id', $id)->first();
        $product->name = $request->input('name');
        $product->price = $request->input('price');

        if ($request->hasFile('image'))
        {
            $currentImg = $product->image;
            if ($currentImg){
                Storage::delete('/public' .$currentImg);
            }
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $product->image = $path;
        }

        $product->save();

        return redirect()->route('index');
    }

    public function destroy($id)
    {
        $product =Product::where('id',$id)->first();
        $image = $product->image;

        if ($image){
            Storage::delete('/public/'.$image);
        }
        $product->delete();
        return redirect()->route('index');
    }


}
