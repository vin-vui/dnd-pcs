<script setup>
import { useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

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

            <div class="mt-4">
                <v-text-field label="Mot de passe" variant="outlined" v-model="form.password"
                    type="password"
                    autocomplete="current-password"
                    :error-messages="form.errors.password"></v-text-field>
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <v-checkbox v-model="form.remember" label="Se souvenir de moi"></v-checkbox>
                </label>
            </div>

            <div class="flex flex-col items-center justify-end mt-4">
                <v-btn :disabled="form.processing" :loading="form.processing" color="indigo-darken-3" size="x-large" variant="flat" block type="submit">
                    me connecter
                </v-btn>
                <v-spacer class="pt-4 mb-4 border-b w-full"></v-spacer>
                <v-btn class="text-none" color="grey-lighten-3" size="large" variant="outlined" block @click="register">
                    Je n'ai pas encore de compte
                </v-btn>
                <v-btn v-if="canResetPassword" class="text-none mt-4" color="red-lighten-3" size="large" variant="text" block @click="passwordRequest">
                    J'ai oublié mon mot de passe
                </v-btn>
            </div>
        </form>
    </AuthenticationCard>
</template>
<script>
export default {
    methods: {
        register() {
            this.$inertia.visit(route('register'));
        },
        passwordRequest() {
            this.$inertia.visit(route('password.request'));
        },
    },
};
</script>
