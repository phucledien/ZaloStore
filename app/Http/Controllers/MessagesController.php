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

    public function send()
    {   
        $zaloClient = new ZaloClient();
        $zaloClient->broadcast(request()->message);
        session()->flash('success', 'Sent message');
        return redirect()->route('messages.index');
    }
}
