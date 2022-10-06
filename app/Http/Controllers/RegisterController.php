<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view('register.index', [
            'title' => 'Register Account'
        ]); 
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255|unique:users',
            'email' => 'required|email:dns|max:255|unique:users',
            'password' => 'required|min:8|max:255',
        ]);

        // enkripsi password
        $validateData['password'] = bcrypt($validateData['password']);

        //input database
        User::create($validateData); 

        //kembali ke halaman login + menampilkan succes
        return redirect('/login')->with('success', 'Registration success, Please login!');
    }
}
