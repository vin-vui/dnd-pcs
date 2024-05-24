<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Character>
 */
class CharacterFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'image' => $this->faker->imageUrl(400, 400, 'fantasy', true, 'character'),
            'race' => $this->faker->randomElement(['Human', 'Elf', 'Dwarf', 'Halfling', 'Dragonborn', 'Gnome', 'Half-Elf', 'Half-Orc', 'Tiefling']),
            'class' => $this->faker->randomElement(['Barbarian', 'Bard', 'Cleric', 'Druid', 'Fighter', 'Monk', 'Paladin', 'Ranger', 'Rogue', 'Sorcerer', 'Warlock', 'Wizard']),
            'background' => $this->faker->sentence,
            'alignment' => $this->faker->randomElement(['Lawful Good', 'Neutral Good', 'Chaotic Good', 'Lawful Neutral', 'Neutral', 'Chaotic Neutral', 'Lawful Evil', 'Neutral Evil', 'Chaotic Evil']),
            'level' => $this->faker->numberBetween(1, 20),
            'armor_class' => $this->faker->numberBetween(10, 20),
            'max_hit_points' => $this->faker->numberBetween(10, 200),
            'speed' => $this->faker->numberBetween(25, 40),
            'spellcasting_ability' => $this->faker->randomElement(['Intelligence', 'Wisdom', 'Charisma', null]),
            'hit_dice' => $this->faker->randomElement([6, 8, 10, 12]),
            'user_id' => 1,
        ];
    }
}
