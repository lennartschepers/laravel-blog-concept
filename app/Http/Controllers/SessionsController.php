<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
  public function create()
  {
    return view('sessions.create');
  }

  public function store()
  {
    // validate the request
    $credentials = request()->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);
    // attempt to authenticate and log in the user based on provided credentials
    if (!auth()->attempt($credentials)) {
      // auth failed
      //below commented code works the same, I found the exception to be cleaner though.
      // withInput will flash an array of input to the session so that the email will remain in the input after an error
      /* return back() */
      /*   ->withInput() */
      /*   ->withErrors(['email' => 'Your provided credentials could not be verified']); */
      throw ValidationException::withMessages([
        'email' => 'Your provided credentials could not be verified'
      ]);
    }
    //protect against session fixation where an attacker can trick a user into using a specific session id when logging in and then stealing his credentials with that id.
    session()->regenerate();
    // redirect
    return redirect('/')->with('success', 'Welcome Back');
  }


  public function destroy()
  {

    auth()->logout();

    return redirect('/')->with('success', 'Goodbye');
  }
}
