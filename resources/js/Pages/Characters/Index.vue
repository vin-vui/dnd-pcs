<template>
    <div>
        <h1 class="text-2xl font-bold mb-4">My Characters</h1>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Name</th>
                    <th class="py-2">Race</th>
                    <th class="py-2">Class</th>
                    <th class="py-2">Level</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="character in characters" :key="character.id">
                    <td class="py-2">{{ character.name }}</td>
                    <td class="py-2">{{ character.race }}</td>
                    <td class="py-2">{{ character.class }}</td>
                    <td class="py-2">{{ character.level }}</td>
                    <td class="py-2">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded" @click="viewCharacter(character.id)">View</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: {
        characters: Object
    },
    methods: {
        viewCharacter(id) {
            this.$inertia.visit(route('characters.show', id));
        }
    }
};
</script>
