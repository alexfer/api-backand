<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(['Lumen' => app()->version()]);
    }
}
