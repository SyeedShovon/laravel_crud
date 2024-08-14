<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //crud functions
    public function loadAllUsers(){
        $all_users = User::all();
        return view('users');
    }

    public function loadAddUserForm(){
        return view('add-user');
    }

    public function AddUser(Request $request){
        //validation
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'number' => 'required|integer',
            'password' => 'required|confirmed|min:4|max:8'
        ]);
    }
}
