<?php

namespace App\Http\Controllers;

use App\Models\NotaFiscal;
use Illuminate\Http\Request;

class NotaFiscalController extends Controller
{
    public function index()
    {
        return NotaFiscal::with('produtos')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'data' => 'required|date',
            'tipo' => 'required|string|max:255',
            'valor' => 'required|numeric',
        ]);

        $notaFiscal = NotaFiscal::create($request->all());

        if ($request->has('produtos')) {
            $notaFiscal->produtos()->sync($request->produtos);
        }

        return $notaFiscal;
    }

    public function show($id)
    {
        return NotaFiscal::with('produtos')->find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'data' => 'sometimes|required|date',
            'tipo' => 'sometimes|required|string|max:255',
            'valor' => 'sometimes|required|numeric',
        ]);

        $notaFiscal = NotaFiscal::find($id);
        $notaFiscal->update($request->all());

        if ($request->has('produtos')) {
            $notaFiscal->produtos()->sync($request->produtos);
        }

        return $notaFiscal;
    }

    public function destroy($id)
    {
        return NotaFiscal::destroy($id);
    }
}
