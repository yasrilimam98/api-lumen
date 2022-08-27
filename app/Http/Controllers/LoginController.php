<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        if ($user->password === $password) {
            $token = Str::random(60);

            $user->update([
                'api_token' => $token
            ]);

            return response()->json([
                'message' => 'Login Berhasil!',
                'data' => $user,
                'token' => $token
            ]);
        } else {
            return response()->json([
                'message' => 'Login Gagal!',
                'data' => ''
            ]);
        }
    }

    public function register(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'level' => 'required',
            'status' => 'required',
            'relasi' => 'required',
        ]);

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