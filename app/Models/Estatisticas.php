<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estatisticas extends Model
{
    use HasFactory;
    protected $table = 'estatisticas';
    protected $primaryKey = 'ID';
    public $timestamps= false;
    protected $fillable = [
        'id_encurtados',
        'acessos',
    ];

    // Relacionamento com o modelo Encurtados
    public function encurtados()
    {
        return $this->belongsTo(Encurtados::class, 'id_encurtados', 'id');
    }
}
