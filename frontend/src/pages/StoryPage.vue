<template>
  <div class="size-full app-background flex items-center justify-center">
    <div v-if="chapter" class="bg-white p-4 rounded-lg w-full max-w-2xl">
      <h1 class="text-4xl font-extrabold text-center text-indigo-700">{{ chapter.title }}</h1>
      <p class="text-lg text-gray-700 leading-relaxed text-justify">
        {{ chapter.content }}
      </p>
      <StoryChoices
          v-if="chapter.choices.length > 0"
          :choices="chapter.choices"
          @click="id => goToNextChapter(id)"
      />
      <EndOfStory v-else/>
    </div>
  </div>
</template>
<script setup>
import {onMounted, ref} from "vue";
import {useRoute} from "vue-router"
import StoryRepository from "@/repositories/storyRepository.js";
import EndOfStory from "@/components/EndOfStory.vue";
import StoryChoices from "@/components/StoryChoices.vue";
import {useStoryProgression} from "@/hooks/useStoryProgression.js";

const route = useRoute()
const {setStoryProgression, getStoryProgression} = useStoryProgression()

const story = ref()
const chapter = ref()

const goToNextChapter = (id) => {
  chapter.value = story.value.chapters.find(chapter => chapter.id === id)
  setStoryProgression(story.value.id, id, chapter.value.choices.length === 0)
}

onMounted(async () => {
  story.value = await StoryRepository.getOne(route.params.id)
  const progression = getStoryProgression(story.value.id)
  chapter.value = progression && progression.chapterId ?
      story.value.chapters.find(chapter => chapter.id === progression?.chapterId) :
      story.value.chapters[0]
})
</script>