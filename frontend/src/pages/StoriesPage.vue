<template>
  <h1 class="text-4xl font-bold text-center text-indigo-700 mb-4">Liste des histoires</h1>
  <div class="container mx-auto flex justify-center items-center gap-4 flex-col">
    <StoryCard v-for="story in stories" :key="story.id" :story/>
  </div>
</template>
<script setup>
import {onMounted, ref} from "vue";
import StoryRepository from "@/repositories/storyRepository.js";
import StoryCard from "@/components/StoryCard.vue";

const stories = ref([])

onMounted(async () => {
  stories.value = await StoryRepository.getAll()
  console.log(stories)
})
</script>