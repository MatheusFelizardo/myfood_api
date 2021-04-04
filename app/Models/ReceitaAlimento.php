<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceitaAlimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'receita_id',
        'alimento_id'
    ];
}
