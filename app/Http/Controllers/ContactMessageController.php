<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactMessage;


/**
 *
 */
class ContactMessageController extends Controller
{
    public function getContactIndex()
    {
      return view('frontend.other.contact');
    }

    public function postSendMessage(Request $request)
    {
      $this->validate($request, [
        'email' => 'required',
        'name' => 'required|max:80',
        'subject' => 'required',
        'message'=> 'required'
      ]);

      $message = new ContactMessage();
      $message->email = $request['email'];
      $message->sender = $request['name'];
      $message->subject = $request['subject'];
      $message->body = $request['message'];
      $message->save();

      return redirect()->route('contact')->with(['success' => 'Message successfully sent!']);
    }
}
