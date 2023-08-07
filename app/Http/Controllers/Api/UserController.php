<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{

    public function collection()
    {
        return response()->json([
                    'items' => User::all(),
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
