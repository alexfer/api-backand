<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(['App version' => app()->version()]);
    }
}
