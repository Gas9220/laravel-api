<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewMessage;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function store(Request $request){

        $data = $request->validate([
            'user' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string'
        ]);
    
        $new_message = new Message();
        $new_message->user = $data['user'];
        $new_message->email = $data['email'];
        $new_message->message = $data['message'];
        $new_message->save();
    
        Mail::to('projects-contact@me.com')->send(new NewMessage($new_message));
    
        return $new_message;
       }
}
