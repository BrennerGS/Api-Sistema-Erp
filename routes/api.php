<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CaixaController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\KitController;
use App\Http\Controllers\NotaFiscalController;
use App\Http\Controllers\OrdemProducaoController;
use App\Http\Controllers\OrdemServicoController;
use App\Http\Controllers\PromocaoController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group([
    'middleware' => ['auth:api'],
    'prefix' => 'auth'

], function ($router) {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});


Route::group([
    'middleware' => ['auth:api'],
], function ($router) {
    Route::patch('/user/update', [UserController::class, 'profile']);
    Route::get('/user/{id}', [UserController::class, 'show']);

});

//Produto
Route::group([
    'middleware' => ['auth:api'],
], function ($router) {
    Route::get('produtos', [ProdutoController::class, 'index']);
    Route::post('produtos', [ProdutoController::class, 'store']);
    Route::get('produtos/{id}', [ProdutoController::class, 'show']);
    Route::put('produtos/{id}', [ProdutoController::class, 'update']);
    Route::delete('produtos/{id}', [ProdutoController::class, 'destroy']);

});


//Estoque
Route::group([
    'middleware' => ['auth:api'],
], function ($router) {
    Route::get('estoque', [EstoqueController::class, 'index']);
    Route::post('estoque', [EstoqueController::class, 'store']);
    Route::get('estoque/{id}', [EstoqueController::class, 'show']);
    Route::put('estoque/{id}', [EstoqueController::class, 'update']);
    Route::delete('estoque/{id}', [EstoqueController::class, 'destroy']);

});


//Caixa
Route::group([
    'middleware' => ['auth:api'],
], function ($router) {
    Route::get('caixa', [CaixaController::class, 'index']);
    Route::post('caixa', [CaixaController::class, 'store']);
    Route::get('caixa/{id}', [CaixaController::class, 'show']);
    Route::put('caixa/{id}', [CaixaController::class, 'update']);
    Route::delete('caixa/{id}', [CaixaController::class, 'destroy']);

});


//Fornecedor
Route::group([
    'middleware' => ['auth:api'],
], function ($router) {
    Route::get('fornecedores', [FornecedorController::class, 'index']);
    Route::post('fornecedores', [FornecedorController::class, 'store']);
    Route::get('fornecedores/{id}', [FornecedorController::class, 'show']);
    Route::put('fornecedores/{id}', [FornecedorController::class, 'update']);
    Route::delete('fornecedores/{id}', [FornecedorController::class, 'destroy']);

});


//OrdemServico
Route::group([
    'middleware' => ['auth:api'],
], function ($router) {
    Route::get('ordem_servicos', [OrdemServicoController::class, 'index']);
    Route::post('ordem_servicos', [OrdemServicoController::class, 'store']);
    Route::get('ordem_servicos/{id}', [OrdemServicoController::class, 'show']);
    Route::put('ordem_servicos/{id}', [OrdemServicoController::class, 'update']);
    Route::delete('ordem_servicos/{id}', [OrdemServicoController::class, 'destroy']);


});

//OrdemProducao
Route::group([
    'middleware' => ['auth:api'],
], function ($router) {
    Route::get('ordem_producao', [OrdemProducaoController::class, 'index']);
    Route::post('ordem_producao', [OrdemProducaoController::class, 'store']);
    Route::get('ordem_producao/{id}', [OrdemProducaoController::class, 'show']);
    Route::put('ordem_producao/{id}', [OrdemProducaoController::class, 'update']);
    Route::delete('ordem_producao/{id}', [OrdemProducaoController::class, 'destroy']);


});

//Kit
Route::group([
    'middleware' => ['auth:api'],
], function ($router) {
    Route::get('kits', [KitController::class, 'index']);
    Route::post('kits', [KitController::class, 'store']);
    Route::get('kits/{id}', [KitController::class, 'show']);
    Route::put('kits/{id}', [KitController::class, 'update']);
    Route::delete('kits/{id}', [KitController::class, 'destroy']);


});

//contas
Route::group([
    'middleware' => ['auth:api'],
], function ($router) {
    Route::get('contas', [ContaController::class, 'index']);
    Route::post('contas', [ContaController::class, 'store']);
    Route::get('contas/{id}', [ContaController::class, 'show']);
    Route::put('contas/{id}', [ContaController::class, 'update']);
    Route::delete('contas/{id}', [ContaController::class, 'destroy']);

});

//NotaFiscal
Route::group([
    'middleware' => ['auth:api'],
], function ($router) {
    Route::get('notas_fiscais', [NotaFiscalController::class, 'index']);
    Route::post('notas_fiscais', [NotaFiscalController::class, 'store']);
    Route::get('notas_fiscais/{id}', [NotaFiscalController::class, 'show']);
    Route::put('notas_fiscais/{id}', [NotaFiscalController::class, 'update']);
    Route::delete('notas_fiscais/{id}', [NotaFiscalController::class, 'destroy']);

});

//Promocao
Route::group([
    'middleware' => ['auth:api'],
], function ($router) {
    Route::get('promocoes', [PromocaoController::class, 'index']);
    Route::post('promocoes', [PromocaoController::class, 'store']);
    Route::get('promocoes/{id}', [PromocaoController::class, 'show']);
    Route::put('promocoes/{id}', [PromocaoController::class, 'update']);
    Route::delete('promocoes/{id}', [PromocaoController::class, 'destroy']);

});

