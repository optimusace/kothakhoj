<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyAmenity extends Model
{
    use HasFactory;

    protected $fillable = [
        "numberOfRoom",
        "floor",
        "roadType",
        "furniture",
        "water",
        "bathroom",
        "kitchen",
        "internet",
        "laundry",
        "parking",
        "pet",
        "property_id"
    ];
    public function property(){
        return $this->belongsTo(Property::class);
    }
}
