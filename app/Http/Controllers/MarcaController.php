<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index(){
        $brands = Marca::query()->get();
        return view('pages.brands.list')->with('marcas', $brands);
    }

    public function create (){
        return view('pages.brands.create');
    }

    public function save( Request $request ){
        $request->validate([
            'nombre'  => 'required',
            'clave'   => 'required|unique:marcas,clave',
        ]); 

        Marca::create([
            'nombre'  => $request->nombre,
            'clave'   => $request->clave,
        ]);

        return redirect()->route('marca.index');
    }

    public function edit ( $id ){
        $marca = Marca::find($id); 
        return view('pages.brands.edit')->with('marca', $marca);
    }

    public function update (Request $request, $id ){
        $request->validate([
            'nombre'  => 'required',
            'clave'   => 'required|unique:marcas,clave,'.$id,
        ]); 

        Marca::find($id)->update([
            'nombre'  => $request->nombre,
            'clave'   => $request->clave,
        ]);

        return redirect()->route('marca.index');
    }

    public function remove($id)
    {
        Marca::find($id)->delete();
        return redirect()->route('marca.index');
    }
}
