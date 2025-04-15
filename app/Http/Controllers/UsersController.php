<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class UsersController extends Controller
{
    public function index() {
        $user = User::all();
        return view('users.index', compact('user'));
    }

    public function create () {
        return view('users.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;

        $user->save();
        return redirect()->route('users.index')->with('Success', 'Data berhasil di buat');
}

public function edit ($id) {
    $user= User::find($id);
    return view('users.edit', compact('user'));
}

public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            // 'password'        => 'required',
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');

        // Update password hanya jika diisi
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect()->route('users.index');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            // dd("Login berhasil!", Auth::user()); // Cek apakah user berhasil login
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors(['email' => 'Email atau password salah!']);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login.auth')->with('succes', 'Anda berhasil logout');
    }
}
