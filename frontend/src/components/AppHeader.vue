<template>
  <div class="w-full bg-white">
    <div class="container mx-auto p-2 flex justify-between items-center">
      <div v-if="isAuthenticated">
        {{ user.name }}
      </div>
      <button
          v-if="isAuthenticated"
          class="p-2 rounded bg-blue-500 text-white"
          @click="() => logout()"
      >
        Se déconnecter
      </button>
      <button
          v-else
          class="p-2 rounded bg-blue-500 text-white"
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