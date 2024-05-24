<template>
    <v-layout>

        <Menu curent="Nouveau Personnage"></Menu>

        <v-main>
            <form @submit.prevent="submit">
                <!-- Image -->
                <div class="flex flex-col justify-start basis-1/2">
                    <InputLabel value="Image" />
                    <input type="file" accept="image/jpeg, image/png, image/svg, image/webp" ref="photo"
                        @change="previewImg">
                    <img v-if="previewImage" :src="previewImage"
                        class="object-contain bg-cover w-full mt-4 p-2 rounded-md" />
                    <img v-if="!previewImage" class="h-96 object-contain bg-cover w-full mt-4 p-2 rounded-md" />
                    <InputError :message="form.errors.image" />
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input type="text" id="name" v-model="form.name"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <InputError :message="form.errors.name" />
                </div>
                <div class="mb-4">
                    <label for="race" class="block text-gray-700">Race</label>
                    <input type="text" id="race" v-model="form.race"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <InputError :message="form.errors.race" />
                </div>
                <div class="mb-4">
                    <label for="class" class="block text-gray-700">Class</label>
                    <input type="text" id="class" v-model="form.class"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <InputError :message="form.errors.class" />
                </div>
                <div class="mb-4">
                    <label for="background" class="block text-gray-700">Background</label>
                    <input type="text" id="background" v-model="form.background"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <InputError :message="form.errors.background" />
                </div>
                <div class="mb-4">
                    <label for="alignment" class="block text-gray-700">Alignment</label>
                    <input type="text" id="alignment" v-model="form.alignment"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <InputError :message="form.errors.alignment" />
                </div>
                <div class="mb-4">
                    <label for="level" class="block text-gray-700">Level</label>
                    <input type="number" id="level" v-model="form.level"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label for="armor_class" class="block text-gray-700">Armor Class</label>
                    <input type="number" id="armor_class" v-model="form.armor_class"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <InputError :message="form.errors.armor_class" />
                </div>
                <div class="mb-4">
                    <label for="max_hit_points" class="block text-gray-700">Max Hit Points</label>
                    <input type="number" id="max_hit_points" v-model="form.max_hit_points"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <InputError :message="form.errors.max_hit_points" />
                </div>
                <div class="mb-4">
                    <label for="speed" class="block text-gray-700">Speed</label>
                    <input type="number" id="speed" v-model="form.speed"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <InputError :message="form.errors.speed" />
                </div>
                <div class="mb-4">
                    <label for="spellcasting_ability" class="block text-gray-700">Spellcasting Ability</label>
                    <input type="text" id="spellcasting_ability" v-model="form.spellcasting_ability"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    <InputError :message="form.errors.spellcasting_ability" />
                </div>
                <div class="mb-4">
                    <label for="hit_dice" class="block text-gray-700">Hit Dice</label>
                    <input type="text" id="hit_dice" v-model="form.hit_dice"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <InputError :message="form.errors.hit_dice" />
                </div>
                <button :loading="form.processing" :disabled="form.processing" @click="submit" type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
            </form>
        </v-main>

    </v-layout>
</template>

<script>
import InputError from '@/Components/InputError.vue'
import Menu from '@/Components/Menu.vue';

export default {
    components: {
        InputError,
        Menu
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
            customMessages: [
                'Delete Token',
                'Are you sure?',
                'Done!'
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
                preserveState: (page) => Object.keys(page.props.errors).length
            })
        },
        previewImg(e) {
            this.previewImage = URL.createObjectURL(e.target.files[0]);
        },
        backToList() {
            this.$inertia.visit(route('characters.index'));
        }
    },
};
</script>
