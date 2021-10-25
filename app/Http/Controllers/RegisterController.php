<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
  public function create()
  {
    return view('register.create');
  }
  public function store()
  // unique:table,column to check the value if it is unique to avoid sql errors
  {
    $attributes = request()->validate([
      'name' => ['required', 'max:255'],
      'username' => ['required', 'max:255', 'min:3', 'unique:users,username'],
      'email' => ['required', 'email', 'max:255', 'unique:users,email'],
      'password' => ['required', 'min:7', 'max:255']
    ]);

    $user = User::create($attributes);

    //log the user in

    auth()->login($user);

    // flash (or shorthand->with like we did here) will ensure that this message by the name of 'success' is only in the session temporarily. In the layout file we check if the session has any messages and will display them

    return redirect('/')->with('success', 'Your account has been created.');
  }
}
