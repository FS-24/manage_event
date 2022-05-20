<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function createRegister(){
        return view('auth.register');
    }
    
    public function createLogin(){
        return view('auth.login');
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'c_password'=>'required|same:password'
        ]);

        if ($validator->fails()) {
            return redirect('/register')
            ->withErrors($validator)
            ->withInput();
        }

        $inputs = $request->all();
        $inputs['password'] = bcrypt($inputs['password']);
        
        $user = User::create($inputs);
        return redirect('register')->with(['status'=>'User added successfully']);

    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('events')->with(['user'=>Auth::user()]);
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
            
        ])->onlyInput('email');
    }

        /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}