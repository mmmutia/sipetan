<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preverensi extends Model
{
    use HasFactory;
    protected $table = "preverensis";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','subdistrict_id','preverensi',
    ];

    public function subdistrict()
    {
        return $this->belongsTo(Subdistrict::class, 'subdistrict_id');
    }
}
