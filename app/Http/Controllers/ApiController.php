<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ApiController extends Controller
{

    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
  
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('LaravelPassportAuth')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
    
    public function logout(Request $request)
    {
        return Auth::logout();
    }

    public function index(Request $request)
    {
        return response()->json(['users' => User::orderBy('id', 'desc')->get()]);
    }

    public function details(string $id)
    {
        return response()->json(['user' => User::find($id)]);
    }
}
