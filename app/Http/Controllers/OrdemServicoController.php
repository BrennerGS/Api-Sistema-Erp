<?php

namespace App\Http\Controllers;

use App\Models\OrdemServico;
use Illuminate\Http\Request;

class OrdemServicoController extends Controller
{
    public function index()
    {
        return OrdemServico::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'data' => 'required|date',
            'cliente' => 'required|string|max:255',
            'serviço' => 'required|string|max:255',
            'valor' => 'required|numeric',
        ]);

        return OrdemServico::create($request->all());
    }

    public function show($id)
    {
        return OrdemServico::find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'data' => 'sometimes|required|date',
            'cliente' => 'sometimes|required|string|max:255',
            'serviço' => 'sometimes|required|string|max:255',
            'valor' => 'sometimes|required|numeric',
        ]);

        $ordemServico = OrdemServico::find($id);
        $ordemServico->update($request->all());
        return $ordemServico;
    }

    public function destroy($id)
    {
        return OrdemServico::destroy($id);
    }
}
