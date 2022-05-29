<?php

namespace App\Models;

use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'tempat_lahir', 'tanggal_lahir', 'address', 'phone', 'status', 'asal_pt', 'prodi',
        'jenjang', 'angkatan', 'nama_wali', 'phone_wali'
    ];

    public function document()
    {
        return $this->hasMany(Document::class, 'registrations_id', 'id');
    }
}
