<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
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
        $estoque->update($request->all());
        return $estoque;
    }

    public function destroy($id)
    {
        return Estoque::destroy($id);
    }
}
