<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;
use Illuminate\Support\Facades\Storage;
use App\Models\Contact;

class ChatController extends Controller{
    public function showChatroom(Request $req) {
        $contact = $req->input('contact');
        $currentLogin = Storage::get('currentLogin.txt');
        $contacts = new Contact();
        
        $loginContacts = explode(' ',
            $contacts->where('login', $currentLogin)->value('contact')
        );

        if ($contact == '') {
            return view('chat')->with('loginContacts', $loginContacts);
        }

        $allMessages = $this->getMessages($req);

        return view('chatroom')->with('contact', $contact)->with('messages', $allMessages)->with('currentLogin', $currentLogin);
    }

    public function saveMessage(Request $req) {
        $contact = $req->input('contact');
        $message = $req->input('message');
        $messageModel = new Messages();
        $currentLogin = Storage::get('currentLogin.txt');

        $messageModel->from = $currentLogin;
        $messageModel->to = $contact;
        $messageModel->message = $message;
        $messageModel->save();

        $allMessages = $this->getMessages($req);

        return view('chatroom')->with('contact', $contact)->with('messages', $allMessages)->with('currentLogin', $currentLogin);
    }

    private function getMessages(Request $req) {
        $contact = $req->input('contact');
        $message = $req->input('message');
        $messageModel = new Messages();
        $currentLogin = Storage::get('currentLogin.txt');

        $allMessagesSQL = $messageModel->where([
                                           ['from', '=', $currentLogin],
                                           ['to', '=', $contact]
                                       ])
                                       ->orWhere([
                                           ['to', '=', $currentLogin],
                                           ['from', '=', $contact]
                                       ])
                                       ->get();
        $allMessages = array();

        foreach($allMessagesSQL as $message) {
            $allMessages[] = array($message->from, $message->to, $message->message);
        }

        return $allMessages;
    }
}