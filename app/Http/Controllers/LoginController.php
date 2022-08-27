<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        echo "Login";
    }

    public function register(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'level' => 'pelanggan',
            'api_token' => '123456',
            'status' => '1',
            'relasi' => $request->input('relasi')
        ];
        User::create($data);
        return response()->json($data);
    }
}