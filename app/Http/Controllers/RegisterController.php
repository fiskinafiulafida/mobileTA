<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAdmin;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Register.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|max:255',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        UserAdmin::create($validatedData);
        $request->session()->flash('success', 'Registrasi Berhasil !! Silahkan Login ');
        return redirect('/loginAdmin');
    }
}
