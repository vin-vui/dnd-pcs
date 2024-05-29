<template>
    <v-layout>
        <Menu :curent="curent"></Menu>
        <v-main>
            <form @submit.prevent="submit" class="py-12 px-4 flex flex-col gap-4">
                <v-number-input control-variant="split" label="Niveau" variant="outlined" v-model="form.level"
                    :error-messages="form.errors.level"></v-number-input>
                <v-number-input control-variant="split" label="Classe d'armure" variant="outlined"
                    v-model="form.armor_class" :error-messages="form.errors.armor_class"></v-number-input>
                <v-number-input control-variant="split" label="Points de vie maximum" variant="outlined"
                    v-model="form.max_hit_points" :error-messages="form.errors.max_hit_points"></v-number-input>
                <v-number-input control-variant="split" label="Vitesse" variant="outlined" v-model="form.speed"
                    :error-messages="form.errors.speed"></v-number-input>
                <v-select label="Caractéristique de sorts" :items="abilities" item-value="value" item-title="text"
                    variant="outlined" v-model="form.spellcasting_ability"
                    :error-messages="form.errors.spellcasting_ability"></v-select>
                <v-select label="Dés de vie" :items="dices" variant="outlined" v-model="form.hit_dice"
                    :error-messages="form.errors.hit_dice"></v-select>
                <v-btn :disabled="loading" :loading="loading" color="indigo-darken-3" size="x-large" variant="flat"
                    block @click="submit">
                    Valider
                </v-btn>
                <v-btn class="text-none" color="red-lighten-3" size="large" variant="outlined" block @click="back">
                    Annuler
                </v-btn>
            </form>
        </v-main>
    </v-layout>
</template>

<script>
import Menu from '@/Components/Menu.vue';
import { VNumberInput } from 'vuetify/labs/VNumberInput';

export default {
    components: {
        Menu,
        VNumberInput,
    },
    props: {
        character: Object,
    },
    data() {
        return {
            curent: 'Attributs',
            form: this.$inertia.form({
                level: this.character.level,
                armor_class: this.character.armor_class,
                max_hit_points: this.character.max_hit_points,
                speed: this.character.speed,
                spellcasting_ability: this.character.spellcasting_ability,
                hit_dice: this.character.hit_dice,
            }),
            abilities: [],
            dices: [
                6,
                8,
                10,
                12
            ],
        };
    },
    created() {
        this.abilities = [
            { text: this.$t('attributes.wisdom'), value: 'wisdom' },
            { text: this.$t('attributes.charisma'), value: 'charisma' },
            { text: this.$t('attributes.intelligence'), value: 'intelligence' }
        ];
    },
    methods: {
        submit() {
            this.form.post(route('characters.traits.store', this.character), {
                preserveState: (page) => Object.keys(page.props.errors).length,
            });
        },
        back() {
            this.$inertia.visit(route('characters.show', this.character));
        },
    },
};
</script>
