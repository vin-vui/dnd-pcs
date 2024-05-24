<template>
    <div class="flex gap-8">
        <div>
            <h1 class="text-2xl font-bold mb-4">{{ character.name }}</h1>
            <div v-if="character.image">
                <img :src="character.image" alt="Character Image" class="mt-4 w-32 h-32">
            </div>
            <p><strong>Race:</strong>{{ character.race }}</p>
            <p><strong>Class:</strong>{{ character.class }}</p>
            <p><strong>Background:</strong>{{ character.background }}</p>
            <p><strong>Alignment:</strong>{{ character.alignment }}</p>
            <p><strong>Level:</strong>{{ character.level }}</p>
            <p><strong>Armor Class:</strong>{{ character.armor_class }}</p>
            <p><strong>Max Hit Points:</strong>{{ character.max_hit_points }}</p>
            <p><strong>Speed:</strong>{{ character.speed }}</p>
            <p><strong>Hit Dice:</strong>{{ character.level }}d{{ character.hit_dice }}</p>
            <p><strong class="text-red-600">Proficiency:</strong> {{ calculateProficiency(character) }}</p>
            <p><strong>Spellcasting Ability:</strong>{{ character.spellcasting_ability }}</p>
            <p><strong class="text-red-600">SPELL SAVE DC:</strong> {{ calculateSpellSaveDC(character) }}</p>
            <p><strong class="text-red-600">SPELL ATTACK BONUS:</strong> {{ calculateSpellAttackBonus(character) }}</p>
        </div>
        <div>
            <div v-for="attribute in character.attributes" class="">
                {{ attribute.name }} {{ attribute.score }} {{ attribute.bonus }} {{ calculateAttributeModifier(attribute.score, attribute.bonus) }}
            </div>
        </div>
        <div>
            <div v-for="skill in character.skills" class="">
                {{ skill.name }} {{ skill.proficiency }} {{ skill.expertise }} {{ calculateSkillBonus(skill) }}
            </div>
        </div>
    </div>
    <button @click="backToList()" class="mt-4 bg-gray-500 text-white px-4 py-2 rounded">Back to List</button>
</template>

<script>
export default {
    props: {
        character: Object
    },
    methods: {
        calculateProficiency(character) {
            if (character.level >= 1 && character.level <= 4) return 2;
            if (character.level >= 5 && character.level <= 8) return 3;
            if (character.level >= 9 && character.level <= 12) return 4;
            if (character.level >= 13 && character.level <= 16) return 5;
            if (character.level >= 17 && character.level <= 20) return 6;
            return 2;
        },
        calculateSpellModifier(character, includeBase) {
            const proficiency = this.calculateProficiency(character);
            const attribute = this.findAttribute(character, character.spellcasting_ability);
            const attributeModifier = this.calculateAttributeModifier(attribute.score, attribute.bonus);
            return (includeBase ? 8 : 0) + proficiency + attributeModifier;
        },
        calculateSpellSaveDC(character) {
            return this.calculateSpellModifier(character, true);
        },
        calculateSpellAttackBonus(character) {
            return this.calculateSpellModifier(character, false);
        },
        findAttribute(character, attributeName) {
            return character.attributes.find(attribute => attribute.name.toLowerCase() === attributeName.toLowerCase());
        },
        findSkill(character, skillName) {
            return character.skills.find(skill => skill.skill_name.toLowerCase() === skillName.toLowerCase());
        },
        calculateAttributeModifier(score, bonus = 0) {
            return Math.floor((score - 10) / 2) + bonus;
        },
        calculateSkillBonus(skill) {
            const attribute = this.findAttribute(this.character, skill.base_attribute);
            const attributeModifier = this.calculateAttributeModifier(attribute.score, attribute.bonus);
            const proficiencyBonus = skill.proficiency ? this.calculateProficiency(this.character) : 0;
            const expertiseBonus = skill.expertise ? this.calculateProficiency(this.character) : 0;
            return attributeModifier + proficiencyBonus + expertiseBonus;
        },
        backToList() {
            this.$inertia.visit(route('characters.index'));
        }
    }
};
</script>
