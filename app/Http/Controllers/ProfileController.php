<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

class ProfileController extends Controller
{
   function update(Request $request){
        $user = Auth::user();
        $errors = [];
        if ($request->isMethod('post')) {
            $this->validate($request, $this->validateRules(), [], $this->attributeNames());
            if (Hash::check($request->post('password'), $user->password)){
                $user->fill([
                    'name' => $request->post('name'),
                    'password' => Hash::make($request->post('new_password')),
                    'email' => $request->post('email')
                ]);
                $user->save();
                return redirect()->route('updateProfile')->with('success', 'Профиль изменён');
            } else{
                $errors['password'][] = 'Неверно введен текущий пароль';
                return redirect()->route('updateProfile')->withErrors($errors);
            }
       }
       return view('profile', [
           'user' => $user
       ]);
   }
   protected function validateRules() {
        return [
            'name' => 'required|string|min:3|max:15',
            'email' => 'required|email|unique:users,email,'.Auth::id(),
            'password' => 'required',
            'new_password' => 'required|string|min:3'
        ];
    }

    protected function attributeNames() {
        return [
            'new_password' => 'Новый пароль'
        ];
    }
}
