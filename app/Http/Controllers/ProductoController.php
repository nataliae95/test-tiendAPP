<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Producto;
use App\Models\Talla;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $products = Producto::query()->get();
        return view('pages.products.list')->with('Productos', $products);
    }

    public function create()
    {
        $marcas = Marca::query()->get();
        $tallas = Talla::query()->get();
        return view('pages.products.create')->with('marcas', $marcas)
            ->with('tallas', $tallas);
    }

    public function save(Request $request)
    {

        $request->validate([
            'nombre'            => 'required',
            'talla_id'          => 'required',
            'marca_id'          => 'required',
            'cantidad'          => 'required|integer|min:1',
            'fecha_embarque'    => 'required',
        ]);

        Producto::create([
            'nombre'            => $request->nombre,
            'id_talla'          => $request->talla_id,
            'id_marca'          => $request->marca_id,
            'cantidad'          => $request->cantidad,
            'fecha_embarque'    => $request->fecha_embarque,
            'observacion'       => $request->observacion,
        ]);

        return redirect()->route('producto.index');
    }

    public function edit ( $id ){
        $producto = Producto::find($id); 
        $marcas = Marca::query()->get();
        $tallas = Talla::query()->get();

        return view('pages.products.edit')->with('producto', $producto)->with('marcas', $marcas)->with('tallas', $tallas);
    }

    public function update (Request $request, $id ){
        $request->validate([
            'nombre'            => 'required',
            'talla_id'          => 'required',
            'marca_id'          => 'required',
            'cantidad'          => 'required|integer|min:1',
            'fecha_embarque'    => 'required',
        ]);
        
        $request->validate([
            'nombre'            => 'required',
            'talla_id'          => 'required',
            'marca_id'          => 'required',
            'cantidad'          => 'required|integer|min:1',
            'fecha_embarque'    => 'required',
        ]);

        Producto::find($id)->update([
            'nombre'            => $request->nombre,
            'id_talla'          => $request->talla_id,
            'id_marca'          => $request->marca_id,
            'cantidad'          => $request->cantidad,
            'fecha_embarque'    => $request->fecha_embarque,
            'observacion'       => $request->observacion,
        ]);

        return redirect()->route('producto.index');
    }

    public function remove($id)
    {
        Producto::find($id)->delete();
        return redirect()->route('producto.index');
    }
}
