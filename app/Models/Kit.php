<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kit extends Model
{
    use HasFactory;

    protected $table = 'kits';

    protected $fillable = [
        'nome',
        'descricao',
    ];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'kit_produto') ->withPivot('quantidade');
    }
}
