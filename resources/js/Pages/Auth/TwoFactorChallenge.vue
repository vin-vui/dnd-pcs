<script setup>
import { nextTick, ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';

const recovery = ref(false);

const form = useForm({
    code: '',
    recovery_code: '',
});

const recoveryCodeInput = ref(null);
const codeInput = ref(null);

const toggleRecovery = async () => {
    recovery.value ^= true;

    await nextTick();

    if (recovery.value) {
        recoveryCodeInput.value.focus();
        form.code = '';
    } else {
        codeInput.value.focus();
        form.recovery_code = '';
    }
};

const submit = () => {
    form.post(route('two-factor.login'));
};
</script>

<template>
    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            <template v-if="! recovery">
                Veuillez confirmer l'accès à votre compte en entrant le code d'authentification fourni par votre application d'authentification.
            </template>

            <template v-else>
                Veuillez confirmer l'accès à votre compte en entrant l'un de vos codes de récupération d'urgence.
            </template>
        </div>

        <form @submit.prevent="submit">
            <div v-if="! recovery">
                <v-text-field label="Code" variant="outlined" v-model="form.code"
                    ref="codeInput"
                    :error-messages="form.errors.code"></v-text-field>
            </div>

            <div v-else>
                <v-text-field label="Recovery Code" variant="outlined" v-model="form.recovery_code"
                    ref="recoveryCodeInput"
                    :error-messages="form.errors.recovery_code"></v-text-field>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="button" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 underline cursor-pointer" @click.prevent="toggleRecovery">
                    <template v-if="! recovery">
                        Use a recovery code
                    </template>

                    <template v-else>
                        Use an authentication code
                    </template>
                </button>
                <v-btn :disabled="form.processing" :loading="form.processing" color="indigo-darken-3" size="x-large" variant="flat" block type="submit">
                    me connecter
                </v-btn>
            </div>
        </form>
    </AuthenticationCard>
</template>
