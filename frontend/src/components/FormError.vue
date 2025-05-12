<template>
  <p class="text-red-500" v-if="errors?.[name]?.[0]">{{errors[name][0]}}</p>
</template>
<script setup>
  const {errors, name} = defineProps(['errors', 'name'])
</script>