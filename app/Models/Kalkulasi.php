<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kalkulasi extends Model
{
    use HasFactory;
    protected $table = "kalkulasis";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','kalkulasis','altitude','rainfall','solar_radiation','ph_soil','temperature','humidity',
    ];
}
