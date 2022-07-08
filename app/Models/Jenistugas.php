<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenistugas extends Model
{
    use HasFactory;
    protected $table = 'jenistugas';
    protected $fillable = ['tipetugas'];
}
