<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;

class ContactController extends Controller {
    public function getAllUsers() {
        $user = new User();
        $userList = [];
        $currentLogin = Storage::get('currentLogin.txt');

        foreach($user::all() as $data) {
            if ($currentLogin != $data->login) {
                $userList[] = $data->login;
            }   
        }

        return view('contacts')->with('userList', $userList);
    }

    public function addContacts(Request $req) {
        $currentLogin = Storage::get('currentLogin.txt');
        $contacts = new Contact();

        $loginContacts = explode(' ',
            $contacts->where('login', $currentLogin)->value('contact')
        );

        if(count($req->request) == 1) {
            return view('chat')->with('loginContacts', $loginContacts);
        }

        if ($loginContacts[0] != '') {
            $contactsToAdd = $this->updateStatement($contacts, $currentLogin, $req, $loginContacts);
        } else {
            $contactsToAdd = $this->createStatement($contacts, $currentLogin, $req);
        }

        return view('chat')->with('loginContacts', $contactsToAdd);
    }

    private function createStatement(Contact $contacts, string $currentLogin, Request $req) {
        $contactsToAdd = array();

        foreach($req->request as $data) {
            if ($data != $req->_token) {
                $contactsToAdd[] = $data;
            }
        }

        $contacts->login = $currentLogin;
        $contacts->contact = implode(' ', $contactsToAdd);
        $contacts->save();

        return $contactsToAdd;
    }

    private function updateStatement(Contact $contacts, string $currentLogin, Request $req, array $loginContacts) {
        $contactsToAdd = array();

        $loginContacts = explode(' ',
            $contacts->where('login', $currentLogin)->value('contact')
        );

        foreach($req->request as $data) {
            if ($data != $req->_token && !in_array($data, $loginContacts)) {
                $contactsToAdd[] = $data;
            } 
        }

        $contacts->where(
            'login', $currentLogin
        )->update(
            ['contact' => implode(' ', 
                array_merge($loginContacts, $contactsToAdd))]
        );

        if ($contactsToAdd == []) {
            return $loginContacts;
        }

        return $contactsToAdd;
    }
}
