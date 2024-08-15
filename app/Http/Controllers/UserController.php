<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    //crud functions
    public function loadAllUsers(){
        $all_users = User::all();
        return view('users', compact('all_users'));
    }

    public function loadAddUserForm(){
        return view('add-user');
    }

    public function AddUser(Request $request){
        //validation
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'number' => 'required',
            'password' => 'required|confirmed|min:4|max:8'
        ]);

        try {
            //user register
            $new_user = new User;
            $new_user->name = $request->full_name;
            $new_user->email = $request->email;
            $new_user->number = $request->number;
            $new_user->password = Hash::make($request->password);
            $new_user->save();
            return redirect('/users')->with('success','User added successfully');
        } catch (\Exception $e) {
            return redirect('/add/user')->with('fail',$e->getMessage());
        }
    }

    public function loadEditForm($id){
        $user = User::find($id);
        return view('/edit-user',compact('user'));
    }

    public function EditUser(Request $request){
        //validation
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'number' => 'required'
        ]);

        try {
            //user update
            $update_user = User::where('id',$request->user_id)->update([
                'name' => $request->full_name,
                'email' => $request->email,
                'number' => $request->number,
            ]);
            return redirect('/users')->with('success','User Updated successfully');
        } catch (\Exception $e) {
            return redirect('/edit/user')->with('fail',$e->getMessage());
        }
    }

    public function deleteUser($id){
        try {
            User::where('id',$id)->delete();
            return redirect('/users')->with('success','User deleted successfully');
        } catch (\Exception $e) {
            return redirect('/users')->with('fail',$e->getMessage());
        }
    }
}
