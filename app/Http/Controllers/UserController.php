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
    if (strtolower(auth()->user()->role) != 'admin') {
      return abort(401);
    }

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

      if (strtolower(auth()->user()->role) != 'admin') {
        return redirect()->intended(route('booking.index'))->with('success', 'Log In successfully');
      } else {
        return redirect()->intended('/dashboard')->with('success', 'Log In successfully');
      }
    } else {
      return back()->withError('error', "Email Or Password Is Incorrect!");
    }
  }

  public function logout()
  {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect(route('home'))->with('success', 'Log Out Successfully!');
  }

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
    return redirect('/login')->with('success', 'Account Registrated Successfully');
  }
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
    return redirect()->back()->with('success', 'User Data Has Been Updated');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
    User::destroy($user->id);
    return redirect()->back()->with('success', 'User Has Been Deleted Sucessfully');
  }
}
