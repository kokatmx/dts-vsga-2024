<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categori extends Model
{
    use HasFactory;
    protected $table = 'categoris';
    protected $primaryKey = 'categori_id';
    protected $fillable = [
        'categori_code',
        'categori_nama',
    ];
}