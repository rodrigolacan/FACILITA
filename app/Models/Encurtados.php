<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encurtados extends Model
{
    use HasFactory;
    protected $table = 'ENCURTADOS';
    protected $primaryKey = 'ID';
    public $timestamps= true;
}
