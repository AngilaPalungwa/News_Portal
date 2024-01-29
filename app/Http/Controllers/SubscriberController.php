<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use App\Models\Subscriber;
use App\Notifications\EventNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{

    public function subscriber(Request $request)
    {
        $request->validate([
            'email' =>'required|email'
        ]);
        $subscriber=new Subscriber();
        $subscriber->email=$request->email;
        $subscriber->save();
        Mail::to($request->email)->send(new SubscriberMail());
        $request->session()->flash('success','Subscribed');
        return redirect()->route('home');
    }
    
    public function subscribe()
    {
        $subscribers=Subscriber::all();
        return view('backend.subscribe.index',compact('subscribers'));
    }

    // Notification via mail
    public function event()
    {
        $notice=[
            "title"=>"Nameste",
            "message"=>"Hello According to the Pew Research Center, 97% of adult Americans have a cell phone capable of receiving text messages. As time spent on phones continues to increase, it's no surprise that businesses are pursuing text message marketing campaigns. There are dozens of quality services on the market, but a few stand out, especially for small businesses looking to please subscribers. We researched 13 text message marketing services and chose our five best picks based on their features, pricing, ease of use, setup process and customer service.",
        ];
        $subscribers=Subscriber::all();
        Notification::send($subscribers, new EventNotification($notice ));
       session()->flash('success','Notification Send');
        return view('backend.subscribe.index',compact('subscribers'));
    }
}
