<?php

namespace App\Http\Controllers;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        //Valider nos données validate fournis par l’objet request
        // arg. de validation
        request()->validate([
            'name' => 'required|min:3',
            'username' => 'required|unique:',
            'email' => 'required|email|unique:users,email',
            'password'=> 'required|min:3|max:32',
        ]);
    }
}
