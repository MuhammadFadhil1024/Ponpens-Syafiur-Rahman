<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisionGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'divisions_id', 'url'
    ];
}
