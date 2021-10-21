<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Validation\Rule;
use PhpParser\Node\Stmt\Return_;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }
    public function store(StoreUserRequest $r)
    {
        $user = User::create($r->validated());
        auth()->login($user);
        return redirect('/')->with('success', __('messages.account-created'));
    }
}
