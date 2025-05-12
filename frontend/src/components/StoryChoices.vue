<script setup>
const {choices} = defineProps(['choices'])
const emit = defineEmits(['click'])
</script>
<template>
  <div class="pt-6">
    <h2 class="text-2xl font-semibold text-center text-indigo-500 mb-6">Que veux-tu faire ?</h2>
    <div class="flex flex-col items-center space-y-4">
      <button
          v-for="choice in choices"
          :key="choice.id"
          @click="() => emit('click', choice.next_chapter_id)"
          class="w-full sm:w-2/3 md:w-1/2 bg-indigo-500 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300"
      >
        {{ choice.choice_text }}
      </button>
    </div>
  </div>
</template>
