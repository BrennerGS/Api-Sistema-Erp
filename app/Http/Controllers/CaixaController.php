<?php

namespace App\Http\Controllers;

use App\Models\Caixa;
use Illuminate\Http\Request;

class CaixaController extends Controller
{
    public function index()
    {
        return Caixa::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'data' => 'required|date',
            'valor_entrada' => 'required|numeric',
            'valor_saida' => 'required|numeric',
            'saldo' => 'required|numeric',
        ]);

        return Caixa::create($request->all());
    }

    public function show($id)
    {
        return Caixa::find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'data' => 'sometimes|required|date',
            'valor_entrada' => 'sometimes|required|numeric',
            'valor_saida' => 'sometimes|required|numeric',
            'saldo' => 'sometimes|required|numeric',
        ]);

        $caixa = Caixa::find($id);
        $caixa->update($request->all());
        return $caixa;
    }

    public function destroy($id)
    {
        return Caixa::destroy($id);
    }
}
