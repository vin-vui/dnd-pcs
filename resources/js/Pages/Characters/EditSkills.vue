<template>
    <v-layout>
        <Menu :curent="curent"></Menu>
        <v-main>
            <form class="py-12 px-4 flex flex-col gap-4">
                <v-card v-for="skill in character.skills" :key="skill.id" class="border">
                    <v-card-title>{{ $t(`skills.${skill.name}`) }}</v-card-title>
                    <div class="flex justify-around -mb-4">
                        <v-checkbox v-model="form.skills[skill.id].proficiency" label="Maîtrise" @change="onProficiencyChange(skill.id)"></v-checkbox>
                        <v-checkbox v-model="form.skills[skill.id].expertise" label="Expertise" @change="onExpertiseChange(skill.id)"></v-checkbox>
                    </div>
                </v-card>
            </form>

            <div class="fixed top-6 right-4" style="z-index: 9999!important;">
                <v-btn @click="back" icon="">
                    <template v-slot:default>
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512"><path fill="currentColor" d="m19.828 18.256l-.002.015c249.642 36.995 371.904 169.983 397.32 278.01c-2.094 5.977-4.496 11.044-7.068 14.968c-17.29 26.383-62.522 40.075-101.654 28.596c5.984-19.75 10.132-39.834 12.07-59.12c-95.46 8.177-212.544 8.42-301.207-22.642c41.727 95.317 99.325 164.465 164.983 230.08c18.296-2.164 35.807-11.35 51.837-25.37c85.218 34.667 188.066-2.555 226.748-60.68c46.922-70.5 74.07-317.52-167.462-383.856H232.81c160.326 54.874 195.73 167.74 191.573 239.03c-37.15-93.627-137.68-191.855-312.38-239.03H19.83z"/></svg>
                    </template>
                </v-btn>
            </div>

            <v-snackbar v-model="snackbar"
                bottom right
                :timeout="2000"
                color="success"
                rounded="pill"
                location="top center"
            >
                {{ snackbarMessage }}
            </v-snackbar>

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
            curent: 'Compétences',
            form: this.$inertia.form({
                skills: this.initializeSkills(),
            }),
            snackbar: false,
            snackbarMessage: '',
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
            this.submit()
        },
        onExpertiseChange(skillId) {
            if (this.form.skills[skillId].expertise && !this.form.skills[skillId].proficiency) {
                this.form.skills[skillId].proficiency = true;
            }
            this.submit()
        },
        submit() {
            this.form.post(route('characters.skills.store', this.character.id), {
                preserveState: true,
                onSuccess: () => {
                    this.snackbarMessage = this.$t('savedSuccessfully');
                    this.snackbar = true;
                },
            });
        },
        back() {
            this.$inertia.visit(route('characters.show', this.character.id));
        },
    },
};
</script>
