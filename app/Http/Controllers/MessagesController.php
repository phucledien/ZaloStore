<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Log;
use App\Customer;
use App\Message;
use App\User;
use App\ZaloClient;
use App\Events\MessageCreated;

class MessagesController extends Controller
{
    // Show all messages
    public function index()
    {
        return view('admin.messages.index');
    }

    public function store()
    {
        $message = Message::create([
            'user_id' => Auth::user()->id,
            'text' => request('text'),
            'customer_id' => request('customer_id'),
            'from' => 0
        ]);

        $customer = Customer::find(request('customer_id'));

        $zaloClient = new ZaloClient();

        $zaloClient->sendMessage($customer->userId, request('text'));
        
        MessageCreated::dispatch($message);

        return redirect()->back();
    }

    // Called by axios to get messages for index view
    public function apiIndex() {
        $customers = Customer::get();

        $messages = [];
        foreach ($customers as $customer) {
            // Get last message of each customer
            $messages[] = $customer->messages()->get()->last();
        }
        
        // Sort messages by created_at field asc
        usort ($messages, function($a, $b)
        {
            return strcmp($b->created_at, $a->created_at);
        });
        
        // Format Messages for client side using
        $formatedMessages = [];
        foreach ($messages as $message) {
            $formatedMessages[] = [
                                    'text'        => $message->text,
                                    'created_at'  => $message->created_at->diffForHumans(),
                                    'name'        => $message->customer->name,
                                    'customer_id' => $message->customer_id,
                                    'from'        => $message->from // 0 is user, 1 is customer
                                    ];
        }

        return $formatedMessages;
    }

    // Called by axios to get messages for show view
    public function apiShow($uid)
    {
        $messages = Message::where('customer_id', $uid)->get();

        $formatedMessages = [];
        foreach ($messages as $message) {
            $formatedMessages[] = [
                                    'text'        => $message->text,
                                    'created_at'  => $message->created_at->diffForHumans(),
                                    'name'        => $message->customer->name,
                                    'customer_id' => $message->customer_id,
                                    'from'        => $message->from // 0 is user, 1 is customer
                                    ];
        }

        return $formatedMessages;
    }

    // Show chat session between user and customer
    public function show($uid)
    {
        $customer = Customer::find($uid);
        return view('admin.messages.show')->with('customer', $customer);
    }
    
    // Callback called by zalo webhook
    public function callback()
    {
        Log::info(request()->all());
        if (request('event') == 'sendmsg') {
            $uid = request('fromuid');
            $customer = Customer::where('userId', $uid)->first();
            if($customer == null) {
                $zaloClient = new ZaloClient();
                $customInfo = $zaloClient->getFollowerInfo($uid);
                $customer = Customer::create([
                    'userId'       => $uid,
                    'name'         => $customInfo['displayName'],
                    'phone'        => '099999999'
                ]);
            }

            $message = $customer->messages()->create([
                'user_id' => User::first()->id,
                'from'    => 1,
                'text'    => request('message'),
            ]);
            
            // Broadcast event MessageCreated
            MessageCreated::dispatch($message);
        }

    }

    // View broadcast message feature
    public function broadcastCreate()
    {
        return view('admin.messages.broadcast');
    }

    // Broadcast message to all followers through Zalo Client
    public function broadcastStore()
    {   
        $zaloClient = new ZaloClient();

        $zaloClient->broadcast(request()->message);

        session()->flash('success', 'Broadcasted message successfully');

        return redirect()->route('messages.broadcast.create');
    }
}
