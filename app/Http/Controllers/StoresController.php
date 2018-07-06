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
        return view('admin.stores.index')->with('stores', $stores);
    }

    public function create()
    {
        return view('admin.stores.create');
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

    public function edit(Store $store)
    {
        return view('admin.stores.edit')->with('store', $store);
    }

    public function update(Store $store)
    {
        $store->name = request('name');
        $store->oa_id = request('oa_id');
        $store->oa_secret = request('oa_secret');
        $store->save();

        session()->flash('success', 'Updated Store Successfully');

        return redirect()->route('stores.edit', ['store' => $store->id]);
    }

    public function destroy(Store $store)
    {
        $store->delete();
        session()->flash('success', 'Deleted Store Successfully');

        return redirect()->route('stores.index');
    }

    public function select(Store $store)
    {
        $user = Auth::user();
        $user->store_id = $store->id;
        $user->save();
        session()->flash('success', 'Changed Store successfully');

        return redirect()->back();
    }
}
