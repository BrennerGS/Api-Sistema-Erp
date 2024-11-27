<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        return Fornecedor::with('produtos')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'contato' => 'required|string|max:255',
            'endereco' => 'required|string',
        ]);

        return Fornecedor::create($request->all());
    }

    public function show($id)
    {
        return Fornecedor::with('produtos')->find($id);
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
        return Fornecedor::destroy($id);
    }
}
