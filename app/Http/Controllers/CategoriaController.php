<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Categoria::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        return Categoria::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Categoria::all()->find($id);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'sometimes|required|string|max:255'
        ]);

        $Categoria_up = Categoria::find($id);
        $Categoria_up->update($request->all());
        return $Categoria_up;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Categoria::destroy($id);
            return "deletado com sucesso";
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
