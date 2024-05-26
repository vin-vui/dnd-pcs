<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'race', 'class', 'background', 'alignment', 'level', 'experience_points', 'armor_class', 'speed', 'max_hit_points','image', 'hit_dice', 'spellcasting_ability', 'user_id'
    ];

    protected static function booted()
    {
        static::created(function ($character)
        {
            $defaultAttributes = [
                ['name' => 'strength', 'score' => 8, 'bonus' => 0],
                ['name' => 'dexterity', 'score' => 8, 'bonus' => 0],
                ['name' => 'constitution', 'score' => 8, 'bonus' => 0],
                ['name' => 'intelligence', 'score' => 8, 'bonus' => 0],
                ['name' => 'wisdom', 'score' => 8, 'bonus' => 0],
                ['name' => 'charisma', 'score' => 8, 'bonus' => 0],
            ];

            foreach ($defaultAttributes as $attribute) {
                $character->attributes()->create($attribute);
            }

            $defaultSkills = [
                ['name' => 'acrobatics', 'base_attribute' => 'dexterity', 'proficiency' => false, 'expertise' => false],
                ['name' => 'animal handling', 'base_attribute' => 'wisdom', 'proficiency' => false, 'expertise' => false],
                ['name' => 'arcana', 'base_attribute' => 'intelligence', 'proficiency' => false, 'expertise' => false],
                ['name' => 'athletics', 'base_attribute' => 'strength', 'proficiency' => false, 'expertise' => false],
                ['name' => 'deception', 'base_attribute' => 'charisma', 'proficiency' => false, 'expertise' => false],
                ['name' => 'history', 'base_attribute' => 'intelligence', 'proficiency' => false, 'expertise' => false],
                ['name' => 'insight', 'base_attribute' => 'wisdom', 'proficiency' => false, 'expertise' => false],
                ['name' => 'intimidation', 'base_attribute' => 'charisma', 'proficiency' => false, 'expertise' => false],
                ['name' => 'investigation', 'base_attribute' => 'intelligence', 'proficiency' => false, 'expertise' => false],
                ['name' => 'medicine', 'base_attribute' => 'wisdom', 'proficiency' => false, 'expertise' => false],
                ['name' => 'nature', 'base_attribute' => 'intelligence', 'proficiency' => false, 'expertise' => false],
                ['name' => 'perception', 'base_attribute' => 'wisdom', 'proficiency' => false, 'expertise' => false],
                ['name' => 'performance', 'base_attribute' => 'charisma', 'proficiency' => false, 'expertise' => false],
                ['name' => 'persuasion', 'base_attribute' => 'charisma', 'proficiency' => false, 'expertise' => false],
                ['name' => 'religion', 'base_attribute' => 'intelligence', 'proficiency' => false, 'expertise' => false],
                ['name' => 'sleight of hand', 'base_attribute' => 'dexterity', 'proficiency' => false, 'expertise' => false],
                ['name' => 'stealth', 'base_attribute' => 'dexterity', 'proficiency' => false, 'expertise' => false],
                ['name' => 'survival', 'base_attribute' => 'wisdom', 'proficiency' => false, 'expertise' => false],
            ];

            foreach ($defaultSkills as $skill) {
                $character->skills()->create($skill);
            }
        });
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
}
