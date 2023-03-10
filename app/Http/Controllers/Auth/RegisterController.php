<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        request()->validate([
            "name" => ["required", "min:5"],
            "username" => ["alpha_num", "required", "min:3", "max:25", "unique:users,username"],
            "email" => ["email", "required", "unique:users,email"],
            "password" => ["required", "min:6"]
        ]);

        User::create([
            "name" => request("name"),
            "username" => request("username"),
            "email" => request("email"),
            "password" => bcrypt(request("password"))
        ]);

        return response("Thanks, you are registered");

    }
}
