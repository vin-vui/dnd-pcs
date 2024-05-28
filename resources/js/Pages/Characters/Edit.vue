<template>
    <v-layout>
      <Menu :curent="curent"></Menu>
      <v-main>
        <form @submit.prevent="submit" class="py-12 px-4 flex flex-col gap-4">
          <div class="">
            <div class="flex items-center gap-4">
                <v-avatar color="surface-variant" v-if="preview" size="100" class="-mt-6">
                    <v-img :src="preview"></v-img>
                </v-avatar>
                <v-avatar color="surface-variant" v-if="!preview" size="100" class="-mt-6">
                    <v-img :src="character.image"></v-img>
                </v-avatar>
                <v-file-input clearable label="Changer l'avatar" variant="outlined" counter show-size ref="photo" @change="previewImg" accept="image/jpeg, image/png, image/svg, image/webp"></v-file-input>
            </div>
            <InputError :message="form.errors.image" />
          </div>
          <div>
            <v-text-field label="Nom" variant="outlined" v-model="form.name"></v-text-field>
            <InputError :message="form.errors.name" />
          </div>
          <div>
            <v-text-field label="Race" variant="outlined" v-model="form.race"></v-text-field>
            <InputError :message="form.errors.race" />
          </div>
          <div>
            <v-text-field label="Classe" variant="outlined" v-model="form.class"></v-text-field>
            <InputError :message="form.errors.class" />
          </div>
          <div>
            <v-text-field label="Historique" variant="outlined" v-model="form.background"></v-text-field>
            <InputError :message="form.errors.background" />
          </div>
          <div>
            <v-select label="Alignement" :items="alignments" variant="outlined" v-model="form.alignment"></v-select>
            <InputError :message="form.errors.alignment" />
          </div>
          <v-btn :disabled="form.processing" :loading="form.processing" color="indigo-darken-3" size="x-large" variant="flat" block type="submit">
            Valider
          </v-btn>
          <v-btn class="text-none" color="red-lighten-3" size="large" variant="outlined" block @click="back">
            Annuler
          </v-btn>
        </form>
      </v-main>
    </v-layout>
  </template>

  <script>
  import InputError from "@/Components/InputError.vue";
  import Menu from "@/Components/Menu.vue";
  import { VNumberInput } from "vuetify/labs/VNumberInput";

  export default {
    components: {
      InputError,
      Menu,
      VNumberInput,
    },
    props: {
      character: Object,
    },
    data() {
      return {
        curent: 'Informations du personnage',
        form: this.$inertia.form({
          name: this.character.name,
          race: this.character.race,
          class: this.character.class,
          background: this.character.background,
          alignment: this.character.alignment,
          image: null,
        }),
        preview: this.character.image,
        alignments: [
          "Lawful Good",
          "Neutral Good",
          "Chaotic Good",
          "Lawful Neutral",
          "True Neutral",
          "Chaotic Neutral",
          "Lawful Evil",
          "Neutral Evil",
          "Chaotic Evil",
        ],
      };
    },
    methods: {
      submit() {
        this.form.post(route("characters.update", this.character.id), {
          preserveState: (page) => Object.keys(page.props.errors).length,
          headers: {
            "Content-Type": "multipart/form-data",
          },
        });
      },
      previewImg(e) {
        const file = e.target.files[0];
        if (file) {
          this.preview = URL.createObjectURL(file);
          this.form.image = file;
        }
      },
      back() {
        this.$inertia.visit(route("characters.show", this.character.id));
      },
    },
  };
  </script>
