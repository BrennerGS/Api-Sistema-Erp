<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;

    protected $table = 'estoque';

    protected $fillable = [
        'produto_id',
        'quantidade',
        'data_entrada',
        'data_saida',
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
