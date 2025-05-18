<template>
  <h1 class="text-4xl font-bold text-center text-sky-200 mb-4">Liste des histoires</h1>
  <div class="container mx-auto flex justify-center items-center gap-4 flex-col">
    <StoryCard
        v-for="story in stories"
        :key="story.id"
        :story
        @delete="handleDelete"
    />
    <RouterLink
        v-if="isAuthenticated"
        to="/stories/create"
        class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-lg text-lg transition duration-300"
    >
      Nouvelle histoire
    </RouterLink>
  </div>
</template>
<script setup>
import {onMounted, ref} from "vue";
import StoryCard from "@/components/StoryCard.vue";
import StoryRepository from "@/repositories/storyRepository.js";
import {useAuth} from "@/hooks/useAuth.js";

const {isAuthenticated} = useAuth()
const stories = ref([])

const handleDelete = async (id) => {
  await StoryRepository.destroy(id)
  stories.value = await StoryRepository.getAll()
}

onMounted(async () => {
  stories.value = await StoryRepository.getAll()
})
</script>