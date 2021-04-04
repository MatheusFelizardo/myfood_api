<?php

namespace App\Models;
use App\Models\Alimento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'valor'
    ];

}
