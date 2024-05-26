<template>
    <v-layout>
        <Menu current="Caractéristiques"></Menu>
        <v-main>
            <form @submit.prevent="submit" class="py-12 px-4 flex flex-col gap-4">
                <div v-for="attribute in character.attributes" :key="attribute.id">
                    <v-number-input
                        v-model="form.attributes[attribute.id]"
                        :label="attribute.name"
                        :rules="[v => !!v || 'Champ obligatoire']"
                        :error-messages="form.errors[`attributes.${attribute.id}`]"
                        @input="form.clearErrors(`attributes.${attribute.id}`)"
                    ></v-number-input>
                </div>
                <v-btn :disabled="form.processing" :loading="form.processing" color="indigo-darken-3" size="x-large" variant="flat" block type="submit">
                    Valider
                </v-btn>
                <v-btn class="text-none" color="grey-lighten-3" size="large" variant="flat" block @click="back">
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
            form: this.$inertia.form({
                attributes: this.initializeAttributes(),
            }),
        };
    },
    methods: {
        initializeAttributes() {
            const attributes = {};
            this.character.attributes.forEach(attribute => {
                attributes[attribute.id] = attribute.score;
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
