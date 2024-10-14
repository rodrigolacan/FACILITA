<?php

namespace App\Models\Helpdesk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acao extends Model
{
    use HasFactory;
    protected $connection = 'corporeRMBI';
    protected $table = 'vRMProjetosAcoes';
    protected $primaryKey = 'IDACAO';
    public $timestamps= false;
}
