<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show (){
        return view ('auth.login');
    }

    public function handle (){
        // crear la sesión 
        $succes = auth()->attempt([
            'email' => request ('email'),
            'password' => request ('password')
        ], request()->has('remeber'));

        if ($succes){
            return redirect()->to(RouteServiceProvider::HOME)->with('succes', 'Usuario Registrado');
        }
            return back()->withErrors([
                'email' => 'Las credenciales no coinciden con nuestros registros',
            ]);
    }
}
