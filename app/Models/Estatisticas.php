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
}
