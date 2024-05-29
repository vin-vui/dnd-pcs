<script setup>
import { useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
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
                <v-text-field label="Pseudo" variant="outlined" v-model="form.name"
                    autofocus
                    :error-messages="form.errors.name"></v-text-field>
            </div>

            <div class="mt-4">
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

            <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                <InputLabel for="terms">
                    <div class="flex items-center">
                        <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />

                        <div class="ms-2">
                            I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">Privacy Policy</a>
                        </div>
                    </div>
                    <InputError class="mt-2" :message="form.errors.terms" />
                </InputLabel>
            </div>

            <div class="flex flex-col items-center justify-end mt-4">
                <v-btn :disabled="form.processing" :loading="form.processing" color="indigo-darken-3" size="x-large" variant="flat" block type="submit">
                    m'enregistrer
                </v-btn>
                <v-spacer class="pt-4 mb-4 border-b w-full"></v-spacer>
                <v-btn class="text-none" color="grey-lighten-3" size="large" variant="outlined" block @click="login">
                    J'ai déjà un compte
                </v-btn>
            </div>
        </form>
    </AuthenticationCard>
</template>
<script>
export default {
    methods: {
        login() {
            this.$inertia.visit(route('login'));
        },
    },
};
</script>
