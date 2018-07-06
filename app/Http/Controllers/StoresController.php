<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use Auth;

class StoresController extends Controller
{
    public function index()
    {
        $stores = Store::paginate(10);
        return view('stores.index')->with('stores', $stores);
    }

    public function create()
    {
        return view('stores.create');
    }

    public function store()
    {
        $store = Store::create([
            'name' => request('name'),
            'oa_id' => request('oa_id'),
            'oa_secret' => request('oa_secret')
        ]);

        Auth::user()->store_id = $store->id;
        Auth::user()->save();

        session()->flash('success', 'New store added successfully');
        return redirect()->route('stores.index');
    }
}
