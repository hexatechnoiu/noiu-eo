<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function register()
    {
        return view('auth.register', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }
    public function login()
    {
        return view('auth.login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('showAlert', true);
        } else {
            return back()->with('loginError', "Email or password is incorrect!");
        }
    }
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect(route('home'))->with('showAlert', true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'avatar' => 'required|image|mimes:png,jpg,svg,jpeg,webp,gif|max:4096',
            'email' => 'required|email:dns|unique:users',
            'name' => 'required|min:3|max:255',
            'phone' => 'required|numeric|digits_between:8,15|unique:users',
            'address' => 'required|max:255|min:3',
            'password' => 'required|min:8|max:255',
            'confirm-password' => 'required|min:2|max:255',
        ]);

        if ($validatedData['password'] !== $validatedData['confirm-password']) {
            return redirect()->back()->withErrors(['confirm-password' => "Confirmed password seems did'nt match"]);
        }

        if ($request->file('avatar')) {
            $validatedData['avatar'] = Storage::disk('public')->putFile('avatars', $request->file('avatar'));
        }

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/login')->with('showAlert', true);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
