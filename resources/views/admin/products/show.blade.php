@extends('layout.main_template')

@section('sectionMain')
<h2 class="display-4">Detalles del  Dulces</h2>

<p class="display-6">Producto: {{$product->name_product}} </p>
<p class="display-6">Cantidad: {{$product->stock}}</p>
<p class="display-6">Precio: {{$product->unit_price}} </p>
<p class="display-6">Imagen: {{$product->image}}</p>

<a class="btn btn-primary" href="{{route('products.index')}}">Regresar</a>
@endsection
