<template>
  <div class="h-screen w-full bg-fixed bg-cover bg-center app-background">
    <div class="h-screen w-full grid grid-rows-[auto_1fr]">
      <AppHeader/>
      <div class="overflow-y-scroll">
        <RouterView/>
      </div>
    </div>
  </div>
</template>
<style>
.app-background {
  background-image: url('@/assets/background.jpg');
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
}
</style>
<script setup>
import AppHeader from "@/components/AppHeader.vue";
</script>
