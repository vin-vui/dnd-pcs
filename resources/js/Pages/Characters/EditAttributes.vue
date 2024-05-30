<template>
    <v-layout>
        <Menu :curent="curent"></Menu>
        <v-main>
            <form @submit.prevent="submit" class="py-12 px-4 flex flex-col gap-4">
                <v-card v-for="attribute in character.attributes" :key="attribute.id" class="px-2 border">
                    <v-card-title>{{ $t(`attributes.${attribute.name}`) }}</v-card-title>
                    <v-number-input
                        v-model="form.attributes[attribute.id].score"
                        control-variant="split"
                        variant="outlined"
                        label="Score"
                        :rules="[v => !!v || 'Champ obligatoire']"
                        :error-messages="form.errors[`attributes.${attribute.id}.score`]"
                        @input="form.clearErrors(`attributes.${attribute.id}.score`)"
                    ></v-number-input>
                    <v-number-input
                        class="capitalize"
                        v-model="form.attributes[attribute.id].bonus"
                        control-variant="split"
                        variant="outlined"
                        label="Bonus"
                        :rules="[v => !!v || 'Champ obligatoire']"
                        :error-messages="form.errors[`attributes.${attribute.id}.bonus`]"
                        @input="form.clearErrors(`attributes.${attribute.id}.bonus`)"
                    >
                        <template #prepend>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512"><path fill="currentColor" d="M179.813 20.72v81.25L135.78 75.624l17.564 46.938l-115.656-20.938l84.718 49.906H20v27.345l110.47 14.875l96.593-29.188c-11.303-11.87-18.594-30.743-18.594-52c0-35.926 20.87-65.062 46.624-65.062c25.753 0 46.625 29.136 46.625 65.063c0 20.847-7.038 39.375-17.97 51.28l99.03 29.907l112.5-15.156V151.53H394.19l84.718-49.905l-120.437 21.78l17.874-47.718l-48.656 29.126V20.72zM495.28 223.343l-112.5 22.437l-55.405-13.124l-28.03 118.313l16.592 145h51.688L329.25 351.22l46.53 27.842l-21.31-56.937l124.436 22.5l-91.125-53.688h107.5v-67.593zM20 223.75v67.188h108.813l-91.125 53.687L157.31 322.97L136.345 379l38.47-23l-28.595 139.97h48.155l12.905-144.41l-21.685-118.84l-55.125 13.06z"/></svg>
                        </template>
                    </v-number-input>
                    <v-checkbox v-model="form.attributes[attribute.id].proficiency" label="Maîtrise"></v-checkbox>
                </v-card>
                <v-btn :disabled="form.processing" :loading="form.processing" color="indigo-darken-3" size="x-large" variant="flat" block type="submit">
                    Valider
                </v-btn>
                <v-btn class="text-none" color="red-lighten-3" size="large" variant="outlined" block @click="back">
                    Annuler
                </v-btn>
            </form>

            <div class="fixed top-6 right-4" style="z-index: 9999!important;">
                <v-btn @click="back" icon="">
                    <template v-slot:default>
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512"><path fill="currentColor" d="m19.828 18.256l-.002.015c249.642 36.995 371.904 169.983 397.32 278.01c-2.094 5.977-4.496 11.044-7.068 14.968c-17.29 26.383-62.522 40.075-101.654 28.596c5.984-19.75 10.132-39.834 12.07-59.12c-95.46 8.177-212.544 8.42-301.207-22.642c41.727 95.317 99.325 164.465 164.983 230.08c18.296-2.164 35.807-11.35 51.837-25.37c85.218 34.667 188.066-2.555 226.748-60.68c46.922-70.5 74.07-317.52-167.462-383.856H232.81c160.326 54.874 195.73 167.74 191.573 239.03c-37.15-93.627-137.68-191.855-312.38-239.03H19.83z"/></svg>
                    </template>
                </v-btn>
            </div>
            
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
            curent: 'Caractéristiques',
            form: this.$inertia.form({
                attributes: this.initializeAttributes(),
            }),
        };
    },
    methods: {
        initializeAttributes() {
            const attributes = {};
            this.character.attributes.forEach(attribute => {
                attributes[attribute.id] = {
                    score: attribute.score,
                    bonus: attribute.bonus || 0,
                    proficiency: attribute.proficiency === 0 ? false : true,
                };
            });
            return attributes;
        },
        submit() {
            this.form.post(route('characters.attributes.store', this.character.id), {
                preserveState: (page) => Object.keys(page.props.errors).length,
            });
        },
        back() {
            this.$inertia.visit(route('characters.show', this.character.id));
        },
    },
};
</script>
