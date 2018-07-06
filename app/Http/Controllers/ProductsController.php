<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ZaloClient;

class ProductsController extends Controller
{
    public function index()
    {
        $zaloClient = new ZaloClient();
        $products = $zaloClient->getListProduct()['products'];
        return view('products.index')->with('products', $products);

    }

    public function create()
    {
        return view('products.create');
    }

    public function store()
    {
        $images = request('images');
        $zaloClient = new ZaloClient();
        $image_paths = [];
        foreach($images as $image) {
            $image_paths[] = $image->path();
        }

        $zaloClient->createProduct('demo', 'abcxyzlskdjfksdf', $image_paths, 200000);



        // dd(request()->images[0]->path());

        // foreach($images as $image) {
        //     $featured_new_name = time().$image->getClientOriginalName();
        //     $image->move('uploads/posts', $featured_new_name);

        // }
        // dd('Done');
        
    }

    public function edit()
    {
        // 
    }

    public function update()
    {
        // 
    }

    public function destroy()
    {
        // 
    }
}
