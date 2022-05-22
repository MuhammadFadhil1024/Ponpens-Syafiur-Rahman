<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'slug'
    ];

    public function fasilitasgallery()
    {
        return $this->hasMany(FacilityGallery::class, 'facilitys_id', 'id');
    }
}
