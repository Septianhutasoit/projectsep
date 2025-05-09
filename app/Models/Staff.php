<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff'; // karena nama tabel tidak jamak otomatis
    protected $fillable = ['name', 'position', 'photo'];
}
