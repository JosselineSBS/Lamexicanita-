@extends('layout.main_template')

@section('sectionMain')
    <h2 class="display-3">Formulario registro de dulces </h2>



    <div class="container text-center">
        <div class="row">
            <div class="col">

            </div>
            <div class="col">
                <!-- @dump($errors->get('name_product')) -->
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <label class="form-label">Nombre del Producto</label>
                    <input type="text" class="form-control @error('name_product')  border-danger @enderror" name="name_product" value="{{old('name_product')}}">
                    @error('name_product')  @include('fragments/errorsv')@enderror
                    <label class="form-label">Marca</label>
                    <select class="form-select" aria-label="Default select example" name="brand_id" >
                        <option value="1">Selecciona...</option>
                        @foreach ($brands as $brand => $id)
                            <option value="{{ $id }}">{{ $brand }}</option>
                        @endforeach
                        
                    </select>

                    <label class="form-label">Cantidad </label>
                    <input type="number" class="form-control @error('stock')  border-danger @enderror" name="stock" value="{{old('stock')}}">
                    
                    @error('stock')  @include('fragments/errorsv')@enderror
                    <label class="form-label">Precio Unitario </label>
                    <input type="text" class="form-control @error('unit_price')  border-danger @enderror" name="unit_price" value="{{old('unit_price')}}">
                    @error('unit_price')  @include('fragments/errorsv')@enderror

                    <label class="form-label">Imagen</label>
                    <input class="form-control @error('image')  border-danger @enderror" type="file" name="image" value="{{old('image')}}">
                    @error('image')  @include('fragments/errorsv')@enderror

                    <br>
                    <button type="submit" class="btn btn-primary">Registrar</button>



                </form>

            </div>
            <div class="col">

            </div>
        </div>
    </div>
@endsection
