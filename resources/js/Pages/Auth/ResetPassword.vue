<script setup>
import { useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';

const props = defineProps({
    email: String,
    token: String,
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.update'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <form @submit.prevent="submit">
            <div>
                <v-text-field label="Email" variant="outlined" v-model="form.email"
                    :error-messages="form.errors.email"></v-text-field>
            </div>

            <div class="mt-4">
                <v-text-field label="Mot de passe" variant="outlined" v-model="form.password"
                    type="password"
                    autocomplete="new-password"
                    :error-messages="form.errors.password"></v-text-field>
            </div>

            <div class="mt-4">
                <v-text-field label="Confirmer le mot de passe" variant="outlined" v-model="form.password_confirmation"
                    type="password"
                    autocomplete="new-password"
                    :error-messages="form.errors.password_confirmation"></v-text-field>
            </div>

            <div class="flex items-center justify-end mt-4">
                <v-btn :disabled="form.processing" :loading="form.processing" color="indigo-darken-3" size="x-large" variant="flat" block type="submit">
                    reset mot de passe
                </v-btn>
            </div>
        </form>
    </AuthenticationCard>
</template>
