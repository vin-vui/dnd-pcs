<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'character_id', 'name', 'proficiency', 'expertise', 'base_attribute'
    ];

    public function character()
    {
        return $this->belongsTo(Character::class);
    }
}
