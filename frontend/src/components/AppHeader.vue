<template>
  <div class="w-full bg-white">
    <div class="container mx-auto p-2 flex justify-between items-center">
      <RouterLink to="/" class="text-2xl font-semibold">
        Fiction
      </RouterLink>
      <button
          v-if="isAuthenticated"
          class="p-2 rounded bg-sky-800 text-white"
          @click="() => logout()"
      >
        Se déconnecter ({{user.name}})
      </button>
      <button
          v-else
          class="p-2 rounded bg-sky-800 text-white"
          @click="() => router.push({ name: 'login'})"
      >
        Se connecter
      </button>
    </div>
  </div>
</template>
<script setup>
import {useAuth} from "@/hooks/useAuth.js";
import {useRouter} from "vue-router";

const {user, isAuthenticated, logout} = useAuth()
const router = useRouter()
</script>