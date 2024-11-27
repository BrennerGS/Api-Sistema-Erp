<?php

namespace App\Http\Controllers;

use App\Models\Promocao;
use Illuminate\Http\Request;

class PromocaoController extends Controller
{
    public function index()
    {
        return Promocao::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'data_inicial' => 'required|date',
            'data_final' => 'required|date',
            'produto' => 'required|string|max:255',
            'porcentagem_desconto' => 'required|numeric',
        ]);

        return Promocao::create($request->all());
    }

    public function show($id)
    {
        return Promocao::find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'data_inicial' => 'sometimes|required|date',
            'data_final' => 'sometimes|required|date',
            'produto' => 'sometimes|required|string|max:255',
            'porcentagem_desconto' => 'sometimes|required|numeric',
        ]);

        $promocao = Promocao::find($id);
        $promocao->update($request->all());
        return $promocao;
    }

    public function destroy($id)
    {
        return Promocao::destroy($id);
    }
}
