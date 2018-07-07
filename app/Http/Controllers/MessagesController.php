<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ZaloClient;

class MessagesController extends Controller
{
    public function index()
    {
        return view('messages.index');
    }

    public function broadcastCreate()
    {
        return view('admin.messages.broadcast');
    }

    public function broadcastStore()
    {   
        $zaloClient = new ZaloClient();

        $zaloClient->broadcast(request()->message);

        session()->flash('success', 'Broadcasted message successfully');

        return redirect()->route('messages.broadcast.create');
    }
}
