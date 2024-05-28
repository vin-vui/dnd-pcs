<template>
    <v-layout>

        <Menu :curent="character.name"></Menu>

        <v-main>

            <v-tabs-window v-model="tabs">
                <v-tabs-window-item :key="1" :value="1">
                    <div class="pb-32 pt-8 px-4">
                        <div class="">
                            <div class="flex items-center gap-4 mt-2">
                                <div class="absolute right-4 top-4">
                                    <v-btn icon="$vuetify" @click="update">
                                        <svg class="size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M18 20.813v124.062c29.144 25.523 57.37 49.464 84.375 71.563c5.023-1.894 14.962-7.8 25.688-16.188c11.8-9.23 25.18-21.31 37.875-34.03c12.693-12.724 24.73-26.115 33.906-37.876c8.405-10.775 14.297-20.736 16.094-25.563c-21.434-26.277-44.613-53.706-69.313-81.968zm211.03 98.156c-3.632 6.475-8.583 13.33-14.468 20.874c-9.812 12.578-22.258 26.385-35.406 39.562c-13.147 13.178-26.967 25.687-39.594 35.563c-7.574 5.923-14.48 10.928-21.03 14.593a2415 2415 0 0 0 23.812 18.906l-.47-1.75c3.795-1.018 13.79-6.738 24.595-15.19c10.804-8.45 23.076-19.55 34.718-31.218c11.64-11.668 22.69-23.948 31.093-34.718c8.055-10.325 13.58-19.86 14.876-23.813a2474 2474 0 0 0-18.125-22.81zm31 39.436c-3.33 5.84-7.777 11.954-13.03 18.688c-9.04 11.587-20.498 24.314-32.594 36.437c-12.095 12.125-24.805 23.622-36.437 32.72c-7.382 5.773-14.058 10.626-20.44 14.063a1894 1894 0 0 0 21.69 16.468c4.76-2.366 12.16-6.993 20-13.124c10.512-8.222 22.447-19.016 33.78-30.375c11.333-11.357 22.075-23.3 30.25-33.78c6.05-7.755 10.62-15.072 12.97-19.75a2017 2017 0 0 0-16.19-21.344zm26.658 40.813c-2.536 3.743-5.462 7.644-8.688 11.78c-8.812 11.296-19.964 23.687-31.75 35.5s-24.192 23.006-35.53 31.875c-4.06 3.174-7.9 6.046-11.595 8.563l94.28 141.28c43.757-7.75 105.398 16.894 158.595 66.063l14.438-14.436L347.094 360.5c-11.034 5.484-24.775 3.663-33.97-5.53c-11.517-11.52-11.517-30.202 0-41.72c11.52-11.518 30.202-11.518 41.72 0c9.218 9.218 11.038 23.014 5.5 34.063l119.312 119.312l14.47-14.47c-49.17-53.196-73.847-114.806-66.095-158.56L286.69 199.218z"/></svg>
                                    </v-btn>
                                </div>
                                <v-avatar color="surface-variant" size="100">
                                    <v-img :alt="character.name" :src="character.image"></v-img>
                                </v-avatar>
                                <div class="flex flex-col w-full">
                                    <div class="text-gray-50 flex justify-between items-center">{{ character.class }}</div>
                                    <div class="text-xs text-gray-400">{{ character.race }}</div>
                                    <div class="text-xs text-gray-400">{{ character.background }}</div>
                                    <div class="text-xs text-gray-400">{{ character.alignment }}</div>
                                </div>
                            </div>
                            <v-card class="absolute w-36 text-center -bottom-10 bg-white" @click="updateTraits">
                                <div class="border py-1 uppercase font-bold tracking-widest text-sm">attributs</div>
                            </v-card>
                            <div class="flex flex-col gap-8 mt-6 pt-12 border-t">
                                <div class="flex items-center justify-between gap-2">
                                    <v-card class="border w-full h-24 relative rounded-lg overflow-visible">
                                        <div class="absolute inset-x-0 -top-4 flex justify-center">
                                            <svg class="text-blue-300" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                                                <path fill="currentColor" d="M256 16c25 24 100 72 150 72v96c0 96-75 240-150 312c-75-72-150-216-150-312V88c50 0 125-48 150-72" />
                                            </svg>
                                        </div>
                                        <div class="h-full flex flex-col justify-between items-center">
                                            <div class="mt-4"></div>
                                            <div class="font-bold text-4xl">{{ character.armor_class }}</div>
                                            <div class="text-xs text-gray-400">CA</div>
                                        </div>
                                    </v-card>
                                    <v-card class="border w-full h-24 relative rounded-lg overflow-visible">
                                        <div class="absolute inset-x-0 -top-4 flex justify-center">
                                            <svg class="text-red-300" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                                                <path fill="currentColor" d="m257.08 11.29l-9.232 1.437l-62.868 9.765l3.586 23.08a221 221 0 0 0-37.416 16.303l-14.51-18.03l-7.28 5.86l-49.56 39.89l14.163 17.594A217.6 217.6 0 0 0 69.39 140.3l-20.78-8.046l-3.374 8.715l-22.976 59.325l20.26 7.846a217.5 217.5 0 0 0-4.805 41.47l-21.02 3.267l11.2 72.1l20.634-3.206a221 221 0 0 0 16.74 38.474l-16.165 13.012l45.75 56.84l15.858-12.764a217.6 217.6 0 0 0 34.183 25.104l-7.27 18.773l68.042 26.347l7.266-18.76a217.7 217.7 0 0 0 42.074 4.482l3.115 20.05l72.1-11.2l-3.168-20.386a221 221 0 0 0 38.433-17.205l13.075 16.24l56.84-45.747l-13.315-16.543a217.6 217.6 0 0 0 24.394-33.906l20.11 7.787l26.35-68.038l-20.63-7.988a217.5 217.5 0 0 0 4.133-41.05l22.29-3.462l-1.434-9.234l-9.765-62.866l-22.85 3.55a221 221 0 0 0-16.746-37.378l18.103-14.57l-5.86-7.28l-39.89-49.56l-18.28 14.715a217.6 217.6 0 0 0-32.835-23.868l8.562-22.112l-8.713-3.375L309.7 16.88L301.136 39a217.6 217.6 0 0 0-39.95-4.45c-.166-.004-.33-.002-.494-.005l-3.61-23.252zm-15.598 21.337l3.108 20.008l-35.164 5.463l-3.11-20.006zm78.897 8.43l33.184 12.85l-7.312 18.882l-33.184-12.853l7.31-18.88zM263.6 53.27c10.2.34 20.456 1.458 30.687 3.406l-5.4 13.94l68.042 26.35l5.402-13.952a199.4 199.4 0 0 1 24.91 18.08l-11.842 9.53l45.75 56.84l12.098-9.735a201.5 201.5 0 0 1 12.787 28.45l-15.443 2.398l11.2 72.1l15.98-2.483a199 199 0 0 1-3.174 31.29l-15.395-5.964l-3.373 8.714l-22.977 59.327l15.975 6.188a200 200 0 0 1-18.633 25.97l-10.926-13.575l-7.278 5.86l-49.56 39.89l11.24 13.964a202 202 0 0 1-29.514 13.24l-2.78-17.908l-9.235 1.433l-62.866 9.766l2.828 18.202a199.4 199.4 0 0 1-32.328-3.47l6.7-17.3l-8.713-3.375l-59.327-22.974l-6.695 17.29a199.4 199.4 0 0 1-26.3-19.286l14.302-11.512l-5.86-7.28l-39.888-49.56l-14.02 11.285a201.5 201.5 0 0 1-12.826-29.53l17.688-2.75l-1.436-9.232l-9.765-62.867l-17.182 2.67a199.4 199.4 0 0 1 3.715-31.723l15.826 6.128l26.35-68.04l-15.258-5.91a199.4 199.4 0 0 1 18.726-25.24l10.118 12.57l56.84-45.75l-9.778-12.147a201.6 201.6 0 0 1 28.465-12.387l2.366 15.234l72.1-11.202l-2.324-14.96zM133.8 70.124l12.694 15.772l-27.723 22.312l-12.694-15.77L133.8 70.122zm283.653 30.648l22.313 27.722l-15.774 12.696l-22.312-27.72zm-84.244 42a71 71 0 0 0-5.76.187c-23.033 1.7-45.933 15.003-61.29 44.006l-7.906 14.933l-8.445-14.636c-20.227-35.054-56.5-47.824-87.093-41.81c-30.592 6.012-55.328 29.383-53.947 72.85c1.278 40.24 29.05 67.447 63.59 97.54c30.045 26.176 64.672 53.784 85.763 93.478c22.093-39.507 57.856-65.95 88.133-91.453c17.386-14.644 33.017-28.982 43.86-44.736c10.846-15.755 17.13-32.66 16.456-54.243c-1.262-40.46-26.58-66.478-56.316-73.916a73 73 0 0 0-17.047-2.2zM59.286 156.433l18.88 7.31l-12.85 33.186l-18.88-7.31zm412.65 44.636l5.463 35.164l-20.01 3.11l-5.462-35.164l20.01-3.11zm-413.9 64.3l5.465 35.165l-20.006 3.108l-5.465-35.163l20.007-3.11zm391.846 42.33l18.88 7.312l-12.85 33.185l-18.88-7.312l12.85-33.186zM91.156 363.4l22.313 27.723l-15.775 12.695l-22.312-27.722zm305.274 33.02l12.695 15.77l-27.723 22.316l-12.695-15.774zm-227.315 35.23l33.186 12.852l-7.31 18.88l-33.185-12.85l7.31-18.882zm136.662 14.873l3.11 20.01l-35.164 5.463l-3.11-20.008z" />
                                            </svg>
                                        </div>
                                        <div class="h-full flex flex-col justify-between items-center">
                                            <div class="mt-4"></div>
                                            <div class="font-bold text-4xl">{{ character.max_hit_points }}</div>
                                            <div class="text-xs text-gray-400">Vie Max</div>
                                        </div>
                                    </v-card>
                                    <v-card class="border w-full h-24 relative rounded-lg overflow-visible">
                                        <div class="absolute inset-x-0 -top-4 flex justify-center">
                                            <svg class="text-yellow-300" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                                                <path fill="currentColor" d="M274.663 63.02L90.792 80.26l154.193 19.273c5.063-13.339 12.952-24.341 22.541-31.828a52 52 0 0 1 7.137-4.683zm19.832 12.803c-5.092.166-10.492 2.296-15.879 6.502c-7.835 6.118-15.009 16.575-18.83 29.688s-3.477 26.099-.289 35.927c3.188 9.829 8.73 16.071 15.633 18.395s14.766.596 22.601-5.522c7.835-6.117 15.01-16.574 18.83-29.687c3.822-13.113 3.48-26.1.292-35.928s-8.73-16.07-15.633-18.394a19 19 0 0 0-6.725-.98zm166.85 9.485c-24.113 13.949-46.193 20.298-87.233 17.252L340.48 228.452c-.675 2.682-.318 6 1.922 10.87c2.243 4.876 6.355 10.89 11.836 17.607c9.99 12.242 24.527 27.16 39.573 44.238c14.56-5.5 28.23-12.828 38.972-20.19c11.841-8.113 20.234-16.95 21.965-19.939l42.027-118.22c-16.748-14.613-29.471-33.974-35.43-57.51m-288.07 51.261L23.652 158.331l89.309 12.988l2.158-5.052zm286.265 2.325l16.941 6.078l-39.123 109.037l-37.212 19.181l-8.247-15.998l30.913-15.933zm-259.842 4.394l-70.586 36.043l-29.222 68.422l19.218 8.809l24.905-57.764l59.299-22.973l-14.702 75.955l-.963 1.477c-32.725 50.18-71.654 93.41-118.464 134.28L42.722 432.98l17.021 7.245l31.875-43.989l1.38-.906c45.476-29.872 75.93-62.333 112.255-94.492l4.533-4.012l5.426 2.686c23.365 11.571 42.934 24.117 62.107 37.705l8.924 6.324l-69.006 65.643l24.649 39.794l17.67-10.308l-20.078-28.477l8.224-5.004c29.884-18.186 49.986-39.43 71.938-66.039c-23.653-35.6-42.006-49.433-71.592-71.267l9.908-7.227c34.703-25.312 38.132-54.476 41.61-79.449c-9.203 4.441-19.498 5.772-29.473 2.414c-13.488-4.54-22.924-16.472-27.465-30.473c-.17-.522-.321-1.054-.479-1.584zm116.62 45.04c-1.355 7.027-3.324 14.17-6.092 21.349l14.056 9.666l5.938-22.223zm-174.243 97.476l-126.85 17.953l99.67 14.105a599 599 0 0 0 27.18-32.058m91.781 82.73l-95.892 21.432l59.406 13.277z" />
                                            </svg>
                                        </div>
                                        <div class="h-full flex flex-col justify-between items-center">
                                            <div class="mt-4"></div>
                                            <div class="font-bold text-4xl">{{ character.speed }}</div>
                                            <div class="text-xs text-gray-400">Vitesse</div>
                                        </div>
                                    </v-card>
                                </div>
                                <div class="flex items-center justify-between gap-2">
                                    <v-card class="border w-full h-24 relative rounded-lg overflow-visible">
                                        <div class="absolute inset-x-0 -top-4 flex justify-center">
                                            <svg class="text-purple-300" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                                                <path fill="currentColor" d="M57.594 43v242.563l80 30.53V292c-22.504-3.217-45.065-8.633-62.53-26.844l13.5-12.937c12.15 12.667 29.032 17.263 48.28 20.374L110.656 55.03C93.3 51.725 75.492 48.1 57.594 43m397.125.03c-65.178 17.392-138.354.102-191.22 70.814v208.812c19.795-29.15 45.443-40.866 70.72-46.53c33.914-7.603 66.18-7.163 91.5-27.626l11.75 14.53c-31.256 25.263-68.25 24.386-99.158 31.314c-29.295 6.566-53.978 17.63-72.25 63.187l188.657-71.967zM128.81 49.28l27.407 228.157l.06.563v216.906l19.94-39.28l20.468 38.155V296.814L168.563 57.5l-39.75-8.22zm60.47 24.25l25.593 217.782a88.6 88.6 0 0 1 12.188 8.063c6.452 5.097 12.412 11.36 17.75 18.97V109.5c-15.496-17.475-34.402-28.327-55.532-35.97zm-168.78.846v239.813l6.125 2.25l110.97 40.78v-19.906l-98.407-36.156V74.376zm452.594.03v226.75l-216.938 79.69l-40.78-14.97v38.28c23.21 8.03 58.078 6.813 86.25-2.53v-17.563l184.03-67.625l6.125-2.25V74.407zm-257.72 239.532v31.813l27.564 10.53c-7.04-20.847-16.565-33.66-27.438-42.25q-.062-.044-.125-.092z" />
                                            </svg>
                                        </div>
                                        <div class="h-full flex flex-col justify-between items-center">
                                            <div class="mt-4"></div>
                                            <div class="font-bold text-4xl">{{ calculateProficiency(character) }}
                                            </div>
                                            <div class="text-xs text-gray-400">Maîtrise</div>
                                        </div>
                                    </v-card>
                                    <v-card class="border w-full h-24 relative rounded-lg overflow-visible">
                                        <div class="absolute inset-x-0 -top-4 flex justify-center">
                                            <svg class="text-green-300" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                                                <path fill="currentColor" d="m325.944 61.815l-98.26 24.566l147.158 66.891l98.263-24.566zM209.787 97.687v43.488l155.355 70.617v-43.489zM491 142.475l-108.159 27.04v62.929c-20.977 5.241-41.953 10.488-62.929 15.732v62.929c-20.977 5.241-41.953 10.488-62.929 15.732v62.93c-20.977 5.24-41.952 10.487-62.929 15.731v44.687L491 375.947zm-290.914 13.733l-35.332 8.834l147.16 66.891l35.334-8.834zm-53.228 20.14v43.488l155.355 70.617v-43.489zm-9.7 58.521l-35.333 8.834l147.16 66.891l35.334-8.834zm-53.23 20.14v43.488l155.357 70.617v-43.489zm-9.7 58.522l-35.331 8.834l147.159 66.89l35.334-8.834zM21 333.67v43.487l155.356 70.617v-43.488z" />
                                            </svg>
                                        </div>
                                        <div class="h-full flex flex-col justify-between items-center">
                                            <div class="mt-4"></div>
                                            <div class="font-bold text-4xl">{{ character.level }}</div>
                                            <div class="text-xs text-gray-400">Niveau</div>
                                        </div>
                                    </v-card>
                                    <v-card class="border w-full h-24 relative rounded-lg overflow-visible">
                                        <div class="absolute inset-x-0 -top-4 flex justify-center">
                                            <svg class="text-red-300" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                                                <path fill="currentColor" d="M218.4 24.72c-14.2 0-30.5 3.56-49.5 11.88c77.2 8.6 65.9 91.4 14.1 106.2c-65.4 18.7-131.31-23.7-98.34-99.2c-39.67 18.95-42.17 80.8-12.93 111.5C141.3 227.9 56.9 279 37.25 200.7C-1.929 326.2 60.34 489.5 258.7 489.5c250.7 0 282-374.7 129.2-415.04c26.5 43.04-13.1 70.94-24.9 73.14c-51.3 9.9-58.1-122.89-144.6-122.88m37.5 118.08c4.5 0 9.4 1.1 12.8 2.9l115.9 67.1c7.4 4.1 7.4 10.9 0 15.2l-115.9 66.9c-7.2 4.3-18.5 4.3-25.7 0L126.8 228c-7.3-4.3-7.3-11.1 0-15.2L243 145.7c3.4-1.8 7.9-2.9 12.9-2.9m-89 62.6c-21.6-.4-33.1 15-18.2 24.3c9.6 4.8 23.7 4.4 32.7-.8c8.8-5.3 9.5-13.7 1.5-19.4c-4.3-2.5-10-4-16-4.1m178.6.1c-20.8.4-31.3 15.5-16.3 24.5c9.6 4.9 23.9 4.6 33-.7c8.9-5.3 9.5-13.9 1.2-19.6c-4.2-2.4-9.9-4-15.9-4.2zm-89 0c-6.6-.1-13 1.5-17.7 4.2c-10.2 5.6-10.4 15.1-.6 20.9c9.9 5.8 25.8 5.6 35.1-.6c15-9 4.6-24.3-16.8-24.5m-141 41c1.5.1 3.4.5 5.6 1.6l111.5 64.5c7.2 4.1 12.9 14.2 12.9 22.5v119.7c0 8.3-5.7 11.7-12.9 7.6L121.2 398c-7.4-4.3-13.2-14.2-13.2-22.6V255.7c0-6.2 3-9.2 7.5-9.2m281.3 0c4.2 0 7.2 3 7.2 9.2v119.7c0 8.4-6 18.3-13 22.6l-111.5 64.4c-7.2 4.1-12.9.7-12.9-7.6V335.1c0-8.3 5.7-18.4 12.9-22.5L391 248.1c2.1-1.1 4.2-1.5 5.8-1.6m-185 65.5h-1.1c-5.3.4-8.5 4.8-8.5 11.6c-.6 10.4 7.2 24.1 16.9 29.8c9.8 5.6 17.6 1.1 17.2-9.9c.2-14.2-13.3-31.1-24.5-31.5m130.9 21.8c-11.2.1-24.8 17.2-24.7 31.4c.1 10.4 7.7 14.4 17.2 8.9c9.4-5.5 17-18.3 17.1-28.8c0-6.7-3.3-11.1-8.5-11.5zm-216.9 22.5c-5.4.3-8.7 4.7-8.7 11.6c-.5 10.5 7.3 24.1 17 29.8c9.8 5.5 17.6 1 17.2-10.1c0-14.5-14.1-31.8-25.5-31.3" />
                                            </svg>
                                        </div>
                                        <div class="h-full flex flex-col justify-between items-center">
                                            <div class="mt-4"></div>
                                            <div class="font-bold text-xl">{{ character.level }}d{{ character.hit_dice }}</div>
                                            <div class="text-xs text-gray-400">Dés de vie</div>
                                        </div>
                                    </v-card>
                                </div>
                                <div v-if="character.spellcasting_ability" class="flex items-center justify-between gap-2">
                                    <v-card class="border w-full h-24 relative rounded-lg overflow-visible">
                                        <div class="absolute inset-x-0 -top-4 flex justify-center">
                                            <svg class="text-fuchsia-300" xmlns="http://www.w3.org/2000/svg" width="32"
                                                height="32" viewBox="0 0 512 512">
                                                <path fill="currentColor"
                                                    d="m257.65 19.033l-47.552 85.598c-51.53 16.016-91.8 57.678-105.877 110.026L33.407 252.25l69.276 38.486c5.942 26.33 18.456 50.18 35.722 69.737a95.3 95.3 0 0 1 20.547-21.162c-19.19-22.513-30.794-51.682-30.794-83.51c0-71.074 57.838-128.488 128.912-128.488c71.077 0 128.49 57.412 128.49 128.49c0 30.006-10.234 57.65-27.408 79.583c8.525 5.88 15.612 12.795 21.413 20.592c15.176-18.532 26.235-40.563 31.77-64.692l70.263-39.035l-71.826-38.13c-14.312-52.475-54.968-94.123-106.856-109.825zm.266 150.33c-17.56 0-33.686 9.02-45.902 24.647s-20.09 37.754-20.09 62.373c0 26.12 9.218 49.343 22.846 65.148l10.14 11.76l-15.14 3.452c-38.027 8.67-55.962 26.396-66.48 54.268c-9.788 25.934-11.75 61.67-11.99 104.236h254.473c-.047-42.74-.66-79.348-9.683-105.814c-9.693-28.432-27.11-46.38-67.99-54.38l-15.272-2.99l9.817-12.076c12.778-15.718 21.267-38.404 21.267-63.603c0-24.62-7.875-46.747-20.092-62.373s-28.343-24.647-45.902-24.647z" />
                                            </svg>
                                        </div>
                                        <div class="h-full flex flex-col justify-between items-center">
                                            <div class="mt-4"></div>
                                            <div class="font-bold uppercase text-3xl">{{ getFirstThreeLetters($t(`attributes.${character.spellcasting_ability}`)) }}</div>
                                            <div class="text-xs text-gray-400">Carac. Sorts</div>
                                        </div>
                                    </v-card>
                                    <v-card class="border w-full h-24 relative rounded-lg overflow-visible">
                                        <div class="absolute inset-x-0 -top-4 flex justify-center">
                                            <svg class="text-pink-300" xmlns="http://www.w3.org/2000/svg" width="32"
                                                height="32" viewBox="0 0 512 512">
                                                <path fill="currentColor"
                                                    d="M51.67 24.377c0 215.76 44.432 429.318 209.21 474.63c181.394-38.7 209.446-258.276 209.446-474.63zM276.482 44.79c1.448.018 2.916.13 4.375.34l.07.01c6.26.92 12.11 3.844 15.452 6.77L275.18 180.922l17.607 5.646L352.07 66.25c4.27-.31 10.41.832 16.05 3.863c5.992 3.22 10.74 8.133 12.995 12.658l-56.13 116.24l15.218 10.48l76.664-81.246c4.1 1.16 9.34 4.344 13.65 9.195c4.623 5.2 7.66 11.762 8.53 16.882L337.624 263.916l.135-.143c-14.347 14.864-16.183 38.756-12.852 68.202c3.173 28.047 11.84 62.157 23.774 100.28c-25.156 24.603-55.416 40.65-85.72 47.116c-28.74-10.175-50.453-19.478-72.64-39.227c20.222-52.778 24.746-101.603 23.157-140.637c6.284 2.99 12.498 5.453 18.69 7.197c15.103 4.253 30.777 3.893 44.453-4.392l-9.687-15.988c-8.748 5.3-17.79 5.74-29.7 2.387c-11.91-3.355-25.99-10.902-41.486-20.733c-28.876-18.32-62.683-44.228-101.223-63.307c4.407-8.026 9.135-12.05 13.983-13.96c6.228-2.456 14.186-1.912 24.166 1.56c15.198 5.29 33.493 17.21 52.21 28.808l16.007-9.14l-.754-3.508c-.613-.38-1.218-.745-1.83-1.127L167.284 65.877c3.303-3.966 9.28-8.136 15.986-10.318c6.207-2.02 12.423-2.145 16.595-1.113l25.715 116.66l18.36-.543l19.59-123.007c3.058-1.567 7.08-2.622 11.513-2.756q.715-.02 1.44-.01z" />
                                            </svg>
                                        </div>
                                        <div class="h-full flex flex-col justify-between items-center">
                                            <div class="mt-4"></div>
                                            <div class="font-bold text-4xl">{{ calculateSpellSaveDC(character) }}
                                            </div>
                                            <div class="text-xs text-gray-400">DD SdS</div>
                                        </div>
                                    </v-card>
                                    <v-card class="border w-full h-24 relative rounded-lg overflow-visible">
                                        <div class="absolute inset-x-0 -top-4 flex justify-center">
                                            <svg class="text-rose-300" xmlns="http://www.w3.org/2000/svg" width="32"
                                                height="32" viewBox="0 0 512 512">
                                                <path fill="currentColor"
                                                    d="m485.846 30l-172.967 74.424l64.283 20.32l-129.627 65.186l83.637 19.414l-96.996 62.219l219.133-69.7l-95.29-28.326L471.192 112.8l-72.115-15.024zm-280.46 45.766c-28.066-.117-49.926 56.532-57.726 90.607c-11.26 49.19-14.529 83.515-.828 133.059l-17.348 4.798c-15.463-55.917-8.245-94.75 2.301-142.341c10.547-47.592 14.52-70.403-4.459-74.182C85.244 79.328 82.04 178.17 79.57 222.604c-1.396 25.808.71 57.017 6.54 77.552l-16.901 6.196c-14.43-53.35-6.657-97.957-1.693-150.77c2.493-15.582-1.787-25.677-19.102-25.166c-15.833.467-27.015 143.362-13.275 179.041c8.713 53.061 31.247 130.572 10.955 152.766L18 494h205.973l19.986-28.592c23.08-5.008 28.42-19.86 37.023-33.787c25.291-40.946 82.384-83.166 129.114-99.226c21.142-7.51-21.912-48.546-53.836-32.782c-55.005 27.162-81.646 56.298-117.772 38.295c-55.855-27.834-47.245-100.648-35.861-162.83c6.141-33.544 40.41-89.602 7.156-98.824a21 21 0 0 0-4.396-.488z" />
                                            </svg>
                                        </div>
                                        <div class="h-full flex flex-col justify-between items-center">
                                            <div class="mt-4"></div>
                                            <div class="font-bold text-4xl">{{ calculateSpellAttackBonus(character)
                                                }}</div>
                                            <div class="text-xs text-gray-400">Atq. Sort</div>
                                        </div>
                                    </v-card>
                                </div>
                            </div>
                            <v-card class="absolute w-36 text-center -bottom-12 bg-white" @click="updateAttributes">
                                <div class="border py-1 uppercase font-bold tracking-widest text-sm">modificateurs</div>
                            </v-card>
                            <div class="grid grid-cols-3 gap-x-2 gap-y-12 mt-8 pt-12 border-t">
                                <div v-for="attribute in character.attributes" :key="attribute.name" class="border w-full h-24 relative rounded-lg">
                                    <div class="absolute inset-x-0 -top-4 flex justify-center  text-xl uppercase font-extrabold">
                                        <v-card class="border px-1 rounded-md text-gray-300">{{ getFirstThreeLetters($t(`attributes.${attribute.name}`)) }}</v-card>
                                    </div>
                                    <div class="h-full flex flex-col justify-center items-center">
                                        <div class="font-bold text-4xl">{{ calculateAttributeModifier(attribute.score, attribute.bonus) }}</div>
                                    </div>
                                    <div class="absolute inset-x-0 -bottom-3 flex justify-center ">
                                        <v-card class="border px-2 rounded-md text-gray-400">{{ calculateSavingThrowBonus(attribute) }}</v-card>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </v-tabs-window-item>
                <v-tabs-window-item :key="2" :value="2">
                    <div class="pb-32 pt-8 px-4">
                        <v-card class="absolute w-36 text-center -bottom-4 bg-white text-sm" @click="updateSkills">
                            <div class="border py-1 uppercase font-bold tracking-widest">Compétences</div>
                        </v-card>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 pt-12 border-t">
                            <div v-for="(skill, index) in character.skills" :key="index" class="grid grid-cols-4 items-center pl-4 pr-2 py-1 rounded-full" :class="index % 2 != 0 ? 'bg-white' : ''">
                                <div class="text-lg font-semibold whitespace-nowrap col-span-2">{{ $t(`skills.${skill.name}`) }}</div>
                                <v-card class="text-lg font-semibold text-gray-500 justify-self-center border w-10 text-center">
                                    {{ calculateSkillBonus(skill) }}
                                </v-card>
                                <div v-if="skill.expertise || skill.proficiency" class="justify-self-end py-2 -my-2 pl-3 pr-2 -mr-2 rounded-l-full">
                                    <span v-if="skill.expertise" class="text-[#FFD700]">
                                        <!-- Expertise Icon -->
                                        <svg class="size-6" xmlns="http://www.w3.org/2000/svg" width="32"
                                            height="32" viewBox="0 0 512 512">
                                            <path fill="currentColor"
                                                d="m256.65 38.984l-49.697 100.702l-111.13 16.146l80.413 78.385l-18.982 110.68l99.396-52.256l99.397 52.256l-18.983-110.68l80.413-78.384l-111.127-16.146zM112 308.826l-26.674 54.05l-59.646 8.665l43.16 42.073l-10.188 59.403L112 444.97l53.348 28.046l-10.188-59.403l43.16-42.072l-59.646-8.665L112 308.825zm288 0l-26.674 54.05l-59.646 8.665l43.16 42.073l-10.188 59.403L400 444.97l53.348 28.046l-10.188-59.403l43.16-42.072l-59.646-8.665L400 308.825z" />
                                        </svg>
                                    </span>
                                    <span v-else-if="skill.proficiency" class="text-[#C0C0C0]">
                                        <!-- Proficiency Icon -->
                                        <svg class="size-6" xmlns="http://www.w3.org/2000/svg" width="32"
                                            height="32" viewBox="0 0 512 512">
                                            <path fill="currentColor"
                                                d="M256 38.013c-22.458 0-66.472 110.3-84.64 123.502c-18.17 13.2-136.674 20.975-143.614 42.334c-6.94 21.358 84.362 97.303 91.302 118.662s-22.286 136.465-4.116 149.665S233.542 422.012 256 422.012s122.9 63.365 141.068 50.164c18.17-13.2-11.056-128.306-4.116-149.665c6.94-21.36 98.242-97.304 91.302-118.663c-6.94-21.36-125.444-29.134-143.613-42.335c-18.168-13.2-62.182-123.502-84.64-123.502z" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </v-tabs-window-item>
                <v-tabs-window-item :key="3" :value="3">
                    <v-card class="mt-12 mb-32 pt-6 pb-2">
                        <v-card-text>
                            <v-textarea
                            v-model="form.notes"
                            label="Notes"
                            auto-grow
                            variant="outlined"
                            rows="20"
                            @input="autoSave"
                            ></v-textarea>
                        </v-card-text>
                    </v-card>
                </v-tabs-window-item>
            </v-tabs-window>

            <div class="fixed bottom-0 pb-6 w-full bg-grey-darken-4">
                <v-tabs v-model="tabs" grow >
                    <v-tab :value="1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M256 23c-70.045 0-132.915 30.997-175.646 80H63v22.514C37.756 162.755 23 207.67 23 256s14.756 93.245 40 130.486V489h386V386.486c25.244-37.241 40-82.157 40-130.486s-14.756-93.245-40-130.486V103h-17.354C388.916 53.997 326.045 23 256 23m0 18c58.943 0 112.296 23.66 151.113 62H104.887C143.704 64.66 197.057 41 256 41m-152.635 80h145.201c-2.774 1.54-5.432 3.983-7.859 7.396C236.169 134.778 233 144.303 233 155s3.17 20.222 7.707 26.604c4.538 6.38 9.876 9.396 15.293 9.396s10.755-3.015 15.293-9.396S279 165.697 279 155s-3.17-20.222-7.707-26.604c-2.427-3.413-5.085-5.855-7.86-7.396h145.202l-100.436 62h36.375l85.748-52.938c.225.312.455.62.678.932V201H277.562c-6.112 4.924-13.487 8-21.562 8s-15.45-3.076-21.563-8H81v-70.006c.223-.312.453-.62.678-.931L167.426 183H203.8zM63 161.098v189.804C48.92 322.287 41 290.08 41 256s7.92-66.287 22-94.902m386 0c14.08 28.615 22 60.822 22 94.902s-7.92 66.287-22 94.902zM81 223h136v244.47a213.5 213.5 0 0 1-57.34-19.185l39.34-59.01v-40.08l-59.615 87.508A215.8 215.8 0 0 1 81 381.006zm214 0h136v158.006a215.8 215.8 0 0 1-58.385 55.697L313 349.195v40.08l39.34 59.01A213.5 213.5 0 0 1 295 467.471zm-48 97h18v150.799a219 219 0 0 1-9 .201c-3.016 0-6.014-.079-9-.201zM81 409.729c23.202 26.386 52.264 47.494 85.148 61.271H81zm350 0V471h-85.148c32.884-13.777 61.946-34.885 85.148-61.271"/>
                        </svg>
                    </v-tab>
                    <v-tab :value="2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M87.49 27.99C58.7 27.99 35.5 51.17 35.5 80c0 28.8 23.2 52 52 52s52-23.2 52-52c0-28.83-23.2-52.01-52.01-52.01M219.5 54.55c-2.6 4.13-4 9.58-4.5 15.32c-20.8-.7-39.2-1.03-58.3-.73c.8 6.29 1.1 12.15.4 18c19.8-.25 39.1 0 58.2.77c.3 3.12.7 5.96 1.2 8.26c-11.9 24.43-25.4 44.13-32.3 70.43c2.3 24.6 5.2 53.2 23.1 77.7c5 19.9 9.1 39.7 14.6 59.6c2.1-25.1 7.6-51.9 21.4-79.2c-1.9-9.1-2.1-17.2-1.3-25.7c-4.2-8.1-9.8-16.2-19.2-24c12.9-23.8 13.2-46.2 17.6-71.8l19.5-4.78c1.8-2.39 3.3-4.92 4.4-7.56c31 2.54 61.2 6.27 90.6 10.94c.6-6.09 2-11.99 4.1-17.56c-29.6-4.75-60-8.55-91.2-11.17c0-4.55-.4-9.28-1.1-14.13c-17.1-2.57-31.6-6.06-47.2-4.39m205 2.44c-28.8 0-52 23.18-52 52.01c0 28.8 23.2 52 52 52s52-23.2 52-52c0-28.83-23.2-52.01-52-52.01m-135 108.11c-7.5 0-14.6 3.9-20.3 11.6c-5.8 7.6-9.7 18.8-9.7 31.3c0 6.6 1.1 13.6 3 19.1c8.9-3.1 18.1-7.5 26.7-15c7.9 6.4 16.6 10.9 26.8 15c2.2-5.9 3.5-11.9 3.5-19.1c0-12.5-3.9-23.7-9.7-31.3c-5.7-7.7-12.8-11.6-20.3-11.6m-.3 58.9c-6.8 10.6-8.8 14.7-21.7 12.9c5.3 7.4 12.7 14.1 22 14c10.4-.1 17.2-6.5 21.8-13.8c-11.2.8-16.9-3.1-22.1-13.1m60.8 28.3c2.4 25.1 3.6 39.4 1.5 63.8c2.2 3.2 2.8 19.1 11.1 22.5c-12.8 6.5-17.6 24.1-24.6 31c-18.2 21.6-31.1 55.3-43.6 86.3c3.7 12.8 8.3 25.5 13.7 38.1H365c-5.6-27.2-13.6-54.7-22.2-82.1c3.4-5.4 3-4 6.5-23c14.9-10.2 47.2-27.3 52.6-49.6c-5-19.9-11.7-32.8-23.5-49.9c2.8-24.2-16.2-30.8-28.4-37.1m-100.3 3.4c-3.5 10.4-5.9 20.7-7.6 30.9l13.9-1.2c-3.2-9.7-4.9-20.1-6.3-29.7m65.9 3.5c-7.4 6-16.4 9.7-26.1 9.7c-7.4 0-14.3-2.1-20.4-5.7c.5 2.4.9 4.8 1.5 7.2c1.9 8.5 4.7 16.8 8 22.4c3.2 5.5 6 7.5 8.9 7.7c3.1.2 6.6-1.5 10.9-6.7c4.4-5.2 8.7-13.2 12.2-21.4c1.9-4.5 3.6-9 5-13.2m17.4 5c-2.8 7.9-5.3 14.6-8.6 21.5l9.8.5c-.2-7.3-.6-14.6-1.2-22m-69.4 38.7l-23.7 2c-.6 7.7-.9 15.4-1.1 23l94.6-1.5c.7-7.3 1-14.7 1.1-22.1l-20.5-1.1c-7.6 8.6-18.5 15.7-27.7 15.3c-10.3-.7-17.8-7.7-22.7-15.6m65.6 41.5l-90.4 1.5c-.9 9.3 6.9 16.2 12.3 20.3l66.7-.2c7.2-8 8.6-11.2 11.4-21.6M236 376.8c-14.4 39-29.7 77.9-41.2 117.2h53.1c6.7-12.3 12.8-24.9 18-37.8c-.7-31.9-14.5-62.9-29.9-79.4m70.3 7.3l-41.9.1c7.8 13.1 11.8 28.8 15 45.6l8.3-.8c6.1-15.2 10.6-30.7 18.6-44.9"/>
                        </svg>
                    </v-tab>
                    <v-tab :value="3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M311.9 47.95c-17.6 0-34.6.7-50.7 2.43L244.6 93.5l-4.9-40.04c-2.5.46-5 .94-7.5 1.47c-9.1 1.94-15.1 7.22-20.3 14.87s-8.9 17.5-12.1 26.6C191 121.5 184 148 178.4 175c6 5.1 12 10.3 17.9 15.4l30.7-17.6l33.8 26.1l51.9-19.7l61 24.5l-6.8 16.7l-54.4-21.8l-54.7 20.7l-32.2-24.9l-14.9 8.5c19.6 17.3 38.6 34.4 56.5 51.2l14-6.4l33.9 16.1l31.2-13.1l24.2 23.3l-12.4 13l-15.8-15.1l-27.6 11.7l-33-15.8c6.9 6.7 13.6 13.2 20.1 19.7l1.7 1.8l19.5 76.3l-7.8-5.7l-53 .4l-38.1-17.8l-42.4 14.6l-5.8-17l49.2-17l41.1 19.2l24.7-.2l-70.7-51.7c-19.7 4.6-39.4 2.8-58.1-3.7c-4.2 44.4-5.9 85.7-7 118.7c-.4 10.7 2.7 23 7.5 32.5c4.9 9.5 11.7 15.4 15 16.1c5.2 1.2 19 3.2 37.7 5.1l12.4-39l19.1 41.7c16.7 1.2 35 2 53.5 2.2c28.2.3 57.1-.9 82-4.7c15.8-2.3 29.6-6 40.7-10.4c-11.8-5.1-21.6-10.6-29.1-16.6c-11.1-8.9-18.2-19.3-17.3-30.9v.2c5.4-96.4 10.8-188.8 30.3-286l.1-.4l.1-.4c5.3-17.9 17.9-39.86 36.1-55.83c-13.9-2.06-28.6-4-43.7-5.66l-22.3 25.3l-2.2-27.7c-19-1.64-38.4-2.71-57.4-2.92h-5.7zm148.5 20.44c-4.7 3.69-9.2 8.03-13.3 12.73c12.1 8.18 21.4 23.38 21.8 36.98c.3 7.8-1.9 14.9-7.7 21.4c-5.8 6.4-15.6 12.4-31.6 15.8l3.8 17.6c18.6-4 32.3-11.5 41.2-21.4c9-9.9 12.7-22.2 12.3-34c-.6-19.3-11.1-37.59-26.5-49.11M25.44 71.91c-.24 1.61-.38 3.43-.38 5.62c.1 7.69 2.03 18.17 5.83 30.17c3.41 10.7 8.27 22.5 14.35 34.8c10.63-5.3 20.59-11 28.41-18.1c-4.42 12.5-10.15 24.7-18.6 36.5c4.14 7.2 8.63 14.4 13.45 21.5c10.64-5.3 20.72-13 29.52-26.1c-3.3 16-8.47 30.6-18.27 41.8c6.53 8.5 13.5 16.8 20.75 24.5c8.7-9.3 15.6-21 20.7-34.9c3.8 18.5 2.6 35.3-5.7 49.4c8 7.2 16.3 13.7 24.8 19.1c6.1-14 8.9-30.6 8.5-49.7c9.2 23.7 11.3 42.9 9.6 59.5c20.2 9.2 40.8 12 61.3 6.1l4.2-1.3l69.3 50.6l-5.9-22.8c-73-72.8-175.4-156.7-261.86-226.69M312.8 123.9l33.2 13.8l31.3-9.9l5.4 17.2l-37.5 11.9l-33.6-14l-28.8 8.1l-4.8-17.4zm107.3 236.2c-.7 0-1.3.1-2 .1c-3.5.1-7.2.5-11.1 1.3l3.4 17.6c12.2-2.3 20-.4 24.5 2.5c4.4 2.9 6.3 6.8 6.4 12.5c.1 9.3-7 23-23.3 32.5c5.4 2.9 11.9 5.9 19.3 8.7c14.4-11.6 22.1-26.8 22-41.4c-.1-10.7-5.2-21.2-14.6-27.4c-6.7-4.3-15-6.5-24.6-6.4" />
                        </svg>
                    </v-tab>
                </v-tabs>
            </div>

            <v-snackbar v-model="snackbar"
                bottom right
                :timeout="2000"
                color="success"
                variant="tonal"
                location="top center"
            >
                {{ snackbarMessage }}
            </v-snackbar>

        </v-main>

    </v-layout>
</template>

<script>
import Menu from '@/Components/Menu.vue';

export default {
    components: {
        Menu
    },
    data() {
        return {
            tabs: null,
            form: this.$inertia.form({
                notes: this.character.notes,
            }),
            snackbar: false,
            snackbarMessage: '',
        }
    },
    props: {
        character: Object
    },
    methods: {
        getFirstThreeLetters(name) {
            return name.substring(0, 3);
        },
        calculateProficiency(character) {
            if (character.level >= 1 && character.level <= 4) return 2;
            if (character.level >= 5 && character.level <= 8) return 3;
            if (character.level >= 9 && character.level <= 12) return 4;
            if (character.level >= 13 && character.level <= 16) return 5;
            if (character.level >= 17) return 6;
            return 2;
        },
        calculateSpellModifier(character, includeBase) {
            const proficiency = this.calculateProficiency(character);
            const attribute = this.findAttribute(character, character.spellcasting_ability);
            const attributeModifier = attribute ? this.calculateAttributeModifier(attribute.score, attribute.bonus) : 0;
            return (includeBase ? 8 : 0) + proficiency + attributeModifier;
        },
        calculateSpellSaveDC(character) {
            return this.calculateSpellModifier(character, true);
        },
        calculateSpellAttackBonus(character) {
            return this.calculateSpellModifier(character, false);
        },
        findAttribute(character, attributeName) {
            return character.attributes.find(attribute => attribute.name.toLowerCase() === attributeName.toLowerCase());
        },
        findSkill(character, skillName) {
            return character.skills.find(skill => skill.skill_name.toLowerCase() === skillName.toLowerCase());
        },
        calculateAttributeModifier(score, bonus = 0) {
            return Math.floor(((score + bonus) - 10) / 2);
        },
        calculateSavingThrowBonus(attribute) {
            const attributeModifier = this.calculateAttributeModifier(attribute.score, attribute.bonus);
            const proficiencyBonus = attribute.proficiency ? this.calculateProficiency(this.character) : 0;
            return attributeModifier + proficiencyBonus;
        },
        calculateSkillBonus(skill) {
            const attribute = this.findAttribute(this.character, skill.base_attribute);
            const attributeModifier = this.calculateAttributeModifier(attribute.score, attribute.bonus);
            const proficiencyBonus = skill.proficiency ? this.calculateProficiency(this.character) : 0;
            const expertiseBonus = skill.expertise ? this.calculateProficiency(this.character) : 0;
            return attributeModifier + proficiencyBonus + expertiseBonus;
        },
        updateTraits() {
            this.$inertia.visit(route('characters.traits.edit', this.character));
        },
        updateAttributes() {
            this.$inertia.visit(route('characters.attributes.edit', this.character));
        },
        updateSkills() {
            this.$inertia.visit(route('characters.skills.edit', this.character));
        },
        update() {
            this.$inertia.visit(route('characters.edit', this.character));
        },
        autoSave() {
            this.form.post(route('characters.notes.update', this.character), {
                preserveState: true,
                onSuccess: () => {
                    this.snackbarMessage = this.$t('notesSavedSuccessfully');
                    this.snackbar = true;
                },
            });
        },
    }
};
</script>
