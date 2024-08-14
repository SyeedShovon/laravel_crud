<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //crud functions
    public function loadAllUsers(){
        return view('users');
    }
}
