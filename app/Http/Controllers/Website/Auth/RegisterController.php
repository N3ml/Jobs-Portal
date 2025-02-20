<?php

namespace App\Http\Controllers\Website\Auth;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\BloogerRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Enums\UserRoleEnum;

class RegisterController extends Controller
{
    public function registerView()
    {
        return view('website.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => RoleEnum::APPLICANT->value,
        ]);

        auth()->login($user);

        return redirect()->route('website.home');
    }

}
