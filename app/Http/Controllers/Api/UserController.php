<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as BaseController;
use App\Models\User;

class UserController extends BaseController
{

    public function index()
    {
        return response()->json([
                    'items' => User::all(),
        ]);
    }
}
