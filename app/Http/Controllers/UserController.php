<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;

use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{

    public function __construct() { $this->middleware('auth:api'); }

    public function show(string $id)
    {
        return json_encode(['user' => User::findOrFail($id)]);
    }

    public function profile(Request $request)
    {
        User::where('id', $request->input(key: 'id'))->update([
            'name' => $request->input(key: 'name'),
            'email' => $request->input(key: 'email'),
            'email_verified_at' => TRUE
        ]);

        return response()->json([
            'message' => 'User atualizado com sucesso!',
        ]);
    }
}
