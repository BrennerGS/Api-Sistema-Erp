<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use App\Models\Produto;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    public function index()
    {
        return Estoque::with('produto')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer',
            'data_entrada' => 'required|date',
            'data_saida' => 'nullable|date',
        ]);

        $produto = Produto::find($request->produto_id);
        $produto->update(['estoque' => $produto->estoque + $request->quantidade]);

        return Estoque::create($request->all());
    }

    public function show($id)
    {
        return Estoque::with('produto')->find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'produto_id' => 'sometimes|required|exists:produtos,id',
            'quantidade' => 'sometimes|required|integer',
            'data_entrada' => 'sometimes|required|date',
            'data_saida' => 'nullable|date',
        ]);
        
        $estoque = Estoque::find($id);
        $diferenca = $request->quantidade - $estoque->quantidade;
        $estoque->update($request->all());
        $produto = Produto::find($estoque->produto_id);
        $produto->update(['estoque' => $produto->estoque + $diferenca]);

        return response()->json(['message' => 'Estoque atualizado com sucesso!']);
    }

    public function destroy($id)
    {
        // Encontra a entrada de estoque pelo ID
        $estoque = Estoque::find($id);

        // Encontra o produto relacionado
        $produto = Produto::find($estoque->produto_id);

        // Subtrai a quantidade do estoque geral do produto
        $produto->update(['estoque' => $produto->estoque - $estoque->quantidade]);

        // Remove a entrada de estoque
        $estoque->delete();

        return response()->json(['message' => 'Estoque removido com sucesso!']);
    }

}
