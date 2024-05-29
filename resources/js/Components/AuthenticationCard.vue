<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 px-4">
        <div>
            <slot name="logo" />
        </div>

        <v-card class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden border">
            <slot />
        </v-card>
    </div>
</template>
