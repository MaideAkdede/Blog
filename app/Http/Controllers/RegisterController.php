<?php

namespace App\Http\Controllers;

use App\Models\User;
use PhpParser\Node\Stmt\Return_;

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
        $validateData = request()->validate([
            'name' => 'required|min:3',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|max:32',
        ]);

        User::create($validateData);

        return 'User Crée';
    }
}
