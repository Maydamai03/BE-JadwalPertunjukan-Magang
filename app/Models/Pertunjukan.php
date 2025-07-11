<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertunjukan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'gambar', 'deskripsi', 'jadwal', 'lokasi', 'created_by'
    ];
}
