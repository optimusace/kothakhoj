<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyBasic extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "category",
        "price",
        "contact",
        "negotiation",
        "ward",
        "municipality",
        "district",
        "property_id"
    ];

    public function property(){
        return $this->belongsTo(Property::class);
    }
}

