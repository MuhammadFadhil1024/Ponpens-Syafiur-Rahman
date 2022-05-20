<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisionTeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'divisions_id', 'position'
    ];
}
