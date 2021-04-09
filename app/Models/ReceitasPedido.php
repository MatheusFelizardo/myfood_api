<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceitasPedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'pedido_id',
        'receita_id'
    ];
}
