<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $req)
    {
        //validasi
        $rules = [
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|min:6'
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //create new user in users table
        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password)
        ]);
        $token = $user->createToken('Personal Access Token')->plainTextToken;
        $response = ['user' => $user, 'token' => $token];
        return response()->json($response, 200);
    }

    public function login(Request $req)
    {
        //validasi input data
        $rules = [
            'email' => 'required',
            'password' => 'required|string',
        ];
        $req->validate($rules);
        //find user email
        $user = User::where('email', $req->email)->first();
        //if user email found and password is correct
        if ($user && Hash::check($req->password, $user->password)) {
            $token = $user->createToken('Personal Access Token')->plainTextToken;
            $response = ['user' => $user, 'token' => $token];
            return response()->json($response, 200);
        }
        $response = ["message" => 'Incorrect email or password'];
        return response()->json($response, 400);
    }

    public function index(){
        $users = User::all();
        return response()->json(['message' => 'Succes','data' => $users]);
    }
    public function show($id){
        $user = User::find($id);
        return response()->json(['message' => 'Succes','data' => $user]);
    }
    public function store(Request $request){
        $user = User::create($request->all());
        return response()->json(['message' => 'Succes','data' => $user]);
    }
    public function update(Request $request,$id){
        $user = User::find($id);
        $user->update($request->all());
        return response()->json(['message' => 'Succes','data' => $user]);
    }
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return response()->json(['message' => 'Succes','data' => null]);
    }
}
