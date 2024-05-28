<template>
    <v-layout>
        <Menu :curent="curent"></Menu>
        <v-main>
            <form @submit.prevent="submit" class="py-12 px-4 flex flex-col gap-4">
                <div class="">
                    <v-number-input control-variant="split" label="Niveau" variant="outlined" v-model="form.level"></v-number-input>
                </div>
                <div class="">
                    <v-number-input control-variant="split" label="Classe d'armure" variant="outlined" v-model="form.armor_class"></v-number-input>
                    <InputError :message="form.errors.armor_class" />
                </div>
                <div class="">
                    <v-number-input control-variant="split" label="Points de vie maximum" variant="outlined" v-model="form.max_hit_points"></v-number-input>
                    <InputError :message="form.errors.max_hit_points" />
                </div>
                <div class="">
                    <v-number-input control-variant="split" label="Vitesse" variant="outlined" v-model="form.speed"></v-number-input>
                    <InputError :message="form.errors.speed" />
                </div>
                <div class="">
                    <v-select label="Caractéristique de sorts" :items="abilities" variant="outlined" v-model="form.spellcasting_ability"></v-select>
                    <InputError :message="form.errors.spellcasting_ability" />
                </div>
                <div class="">
                    <v-select label="Dés de vie" :items="dices" variant="outlined" v-model="form.hit_dice"></v-select>
                    <InputError :message="form.errors.hit_dice" />
                </div>
                <v-btn :disabled="loading" :loading="loading" color="indigo-darken-3" size="x-large" variant="flat" block @click="submit">
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
import InputError from '@/Components/InputError.vue';
import Menu from '@/Components/Menu.vue';
import { VNumberInput } from 'vuetify/labs/VNumberInput';

export default {
    components: {
        InputError,
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
            abilities: [
                'wisdom',
                'charisma',
                'intelligence'
            ],
            dices: [
                6,
                8,
                10,
                12
            ],
        };
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
