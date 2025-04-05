<div>
    <!-- He who is contented is rich. - Laozi -->
</div>
@extends('layout.main_template')
@section('sectionMain')

<h1>Login</h1>

@dump($errors->all())

<form action="{{route('login.handle')}}" method="POST">
    @csrf 
   
    {{-- email --}}
    <label for="email">Correo electrónico </label>
    <input type="email" name="email">
    {{-- password --}}
    <label for="password">Contraseña</label>
    <input type="password" name="password">
  

    <button type="submit">Login</button>
</form>

@endsection