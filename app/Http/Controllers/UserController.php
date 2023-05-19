<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        
        return view('home');
    }
    public function aboutus()
    {
        return view('aboutus');
    }
    public function contactus()
    {
        return view('contactus');
    }
    public function gallery()
    {
        return view('gallery');
    }
    public function registration()
    {
        return view('registration');
    }
    public function login()
    {
        return view('login');
    }
    public function checkagefun()
    {
        echo 'Done';
    }
    // public function admin(Request $request)
    // {
    //     csrf_token();
    //     return view('alterview');
    // }
}