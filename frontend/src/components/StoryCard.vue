<template>
  <div class="bg-white shadow-md max-w-2xl w-full rounded-lg p-6 flex flex-col items-center transition hover:shadow-xl">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">{{ story.title }}</h2>
    <p class="text-gray-600 text-center mb-6">{{ story.description }}</p>
    <router-link
        :to="`/stories/${story.id}`"
        @click="handleClick"
        class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-lg text-lg transition duration-300"
    >
      <span v-if="!progression">Commencer l'histoire</span>
      <span v-else-if="progression.completed">Recommancer</span>
      <span v-else>Continuer</span>
    </router-link>
  </div>
</template>
<script setup>
import {onMounted, ref} from "vue";
import {useStoryProgression} from "@/hooks/useStoryProgression.js";

const {story} = defineProps(['story'])
const {getStoryProgression, setStoryProgression} = useStoryProgression()

const progression = ref(null)

const handleClick = () => {
  if(progression.value && progression.value.completed) {
    setStoryProgression(story.id, null)
  }
}

onMounted(() => {
  progression.value = getStoryProgression(story.id)
})
</script>