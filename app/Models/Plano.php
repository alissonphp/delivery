<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    protected $fillable = ['plano','descricao','prioridade','valor','periodicidade'];
}
