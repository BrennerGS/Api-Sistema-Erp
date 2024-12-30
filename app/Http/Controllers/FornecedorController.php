<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        return Fornecedor::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'contato' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
        ]);

        return Fornecedor::create($request->all());
    }

    public function show($id)
    {
        return Fornecedor::all()->find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'contato' => 'sometimes|required|string|max:255',
            'endereco' => 'sometimes|required|string',
        ]);

        $fornecedor = Fornecedor::find($id);
        $fornecedor->update($request->all());
        return $fornecedor;
    }

    public function destroy($id)
    {
        
        try {
            Fornecedor::destroy($id);
            return "deletado com sucesso";
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
