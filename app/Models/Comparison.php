<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comparison extends Model
{
    use HasFactory;
    protected $table = "comparisons";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','subdistrict_id','kalkulasis_id',
    ];

    public function subdistrict()
    {
        return $this->belongsTo(Subdistrict::class, 'subdistrict_id');
    }

    public function kalkulasi()
    {
        return $this->belongsTo(Kalkulasi::class, 'kalkulasis_id');
    }
}
