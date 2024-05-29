<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('user-password.update'), {
        errorBag: 'updatePassword',
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }

            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <FormSection @submitted="updatePassword">
        <template #title>
            Mise à jour du mot de passe
        </template>

        <template #description>
            Ensure your account is using a long, random password to stay secure.
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <v-text-field label="Mot de passe actuel" variant="outlined" v-model="form.current_password"
                    type="password"
                    autocomplete="new-password"
                    :error-messages="form.errors.current_password"></v-text-field>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <v-text-field label="Nouveau mot de passe" variant="outlined" v-model="form.password"
                    type="password"
                    autocomplete="new-password"
                    :error-messages="form.errors.password"></v-text-field>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <v-text-field label="Confirmer le mot de passe" variant="outlined" v-model="form.password_confirmation"
                    type="password"
                    autocomplete="new-password"
                    :error-messages="form.errors.password_confirmation"></v-text-field>
            </div>
        </template>

        <template #actions>
            <v-btn :disabled="form.processing" :loading="form.processing" color="indigo-darken-3" size="x-large" variant="flat" block type="submit">
                enregistrer
            </v-btn>
        </template>
    </FormSection>
</template>
