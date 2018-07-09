<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use App\ZaloClient;

class MessagesController extends Controller
{
    public function index()
    {
        return view('admin.messages.index');
    }

    public function callback()
    {
        Log::info('ZALO CALLBACK: '.request());
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
