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
import Menu from "@/Components/Menu.vue";
import { VNumberInput } from "vuetify/labs/VNumberInput";

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
            curent: 'Informations du personnage',
            form: this.$inertia.form({
                name: this.character.name,
                race: this.character.race,
                class: this.character.class,
                background: this.character.background,
                alignment: this.character.alignment,
                image: null,
            }),
            preview: this.character.image,
            alignments: [],
        };
    },
    created() {
        this.alignments = [
            this.$t('alignments.lawful_good'),
            this.$t('alignments.neutral_good'),
            this.$t('alignments.chaotic_good'),
            this.$t('alignments.lawful_neutral'),
            this.$t('alignments.true_neutral'),
            this.$t('alignments.chaotic_neutral'),
            this.$t('alignments.lawful_evil'),
            this.$t('alignments.neutral_evil'),
            this.$t('alignments.chaotic_evil')
        ];
    },
    methods: {
        submit() {
            this.form.post(route("characters.update", this.character.id), {
                preserveState: (page) => Object.keys(page.props.errors).length,
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            });
        },
        previewImg(e) {
            const file = e.target.files[0];
            if (file) {
                this.preview = URL.createObjectURL(file);
                this.form.image = file;
            }
        },
        back() {
            this.$inertia.visit(route("characters.show", this.character.id));
        },
    },
};
</script>
