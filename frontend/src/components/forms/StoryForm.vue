<template>
  <form class="container max-w-2xl mx-auto bg-white p-4 flex flex-col gap-4 rounded" @submit.prevent="handleSubmit">
    <div class="flex flex-col gap-2">
      <FormError :errors="formErrors" name="title"/>
      <label>Titre</label>
      <input class="border p-2" type="text" v-model="formData.title"/>
    </div>
    <div class="flex flex-col gap-2">
      <FormError :errors="formErrors" name="description"/>
      <label>Description</label>
      <textarea class="border p-2" v-model="formData.description"/>
    </div>

    <div class="mt-4">
      <div class="flex justify-between items-center">
        <span class="font-bold">Chapitres</span>
        <button type="button" @click="addChapter" class="text-sm text-blue-600">+ Ajouter un chapitre</button>
      </div>
      <div v-for="(chapter, index) in formData.chapters" :key="index" class="mt-4 p-4 border rounded">
        <ChapterForm
            v-model:title="chapter.title"
            v-model:content="chapter.content"
            v-model:choices="chapter.choices"
            :chapters="formData.chapters"
        />
        <button type="button" @click="removeChapter(index)" class="text-red-500 text-sm mt-2">Supprimer ce chapitre
        </button>
      </div>
    </div>

    <button class="bg-indigo-600 text-white rounded px-4 py-2 mt-6">
      Créer
    </button>
  </form>
</template>
<script setup>
import FormError from "@/components/FormError.vue";
import ChapterForm from "@/components/forms/ChapterForm.vue";
import {ref, watchEffect} from "vue";
import StoryRepository from "@/repositories/storyRepository.js";
import {useRouter} from "vue-router";

const router = useRouter()

const formData = ref({
  title: "",
  description:  "",
  chapters:  [],
})

const formErrors = ref()

const addChapter = () => {
  formData.value.chapters.push({
    title: "",
    content: "",
    choices: []
  })
}

const removeChapter = (index) => {
  formData.value.chapters.splice(index, 1)
}

const handleSubmit = async () => {
  try {
    await StoryRepository.create(formData.value)
    await router.push({name: "stories"})
  } catch (e) {
    formErrors.value = e.errors
  }
}

</script>