<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        return Produto::with('fornecedor', 'kits', 'notasFiscais')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric',
            'categoria_id' => 'sometimes|required|exists:categoria,id',
            'fornecedor_id' => 'required|exists:fornecedores,id',
        ]);

        return Produto::create($request->all());
    }

    public function show($id)
    {
        return Produto::with('fornecedor', 'estoque', 'kits', 'notasFiscais')->find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'descricao' => 'sometimes|required|string',
            'preco' => 'sometimes|required|numeric',
            'categoria_id' => 'sometimes|required|exists:categoria,id',
            'fornecedor_id' => 'sometimes|required|exists:fornecedores,id',
        ]);

        $produto = Produto::find($id);
        $produto->update($request->all());
        return $produto;
    }

    public function destroy($id)
    {
        try {
            Produto::destroy($id);
            return "deletado com sucesso";
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
}
