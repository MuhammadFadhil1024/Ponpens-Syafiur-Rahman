<?php

namespace App\Models;

use App\Models\DivisionGallery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Division extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'slug'
    ];


    public function divisiongallery()
    {
        return $this->hasMany(DivisionGallery::class, 'divisions_id', 'id');
    }
}
