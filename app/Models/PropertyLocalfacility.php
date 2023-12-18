<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyLocalFacility extends Model
{
    use HasFactory;
    protected $table = "property_localfacilities";
    protected $fillable = [
        "gym",
        "swimming",
        "hospital",
        "montessori",
        "gas",
        "temple",
        "resturants",
        "bank",
        "bus",
        "school",
        "park",
        "college",
        "market",
        "banquet",
        "property_id"
    ];
    public function property(){
        return $this->belongsTo(Property::class);
    }
}

