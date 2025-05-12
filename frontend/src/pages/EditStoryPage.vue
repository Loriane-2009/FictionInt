<template>
  <div class="size-full">
    <h1 class="text-4xl font-bold text-center text-indigo-700 mb-4">Modifier une histoire</h1>
    <StoryForm :story/>
  </div>
</template>
<script setup>
import StoryForm from "@/components/forms/StoryForm.vue";
import {onMounted, ref} from "vue";
import StoryRepository from "@/repositories/storyRepository.js";
import {useRoute} from "vue-router"

const story = ref()
const route = useRoute()

onMounted(async () => {
  story.value = await StoryRepository.getOne(route.params.id)
})

</script>