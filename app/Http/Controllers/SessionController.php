<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    // formulaire de connection
    public function create()
    {
        return view('sessions.create');
    }

    // essayé de se connecter
    public function store()
    {
        $credentials = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!auth()->attempt($credentials)) {
            // Fail to login auth attempt...
            throw ValidationException::withMessages([
                'email' => 'You provided credentials could not be verified',
            ]);
        }

        session()->regenerate();
        // Authentication passed...
        $username = ucfirst(auth()->user()->username);
        //
        return redirect('/',)
            ->with('success', __('messages.logged_in'));
        /* return back()
             ->withInput()
             ->withErrors(['email' => 'You provided credentials could not be verified']);*/
        /* TODO: Mail confirmation, reset password */
    }

    // se déconnecter
    public function destroy()
    {
        $username = ucfirst(auth()->user()->username);
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye ' . $username . '. You’re now disconnected !');
    }
    public function show()
    {
        return view('/sessions.show');
    }
}
