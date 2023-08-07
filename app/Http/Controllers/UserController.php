<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function collection()
    {
        return response()->json([
                    'users' => User::all(),
        ]);
    }

    /**
     * 
     * @param int $id
     * @return object
     */
    public function details(int $id): object
    {
        return response()->json([
                    'item' => User::where('id', $id)->first(),
        ]);
    }

}
