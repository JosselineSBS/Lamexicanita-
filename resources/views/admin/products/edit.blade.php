@extends('layout.main_template')

@section('sectionMain')
    <h2 class="display-3">Actualizar {{$product->name_product}}</h2>



    <div class="container text-center">
        <div class="row">
            <div class="col">

            </div>
            <div class="col">
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @method('PATCH')
                    <label class="form-label">Nombre del Producto</label>
                    <input type="text" class="form-control" name="name_product" value="{{$product->name_product}}">

                    <label class="form-label">Marca</label>
                    <select class="form-select" aria-label="Default select example" name="brand_id">

                        <option value="1">Selecciona . . </option>
                        @foreach ($brands as $brand => $id)
                            <option {{$product->brand_id == $id ? 'selected':'Error'}} value="{{ $id }}">{{ $brand }}</option>
                        @endforeach


                    </select>

                    <label class="form-label">Cantidad </label>
                    <input type="number" class="form-control" name="stock" value="{{$product->stock}}">

                    <label class="form-label">Precio Unitario </label>
                    <input type="text" class="form-control" name="unit_price" value="{{$product->unit_price}}">

                    <label class="form-label">Imagen</label>
                    <input class="form-control" type="file" name="image">

                    <br>
                    <button type="submit" class="btn btn-primary">Guardar</button>



                </form>

            </div>
            <div class="col">

            </div>
        </div>
    </div>
@endsection
