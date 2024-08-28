<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->hasMany(User::class);
    }
    protected $primaryKey = 'level_id';
    protected $fillable = [
        'level_nama',
    ];
}
