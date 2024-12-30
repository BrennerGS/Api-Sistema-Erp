<?php

namespace App\Http\Controllers;

use App\Models\Kit;
use App\Models\Estoque;
use Illuminate\Http\Request;

class KitController extends Controller
{
    public function index()
    {
        return Kit::with('produtos')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'produtos' => 'required|array',
            'produtos.*.id' => 'exists:produtos,id',
            'produtos.*.quantidade' => 'required|integer|min:1',
        ]);

        // Cria o kit
        $kit = Kit::create($request->only(['nome', 'descricao']));

        // Verifica e atualiza o estoque
        if ($request->has('produtos')) {
            $produtos = [];
            foreach ($request->produtos as $produto) {
                $estoque = Estoque::where('produto_id', $produto['id'])->first();
                if ($estoque && $estoque->quantidade >= $produto['quantidade']) {
                    // Atualiza o estoque
                    $estoque->quantidade -= $produto['quantidade'];
                    $estoque->save();

                    // Adiciona o produto ao kit
                    $produtos[$produto['id']] = ['quantidade' => $produto['quantidade']];
                } else {
                    return response()->json([
                        'message' => 'Quantidade insuficiente no estoque para o produto ID: ' . $produto['id']
                    ], 400);
                }
            }
            $kit->produtos()->sync($produtos);
        }

        return $kit->load('produtos');
    }




    public function show($id)
    {
        return Kit::with('produtos')->find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'descricao' => 'sometimes|required|string',
        ]);

        $kit = Kit::find($id);
        $kit->update($request->all());

        if ($request->has('produtos')) {
            $kit->produtos()->sync($request->produtos);
        }

        return $kit;
    }

    public function destroy($id)
    {
        return Kit::destroy($id);
    }
}
