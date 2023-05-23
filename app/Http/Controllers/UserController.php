<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /* show register form */
    public function register(){
        return view("user.register");
    }
    /* show login form */
    public function login(){
        return view("user.login");
    }

    /* show edit user data form */
    public function edit(){
        return view("user.edit", ['user' => auth()->user()]);
    }

    /* show user dashboard */
    public function getData() {
        $user = auth()->user();
        return view('user.index', ['user' => $user, 'posts' => $user->posts()->orderBy('id', 'desc')->get()] );
    }

    /* authenticate user login request */
    public function authenticate(Request $request) {
        $formData = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formData)){
            $request->session()->regenerateToken();
            return redirect("/user")->with('message', "You are now logged in");
        }

        return back()->withErrors(['email' => "Invalid Credentials"])->onlyInput("email");
    }

    /* create user account */
    public function store(Request $request) {
        /* validate data from request */
        $formData = $request->validate([
            'name' => ['min:3', 'required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        /* hash password */
        $formData['password'] = bcrypt($formData['password']);

        //default value
        $formData['description'] = "";

        /* save user to database */
        $user = User::create($formData);

        /* login new user automatically */
        auth()->login($user);

        return redirect("/")->with('message', "User created and logged in");
    }

    /* update user data */
    public function update(Request $request){
        $formFields = $request->validate([
           "description" => ["required"]
        ]);

        if($request->hasFile('photo')){
            $formFields['user_photo'] = $request->file('photo')->store("images", 'public');
        }

        auth()->user()->update($formFields);

        return redirect("/user")->with('message', "User data was updated!");
    }

    public function logout(Request $request) {
        auth()->logout();

        /* regenerate session token */
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', "You have been logged out!");
    }
}
