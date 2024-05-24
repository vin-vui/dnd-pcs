<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CharacterController extends Controller
{
    public function index(): \Inertia\Response
    {
        $characters = Character::where('user_id', auth()->id())->get();

        return Inertia::render('Characters/Index', compact('characters'));
    }

    public function show(Character $character)
    {
        $character = $character->load('skills', 'attributes');
        return Inertia::render('Characters/Show', compact('character'));
    }

    public function create()
    {
        return Inertia::render('Characters/Create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'race' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'background' => 'required|string|max:255',
            'alignment' => 'required|string|max:255',
            'level' => 'required|integer|min:1',
            'armor_class' => 'required|integer|min:10',
            'max_hit_points' => 'required|integer|min:1',
            'speed' => 'required|integer|min:1',
            'spellcasting_ability' => 'nullable|string|max:255',
            'hit_dice' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('image', $request->file('image'));
        }

        $character = Character::create(
            array_merge($data, [
                'image' => '/storage/' . $path,
                'user_id' => auth()->id()
            ])
        );

        return redirect()->route('characters.show', $character);
    }

    public function update(Request $request, Character $character)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'race' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'background' => 'required|string|max:255',
            'alignment' => 'required|string|max:255',
            'level' => 'required|integer|min:1',
            'armor_class' => 'required|integer|min:10',
            'max_hit_points' => 'required|integer|min:1',
            'speed' => 'required|integer|min:1',
            'spellcasting_ability' => 'nullable|string|max:255',
            'hit_dice' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($character->image) {
                Storage::disk('public')->delete($character->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $character->update($data);

        return redirect()->route('characters.show', $character);
    }
}
