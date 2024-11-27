<?php

namespace App\Http\Controllers;

use App\Models\Kit;
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
        ]);

        $kit = Kit::create($request->all());

        if ($request->has('produtos')) {
            $kit->produtos()->sync($request->produtos);
        }

        return $kit;
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
