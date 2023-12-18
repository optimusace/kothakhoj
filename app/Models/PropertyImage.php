<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    use HasFactory;
    protected $fillable = [
        "image1_path",
        "image2_path",
        "image3_path",
        "image4_path",
        "image5_path",
        "property_id"
    ];

    public function property(){
        return $this->belongsTo(Property::class);
    }
}

