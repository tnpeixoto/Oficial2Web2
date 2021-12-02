<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class Ativo extends Model
{
    protected $table = 'ativos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'ticker',
        'dtinicio',
        'alocacao',
        'dy',
        'precoentrada',
        'precoatual',
        'precoteto',
    ];

    public $timestamps = true;
}
