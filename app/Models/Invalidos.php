<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invalidos extends Model
{
    use HasFactory;
    protected $table = 'Invalidos';
    protected $primaryKey = 'ID';
    public $timestamps= false;
}
