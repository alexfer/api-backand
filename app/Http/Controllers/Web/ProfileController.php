<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{

    public function profile()
    {
        return view('web.profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'password' => 'required|min:7',
        ]);

        User::where('id', auth()->user()->id)->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        $credentials = $request->only('name', 'password');
        auth()->attempt($credentials);
        $request->session()->regenerate();
        Session::flash('message', 'You have successfully updated own profile');

        return redirect()->route('profile.web.profile');
    }
}
