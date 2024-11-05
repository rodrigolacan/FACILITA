<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estatisticas extends Model
{
    use HasFactory;
    protected $table = 'ESTATISTICAS';
    protected $primaryKey = 'ID';
    public $timestamps= false;
    // Campos que podem ser preenchidos em massa (mass assignment)
    protected $fillable = [
        'id_encurtados', // Chave estrangeira para a tabela relacionada
        'acessos',       // O campo que será incrementado
    ];

    // Relacionamento com o modelo Encurtados
    public function encurtados()
    {
        return $this->belongsTo(Encurtados::class, 'id_encurtados', 'id');
    }
}
