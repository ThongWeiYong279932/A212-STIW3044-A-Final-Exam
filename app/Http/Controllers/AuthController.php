<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\tutor; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    //
    public function index(){
        return view('landingpage');
    }

    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function postRegistration(Request $request) 
    { 
        $request->validate([
            'email' => 'required|email|unique:users', 
            'password' => 'required|min:6', 
            'name' => 'required',
            'phoneNo' => 'required',
            'address' => 'required', 
            'state' => 'required',   
        ]); 
        $data = $request->all(); 
        $check = $this->create($data); 
        $check->save(); 

        return redirect("login")->with('save', 'Success')->withErrors('error', 'Failed');; 
   }
   
   public function create(array $data) 
    { 
        return tutor::create([  
            'email' => $data['email'], 
            'password' => Hash::make($data['password']), 
            'name' => $data['name'],
            'phoneNo' => $data['phoneNo'],
            'address' => $data['address'],
            'state' => $data['state'],
        ]); 
    }
    
    public function postLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended('mainpage')->with('save', 'Success')->withErrors('error', 'Failed');
        }
        
        return redirect('login')->withSuccess('You have entered invalid credentials');
    }

    public function logout() 
    { 
        Session::flush(); 
        Auth::logout(); 
        return redirect('login'); 
    } 

}
