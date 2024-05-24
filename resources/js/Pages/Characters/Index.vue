<template>
    <v-layout>

        <Menu curent="Mes Personnages"></Menu>

        <v-main class="px-4 my-8 flex flex-col gap-4">
            <v-card v-for="character in characters" :key="character.id" @click="viewCharacter(character.id)" class="px-4 py-2 border" elevation="12" max-width="600" rounded="lg" width="100%">
                <div class="flex items-center gap-4">
                    <v-avatar size="50">
                        <v-img :alt="character.name" :src="character.image"></v-img>
                    </v-avatar>
                    <div class="flex flex-col">
                        <div class="">{{ character.name }}</div>
                        <div class="text-xs text-gray-400">{{ character.race }}</div>
                        <div class="text-xs text-gray-400">{{ character.class }} niv. {{ character.level }}</div>
                    </div>
                </div>
            </v-card>
        </v-main>
    </v-layout>
</template>

<script>
import Menu from '@/Components/Menu.vue';

export default {
    components: {
        Menu
    },
    props: {
        characters: Object
    },
    methods: {
        viewCharacter(id) {
            this.$inertia.visit(route('characters.show', id));
        },
    }
};
</script>
