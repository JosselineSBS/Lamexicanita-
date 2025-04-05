@extends('layout.main_template')

@section('sectionMain')
<table>
<thead>
    ¿Estás seguro que quieres eliminar el producto {{$product->name_product}}?
</thead>
<tbody>
    <tr>
        <td>
            <form action="{{route('products.index')}}">
            <button type="submit" class="btn btn-danger" href=""><i
            class="fa-solid fa-trash"></i>Cancelar {{-- Redirecciona a index --}}
        </button>
            </form>
        </td>
        <td>
            <form action="{{route('products.destroy', $product->id)}}" method="POST">
                @method('DELETE')
                @csrf
            <button type="submit" class="btn btn-primary" href=""><i
            class="fa-solid fa-trash"></i>Confirmar {{-- Redirecciona a destroy y elimina --}}
        </button>
            </form>
        </td>
    </tr>
</tbody>
</table>
@endsection
