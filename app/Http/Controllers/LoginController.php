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
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $token = Str::random(60);
        $password = app('hash')->make($request->input('password'));

        $data = [
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'password' => $password,
            'api_token' => $token
        ];

        if (User::create($data)) {
            return response()->json([
                'message' => 'Register Berhasil!',
                'data' => $data,
                'token' => $token
            ]);
        } else {
            return response()->json([
                'message' => 'Register Gagal!',
                'data' => 'kosong'
            ]);
        }
    }
}