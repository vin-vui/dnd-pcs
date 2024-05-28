<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

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

    public function edit(Character $character)
    {
        return Inertia::render('Characters/Edit', compact('character'));
    }

    public function update(Request $request, Character $character)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'race' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'background' => 'required|string|max:255',
            'alignment' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('image', $request->file('image'));
            $data['image'] = '/storage/' . $path;
        }

        $character->update($data);

        return redirect()->route('characters.show', $character);
    }


    public function editTrait(Character $character)
    {
        return Inertia::render('Characters/EditTraits', compact('character'));
    }
    public function storeTrait(Request $request, Character $character)
    {
        $data = $request->validate([
            'level' => 'required|integer|min:1',
            'armor_class' => 'required|integer|min:10',
            'max_hit_points' => 'required|integer|min:1',
            'speed' => 'required|integer|min:1',
            'spellcasting_ability' => 'nullable|string|max:255',
            'hit_dice' => 'required',
        ]);

        $character->update($data);

        return redirect()->route('characters.show', $character);
    }

    public function editAttribute(Character $character)
    {
        $character = $character->load('attributes');
        return Inertia::render('Characters/EditAttributes', compact('character'));
    }

    public function storeAttribute(Request $request, Character $character)
    {
        $data = $request->validate([
            'attributes' => 'required|array',
            'attributes.*.score' => 'required|integer',
            'attributes.*.bonus' => 'required|integer',
        ]);

        foreach ($data['attributes'] as $id => $attribute) {
            $characterAttribute = $character->attributes()->find($id);
            if ($characterAttribute) {
                $characterAttribute->update([
                    'score' => $attribute['score'],
                    'bonus' => $attribute['bonus'],
                ]);
            }
        }

        return redirect()->route('characters.show', $character);
    }

    public function editSkill(Character $character)
    {
        $character = $character->load('skills');
        return Inertia::render('Characters/EditSkills', compact('character'));
    }

    public function storeSkill(Request $request, Character $character)
    {
        $data = $request->validate([
            'skills' => 'required|array',
        ]);

        foreach ($data['skills'] as $id => $skill) {
            $characterSkill = $character->skills()->find($id);
            if ($characterSkill) {
                $characterSkill->update([
                    'proficiency' => $skill['proficiency'],
                    'expertise' => $skill['expertise'],
                ]);
            }
        }

        return redirect()->route('characters.show', $character);
    }

    public function updateNotes(Request $request, Character $character)
    {
        $data = $request->validate([
            'notes' => 'nullable|string',
        ]);

        $character->update($data);
    }

}
