<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdemProducao extends Model
{
    use HasFactory;

    protected $table = 'ordem_producao';

    protected $fillable = [
        'data',
        'produto',
        'quantidade',
        'status',
    ];
}
