<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use Illuminate\Http\Request;

class ContaController extends Controller
{
    public function index()
    {
        return Conta::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'data' => 'required|date',
            'tipo' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'descricao' => 'required|string',
        ]);

        return Conta::create($request->all());
    }

    public function show($id)
    {
        return Conta::find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'data' => 'sometimes|required|date',
            'tipo' => 'sometimes|required|string|max:255',
            'valor' => 'sometimes|required|numeric',
            'descricao' => 'sometimes|required|string',
        ]);

        $conta = Conta::find($id);
        $conta->update($request->all());
        return $conta;
    }

    public function destroy($id)
    {
        return Conta::destroy($id);
    }
}
