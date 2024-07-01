<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jogo;

class Jogos extends Model
{
    use HasFactory;

    protected $table = 'jogos';
    protected $fillable = [
        'nome',
        'descricao',
        'requisitos',
        'imagens',
        'avaliacao',
        'data_lancamento',
        'distribuidoras_id',
        'genero_id',
    ];

    public function distribuidora()
    {
        return $this->belongsTo(Distribuidora::class);
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }
}
