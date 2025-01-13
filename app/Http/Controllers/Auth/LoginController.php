<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        // validar el login
        $data = $request->validated();

        // Revisar credenciales
        if (!auth()->attempt($data)) {
            return response([
                'errors' => ['Credenciales incorrectas']
            ], 422);
        } else {
            // Retornar una respuesta
            $user = Auth::user();
            return [
                'token' => $user->createToken('token')->plainTextToken,
                'user' => $user
            ];
        }
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Sesión cerrada con éxito']);
    }
}
