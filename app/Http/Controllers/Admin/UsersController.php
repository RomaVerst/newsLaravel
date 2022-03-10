<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use DB, Storage;

class UsersController extends Controller
{
    function index(User $user){
        $usersList = $user->all()->whereNotIn('id', [Auth::user()->id]); 
        return view('admin.users_list')->with('usersList', $usersList);
    }

    function destroyUser(User $user){
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'Пользователь уничтожен!');
    }
    public function toggleAdmin(User $user){
        if($user->id != Auth::user()->id){
            $user->is_admin = !$user->is_admin;
            $user->save();
            return redirect()->route('admin.users')->with('success', 'Права на админа изменены!');
        }
        return redirect()->route('admin.users')->with('error', 'Нельзя менять права себе!');
    }
}
