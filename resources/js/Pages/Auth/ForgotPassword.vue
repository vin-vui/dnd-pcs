<script setup>
import { useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            Vous avez oublié votre mot de passe ? Pas de problème. Il vous suffit de nous indiquer votre adresse email et nous vous enverrons un lien de réinitialisation du mot de passe qui vous permettra d'en choisir un nouveau.
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <v-text-field label="Email" variant="outlined" v-model="form.email"
                    autofocus
                    autocomplete="username"
                    :error-messages="form.errors.email"></v-text-field>
            </div>

            <div class="flex items-center justify-end mt-4">
                <v-btn :disabled="form.processing" :loading="form.processing" color="indigo-darken-3" size="x-large" variant="flat" block type="submit">
                    réinitialisation
                </v-btn>
            </div>
        </form>
    </AuthenticationCard>
</template>
