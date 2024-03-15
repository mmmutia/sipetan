<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreverensiKal extends Model
{
    use HasFactory;
    protected $table = "preverensi_kals";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','kalkulasis_id','preverensi',
    ];

    public function kalkulasi()
    {
        return $this->belongsTo(Kalkulasi::class, 'kalkulasis_id');
    }
}
