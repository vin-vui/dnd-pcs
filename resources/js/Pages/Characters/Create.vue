<template>
    <v-layout>
        <Menu curent="Nouveau Personnage"></Menu>
        <v-main>
            <form @submit.prevent="submit" class="py-12 px-4 flex flex-col gap-4">
                <div class="">
                    <div class="flex items-center gap-4">
                        <v-avatar color="surface-variant" v-if="previewImage" size="100" class="-mt-6">
                            <v-img :src="previewImage"></v-img>
                        </v-avatar>
                        <v-avatar color="surface-variant" v-if="!previewImage" size="100" class="-mt-6">
                        </v-avatar>
                        <v-file-input clearable label="Avatar" variant="outlined" counter show-size ref="photo" @change="previewImg" accept="image/jpeg, image/png, image/svg, image/webp"></v-file-input>
                    </div>
                    <InputError :message="form.errors.image" />
                </div>
                <div class="">
                    <v-text-field label="Nom" variant="outlined" v-model="form.name"></v-text-field>
                    <InputError :message="form.errors.name" />
                </div>
                <div class="">
                    <v-text-field label="Race" variant="outlined" v-model="form.race"></v-text-field>
                    <InputError :message="form.errors.race" />
                </div>
                <div class="">
                    <v-text-field label="Classe" variant="outlined" v-model="form.class"></v-text-field>
                    <InputError :message="form.errors.class" />
                </div>
                <div class="">
                    <v-text-field label="Historique" variant="outlined" v-model="form.background"></v-text-field>
                    <InputError :message="form.errors.background" />
                </div>
                <div class="">
                    <v-select label="Alignement" :items="alignments" variant="outlined" v-model="form.alignment"></v-select>
                    <InputError :message="form.errors.alignment" />
                </div>
                <v-btn :disabled="form.processing" :loading="form.processing" color="indigo-darken-3" size="x-large" variant="flat" block type="submit">valider</v-btn>
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
    data() {
        return {
            form: this.$inertia.form({
                name: '',
                race: '',
                class: '',
                background: '',
                alignment: '',
                level: 1,
                armor_class: 10,
                max_hit_points: 10,
                speed: 30,
                spellcasting_ability: '',
                hit_dice: '',
                image: null,
            }),
            previewImage: '',
            alignments: [
                'Lawful Good',
                'Neutral Good',
                'Chaotic Good',
                'Lawful Neutral',
                'True Neutral',
                'Chaotic Neutral',
                'Lawful Evil',
                'Neutral Evil',
                'Chaotic Evil',
            ],
        };
    },
    methods: {
        submit() {
            if (this.$refs.photo) {
                if (this.$refs.photo.files[0] !== undefined) {
                    this.form.image = this.$refs.photo.files[0];
                }
            }
            this.form.post(route('characters.store'), {
                preserveState: (page) => Object.keys(page.props.errors).length,
            });
        },
        previewImg(e) {
            this.previewImage = URL.createObjectURL(e.target.files[0]);
        },
    },
};
</script>
