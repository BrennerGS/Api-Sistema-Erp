<?php

namespace App\Http\Controllers;

use App\Models\OrdemProducao;
use Illuminate\Http\Request;

class OrdemProducaoController extends Controller
{
    public function index()
    {
        return OrdemProducao::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'data' => 'required|date',
            'produto' => 'required|string|max:255',
            'quantidade' => 'required|integer',
            'status' => 'required|string|max:255',
        ]);

        return OrdemProducao::create($request->all());
    }

    public function show($id)
    {
        return OrdemProducao::find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'data' => 'sometimes|required|date',
            'produto' => 'sometimes|required|string|max:255',
            'quantidade' => 'sometimes|required|integer',
            'status' => 'sometimes|required|string|max:255',
        ]);

        $ordemProducao = OrdemProducao::find($id);
        $ordemProducao->update($request->all());
        return $ordemProducao;
    }

    public function destroy($id)
    {
        return OrdemProducao::destroy($id);
    }
}
