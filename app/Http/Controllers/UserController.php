<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\search;

class UserController extends Controller
{
  public function index()
  {
    if (request("search")) {
      return view('dashboard.users', [
        "title" => "Users",
        "active" => "dashboard",
        "users" => User::where('name', 'LIKE', '%' . request('search') . '%')->orWhere('phone', 'LIKE', '%' . request('search') . '%')->latest()->paginate(5)
      ]);
    }
    return view('dashboard.users', [
      "title" => "Users",
      "active" => "dashboard",
      "users" => User::latest()->paginate(5)
    ]);
  }
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
      'email' => 'required|email|exists:users,email',
      'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      return redirect()->intended('/dashboard')->with('success', 'Log In successfully');
    } else {
      return back()->withError('error', "Email or password is incorrect!");
    }
  }

  public function logout()
  {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect(route('home'))->with('success', 'Log Out successfully!');
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
      'email' => 'required|email|unique:users',
      'name' => 'required|min:3|max:255',
      'phone' => 'required|numeric|digits_between:8,20|unique:users',
      'address' => 'required|max:255|min:3',
      'password' => 'required|min:8|max:255',
      'confirm-password' => 'required|min:2|max:255',
    ]);

    if ($validatedData['password'] !== $validatedData['confirm-password']) {
      return redirect()->back()->withErrors(['confirm-password' => "Confirmed password seems did'nt match"]);
    }

    if ($request->file('avatar')) {
      $validatedData['avatar'] = $request->file('avatar')->store('avatar', 'public');
    }

    $validatedData['password'] = Hash::make($validatedData['password']);
    User::create($validatedData);
    return redirect('/login')->with('success', 'Account registered successfully');
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
    $request['phone'] = str_replace(['-', '+', ' '], '', $request['phone']);

    $rules = [
      'name' => 'required',
      'email' => 'required|email:dns',
      'phone'  => 'required|numeric',
      'address' => 'required'
    ];

    if ($request->file('avatar')) {
      $rules['avatar'] = 'image|file|max:2048|mimes:png,jpg,svg,jpeg,webp';
    }

    $data = $request->validate($rules);

    if ($request->file('avatar')) {
      if ($request->old_avatar) {
        Storage::delete($request->old_avatar);
      }
      $data['avatar'] = $request->file('avatar')->store('avatar', 'public');
    }

    User::where('id', $user->id)->update($data);
    return redirect()->back()->with('success', 'User data has been updated');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
    User::destroy($user->id);
    return redirect()->back()->with('success', 'User has been deleted sucessfully');
  }
}
