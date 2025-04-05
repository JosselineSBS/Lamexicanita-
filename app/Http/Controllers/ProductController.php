<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Http\Requests\Products\StoreRequest;
use App\Http\Requests\Products\UpdateRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // $products= Product::get();
        $products= Product::paginate(5);
        return view('admin/products/index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::pluck('id','brand'); //solo datos especificos
        //dd($brands);
        return view('admin/products/create',compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //echo "Los datos pasan";
        //dd($request->all());

        // Esto es una validación directa, alenta
        // $request->validate([
        //     'name_product' => 'required|min:5|max:50',
        //     'brand_id' => 'required|integer',
        //     'stock'=> 'required|integer',
        //     'unit_price' => 'required|decimal:2,4',
        //     'image' => 'required',
        // ]);

        // Guardar imagen antes de generar el registro en la base de datos
        $data = $request->all();  // Guardamos todos los datos en una variable para manipularlos
        // Condición
        if (isset($data['image'])) {
            // Cambiar el nombre del archivo que se guardará
            $data['image'] = $filename = time().".".$data["image"]->extension();
            // <nombre_original> -> 08032025.jpg
            $request->image->move(public_path("imgs/products"), $filename);
        }

        Product::create($data);  // Agregar los datos modificados
        return to_route('products.index')-> with('success','Producto Registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view ('admin/products/show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {

        $brands = Brand::Pluck('id','brand');
        return view ('admin/products/edit', compact('product','brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Product $product)
    {

        // Esto es una validación directa, alenta
        // $request->validate([
        //     'name_product' => 'required|min:5|max:50',
        //     'brand_id' => 'required|integer',
        //     'stock'=> 'required|integer',
        //     'unit_price' => 'required|decimal:2,4',
        //     'image' => 'required',
        // ]);

 // Guardar imagen antes de generar el registro en la base de datos
        $data = $request->all();  // Guardamos todos los datos en una variable para manipularlos
        // Condición
        if (isset($data['image'])) {
            // Cambiar el nombre del archivo que se guardará
            $data['image'] = $filename = time().".".$data["image"]->extension();
            // <nombre_original> -> 08032025.jpg
            $request->image->move(public_path("imgs/products"), $filename);
        }
        $product->update($data);//Actualizar la base de datos a través del modelo 
        return to_route('products.index')-> with('success','Producto Actualizado');
    }

    public function delete(Product $product){
        return view ('admin/products/delete', compact ('product'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('products.index')-> with('delete','Producto Eliminado');
    }
}
