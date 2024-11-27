<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caixa extends Model
{
    use HasFactory;

    protected $table = 'caixa';

    protected $fillable = [
        'data',
        'valor_entrada',
        'valor_saida',
        'saldo',
    ];
}

