<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'estoque',
        'categoria_id',
        'fornecedor_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }

    public function estoque()
    {
        return $this->hasMany(Estoque::class);
    }

    public function kits()
    {
        return $this->belongsToMany(Kit::class, 'kit_produto');
    }

    public function notasFiscais()
    {
        return $this->belongsToMany(NotaFiscal::class, 'nota_produto');
    }
}
