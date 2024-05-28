<template>
    <v-layout>
        <Menu :curent="curent"></Menu>
        <v-main>
            <form @submit.prevent="submit" class="py-12 px-4 flex flex-col gap-4">
                <v-card v-for="skill in character.skills" :key="skill.id">
                    <v-card-title>{{ $t(`skills.${skill.name}`) }}</v-card-title>
                    <div class="flex justify-around">
                        <v-checkbox v-model="form.skills[skill.id].proficiency" label="Maîtrise" @change="onProficiencyChange(skill.id)"></v-checkbox>
                        <v-checkbox v-model="form.skills[skill.id].expertise" label="Expertise" @change="onExpertiseChange(skill.id)"></v-checkbox>
                    </div>
                </v-card>
                <v-btn :disabled="form.processing" :loading="form.processing" color="indigo-darken-3" size="x-large" variant="flat" block type="submit">
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
            curent: 'Compétences',
            form: this.$inertia.form({
                skills: this.initializeSkills(),
            }),
        };
    },
    methods: {
        initializeSkills() {
            const skills = {};
            this.character.skills.forEach(skill => {
                skills[skill.id] = {
                    proficiency: skill.proficiency === 0 ? false : true,
                    expertise: skill.expertise === 0 ? false : true,
                };
            });
            return skills;
        },
        onProficiencyChange(skillId) {
            if (!this.form.skills[skillId].proficiency && this.form.skills[skillId].expertise) {
                this.form.skills[skillId].expertise = false;
            }
        },
        onExpertiseChange(skillId) {
            if (this.form.skills[skillId].expertise && !this.form.skills[skillId].proficiency) {
                this.form.skills[skillId].proficiency = true;
            }
        },
        submit() {
            this.form.post(route('characters.skills.store', this.character.id), {
                preserveState: (page) => Object.keys(page.props.errors).length,
            });
        },
        back() {
            this.$inertia.visit(route('characters.show', this.character.id));
        },
    },
};
</script>
