<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encurtados extends Model
{
    use HasFactory;
    protected $table = 'encurtados';
    protected $primaryKey = 'id';
    public $timestamps= false;

    // Relacionamento com a tabela 'estatisticas'
    public function estatisticas()
    {
        return $this->hasMany(Estatisticas::class, 'id_encurtados', 'id'); 
    }

}
