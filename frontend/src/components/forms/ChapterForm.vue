<template>
  <div class="flex flex-col gap-2">
    <label>Titre du chapitre</label>
    <input class="border p-2" v-model="title"/>

    <label>Contenu</label>
    <textarea class="border p-2" v-model="content"/>

    <div class="mt-4">
      <div class="flex justify-between items-center">
        <span class="font-semibold">Choix</span>
        <button type="button" @click="addChoice" class="text-blue-600 text-sm">+ Ajouter un choix</button>
      </div>
      <div v-for="(choice, index) in choices" :key="index" class="mt-2 border p-2 rounded">
        <label class="text-sm">Texte du choix</label>
        <input class="border p-1 w-full mb-1" v-model="choice.choice_text"/>
        <label class="text-sm">Va vers chapitre index</label>
        <select
            class="border p-1 w-full"
            v-model="choice.next_chapter_index"
        >
          <option
              v-for="(chapterOption, chapterIndex) in chapters"
              :key="chapterIndex"
              :value="chapterIndex"
          >
            {{ chapterIndex + 1 }} - {{ chapterOption.title || 'Chapitre sans titre' }}
          </option>
        </select>
        <button type="button" @click="removeChoice(index)" class="text-red-500 text-xs mt-1">Supprimer</button>
      </div>
    </div>
  </div>
</template>
<script setup>
import {defineModel } from "vue";

const title = defineModel("title");
const content = defineModel("content");
const choices = defineModel("choices");
defineProps({
  chapters: {
    type: Array,
    required: true
  }
});


const addChoice = () => {
  choices.value.push({
    choice_text: "",
    next_chapter_index: null
  });
};

const removeChoice = (index) => {
  choices.value.splice(index, 1);
};
</script>
