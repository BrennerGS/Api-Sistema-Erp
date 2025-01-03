<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaFiscal extends Model
{
    use HasFactory;

    protected $table = 'notas_fiscais';

    protected $fillable = [
        'data',
        'tipo',
        'valor',
    ];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'nota_produto');
    }
}
