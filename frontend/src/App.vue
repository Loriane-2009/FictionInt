<template>
  <div class="h-screen w-full app-background grid grid-rows-[auto_1fr]">
    <AppHeader/>
    <div class="overflow-y-scroll">
      <RouterView/>
    </div>
  </div>
</template>
<script setup>
import AppHeader from "@/components/AppHeader.vue";
</script>
