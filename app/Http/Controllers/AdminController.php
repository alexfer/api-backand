<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(['users' => User::orderBy('id', 'desc')->get()]);
    }
    
    public function details(string $id)
    {
        return response()->json(['user' => User::find($id)]);
    }
}
