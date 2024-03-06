<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subdistrict extends Model
{
    use HasFactory;
    protected $table = "subdistricts";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','subdistrict','altitude','rainfall','solar_radiation','ph_soil','temperature','humidity',
    ];


}
