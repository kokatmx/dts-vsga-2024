<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LevelModel extends Model
{
    use HasFactory;

    protected $table = 'm_level';

    protected $guarded = ['level_id'];
    protected $primaryKey = "level_id";
    public function user(): HasMany
    {
        return $this->hasMany(UserModel::class);
    }
}
