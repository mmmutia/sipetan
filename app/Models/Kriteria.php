<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = "kriterias";
    protected $primaryKey = "id";
    protected $fillable = [
        'name','bobot','description',
    ];
}
