<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id"
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function property_basic(){
        return $this->hasOne(PropertyBasic::class);
    }

    public function property_amenity(){
        return $this->hasOne(PropertyAmenity::class);
    }

    public function property_local_facility(){
        return $this->hasOne(PropertyLocalFacility::class);
    }

    public function property_image(){
        return $this->hasOne(PropertyImage::class);
    }
}
