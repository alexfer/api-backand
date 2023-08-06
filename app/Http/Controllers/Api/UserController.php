<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as BaseController;
use App\Models\User;

class UserController extends BaseController
{

    /**
     * 
     * @return object
     */
    public function index(): object
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
