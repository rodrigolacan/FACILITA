<?php

namespace App\Models\Helpdesk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoAcao extends Model
{
    use HasFactory;
    protected $connection = 'corporeRMBI';
    protected $table = 'vRMProjetos';
    protected $primaryKey = 'CODPROJ';
    public $timestamps= false;
}
