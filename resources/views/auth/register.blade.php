@extends('layout.main_template')
@section('sectionMain')

<h1>Registro</h1>

@dump($errors->all())

<form action="{{route('register.handle')}}" method="POST">
    @csrf 
    {{-- nombre --}}
    <label for="name">Nombre</label>
    <input type="text" name="name">
    {{-- email --}}
    <label for="email">Correo electrónico </label>
    <input type="email" name="email">
    {{-- password --}}
    <label for="password">Contraseña</label>
    <input type="password" name="password">
    {{-- confirm password --}}
    <label for="password_confirm">Confirmar contraseña</label>
    <input type="password" name="password_confirmation">

    <button type="submit">Registrar </button>
</form>

@endsection