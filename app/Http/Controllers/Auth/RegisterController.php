<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    // Mostrar el formulario de registro 
public function show(){
    return view('auth.register');
}
// Registrar en BD el resgistro de usuario 
public function handle(){

    request()->validate([
        'name'=> ['required', 'string', 'max:100'],
        'email'=> ['required', 'email', 'max:150'],
        'password'=> ['required', 'string', 'min:4', 'confirmed']

    ]);

    // Crear registro en la tabla users
   $user = User::
    create([
        'name' => request('name'),
        'email' => request('email'),
        'password' => Hash::make(request('password'))
    ]);

    // evento de confirmación 
    event(new Registered($user));
    // autenticar una vez registrado 
    Auth::login($user);
    //Redireccionar 
    return redirect()->to(RouteServiceProvider::HOME)->with('succes', 'Usuario Registrado');
}
}
