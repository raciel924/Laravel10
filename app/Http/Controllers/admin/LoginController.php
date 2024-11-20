<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    public function login(Request $request)
    {
      
       if($request->email == null || $request->password == null){
           return response()->json(['message' => 'El email y el password son necesarios'], 401);
       }
        // Buscar al usuario por email
        $user = User::where('email', $request->email)->first();
    
        // Verificar si el usuario existe y la contraseña es correcta
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        // Crear un token para el usuario
        $token = $user->createToken('auth_token')->plainTextToken;

        // Retornar el token como respuesta
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Sesión cerrada correctamente']);
    }
    
}
