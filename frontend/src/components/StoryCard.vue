<template>
  <div
      class="backdrop-blur-lg shadow-md max-w-2xl w-full rounded-lg p-6 flex flex-col items-center transition hover:shadow-xl relative">
    <h2 class="text-2xl font-semibold text-sky-100 mb-4">{{ story.title }}</h2>
    <p class="text-sky-200 text-center mb-6">{{ story.description }}</p>
    <router-link
        :to="`/stories/${story.id}`"
        @click="handleClick"
        class="bg-sky-800 hover:bg-sky-950 text-white font-bold py-3 px-6 rounded-lg text-lg transition duration-300"
    >
      <span v-if="!progression">Commencer l'histoire</span>
      <span v-else-if="progression.completed">Recommencer</span>
      <span v-else>Continuer</span>
    </router-link>
    <div v-if="isAuthenticated" class="flex gap-4 absolute bottom-2 right-2">
      <button
          class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold p-1 rounded-lg text-lg transition duration-300"
          @click="() => router.push({ name: 'editStory', params: { id: story.id }})"
      >
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
             class="lucide lucide-pen-icon lucide-pen">
          <path
              d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
        </svg>
      </button>
      <button
          @click="handleDelete"
          class="bg-red-500 hover:bg-red-700 text-white font-bold p-1 rounded-lg text-lg transition duration-300"
      >
        <svg width="25px" height="25px" fill="currentColor" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
          <path d="M20 18h2v16h-2z"/>
          <path d="M24 18h2v16h-2z"/>
          <path d="M28 18h2v16h-2z"/>
          <path d="M12 12h26v2H12z"/>
          <path d="M30 12h-2v-1c0-.6-.4-1-1-1h-4c-.6 0-1 .4-1 1v1h-2v-1c0-1.7 1.3-3 3-3h4c1.7 0 3 1.3 3 3v1z"/>
          <path
              d="M31 40H19c-1.6 0-3-1.3-3.2-2.9l-1.8-24 2-.2 1.8 24c0 .6.6 1.1 1.2 1.1h12c.6 0 1.1-.5 1.2-1.1l1.8-24 2 .2-1.8 24C34 38.7 32.6 40 31 40z"/>
        </svg>
      </button>
    </div>
  </div>
</template>
<script setup>
import {onMounted, ref} from "vue";
import {useStoryProgression} from "@/hooks/useStoryProgression.js";
import {useAuth} from "@/hooks/useAuth.js";
import {router} from "@/router/routes.js";

const {story} = defineProps(['story'])
const emit = defineEmits(['delete'])
const {isAuthenticated} = useAuth()
const {getStoryProgression, setStoryProgression} = useStoryProgression()

const progression = ref(null)

const handleClick = () => {
  if (progression.value && progression.value.completed) {
    setStoryProgression(story.id, null)
  }
}

const handleDelete = async () => {
  emit('delete', story.id)
}

onMounted(() => {
  progression.value = getStoryProgression(story.id)
})
</script>