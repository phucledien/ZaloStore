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
        $categories = $zaloClient->getCategories()['cates'];
        return view('admin.products.index')->with('products', $products);

    }

    public function create()
    {
        $zaloClient = new ZaloClient();
        $categories = $zaloClient->getCategories()['cates'];
        return view('admin.products.create')->with('categories',$categories);
    }

    public function store()
    {
        $zaloClient = new ZaloClient();

        $name = request('name');
        $desc = request('description');
        $cateids = request('Categories');
        $price= request('price');   
        $images = request('images');
        $image_paths = [];
    
        foreach($images as $image) {
            $image_paths[] = $image->path();
        }

        dd(request()->images[0]->path());
        //$zaloClient->createProduct($name, $desc, $image_paths, $price);



        // dd(request()->images[0]->path());

        // foreach($images as $image) {
        //     $featured_new_name = time().$image->getClientOriginalName();
        //     $image->move('uploads/posts', $featured_new_name);

        // }
        // dd('Done');
    }   
    

    public function edit($id)
    {
        $zaloClient = new ZaloClient();
        $categories = $zaloClient->getCategories()['cates'];
        
        return view('admin.products.edit')->with('categories',$categories)->with('id',$id);
    }

    public function update()
    {
        $zaloClient = new ZaloClient();
        $name = request('name');
        $desc = request('description');
        $cateids = request('Categories');
        $price= request('price');   
        $images = request('images');
        $image_paths = [];
        foreach($images as $image) {
            $image_paths[] = $image->path();
        }

        $zaloClient->updateProduct($product_id,$name, $desc, $image_paths, $price);
    }

    public function destroy()
    {
        // 
    }
}
