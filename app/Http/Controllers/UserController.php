<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Contact;
use App\Http\Requests\UserRequest;

class UserController extends Controller {
    private function getLoginContacts(string $currentLogin) {
        $contacts = new Contact();
        
        $loginContacts = explode(' ',
            $contacts->where('login', $currentLogin)->value('contact')
        );

        return $loginContacts;
    }

    public function createAccount(UserRequest $req) {
        $user = new User();
        $isLoginInTable = false;

        foreach ($user::all() as $data) {
            if ($data->login == $req->input('login')) {
                $isLoginInTable = true;
            }
        }
        
        if (!$isLoginInTable) {
            $user->login = $req->input('login');
            $user->psw = $req->input('psw');
            $user->save();
            Storage::put('currentLogin.txt', $req->input('login'));
            $loginContacts = $this->getLoginContacts($req->input('login'));
            return view('chat')->with('loginContacts', $loginContacts);;
        } else {
            return view('reg');
        }
    }

    public function login(UserRequest $req) {
        $user = new User();
        $isLoginInTable = false;

        foreach ($user::all() as $data) {
            if ($data->login == $req->input('login') &&
                $data->psw == $req->input('psw')) {
                Storage::put('currentLogin.txt', $data->login);
                $isLoginInTable = true;
            }
        }

        if ($isLoginInTable) {
            $loginContacts = $this->getLoginContacts($req->input('login'));
            return view('chat')->with('loginContacts', $loginContacts);
        } else {
            return view('login');
        }
    }
}