<template>
  <div class="size-full">
    <h1 class="text-4xl font-bold text-center text-indigo-700 mb-4">Connexion</h1>
    <LoginForm/>
  </div>
</template>
<script setup>
import {onMounted} from "vue";
import {useRouter} from "vue-router"
import {useAuth} from "@/hooks/useAuth.js";
import LoginForm from "@/components/forms/LoginForm.vue";

const {isAuthenticated} = useAuth()
const router = useRouter();
onMounted(() => {
  if (isAuthenticated.value) {
    router.push({name: "stories"})
  }
})
</script>