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
    <button class="bg-indigo-600 text-white rounded px-4 py-2 mt-6">
      {{ editMode ? "Modifer" : "Créer" }}
    </button>
  </form>
</template>
<script setup>
import FormError from "@/components/FormError.vue";
import {computed, ref, watchEffect} from "vue";
import StoryRepository from "@/repositories/storyRepository.js";
import {useRouter} from "vue-router";

const {story} = defineProps(['story'])
const router = useRouter()

const formData = ref({
  title: story?.title || "",
  description: story?.description || "",
})

const editMode = computed(() => !!story?.id)
const formErrors = ref()

watchEffect(() => {
  if (story) {
    formData.value = story
  }
}, [story])

const handleSubmit = async () => {
  try {
    if (editMode.value) {
      await StoryRepository.update(story.id, formData.value)
    } else {
      await StoryRepository.create(formData.value)
    }
    await router.push({name: "stories"})
  } catch (e) {
    formErrors.value = e.errors
  }
}

</script>