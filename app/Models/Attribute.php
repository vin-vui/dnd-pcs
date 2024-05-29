<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'character_id', 'name', 'proficiency', 'score', 'bonus'
    ];

    public function character()
    {
        return $this->belongsTo(Character::class);
    }
}
