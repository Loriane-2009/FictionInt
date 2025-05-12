<template>
  <form class="container max-w-2xl mx-auto bg-white p-4 flex flex-col gap-4 rounded" @submit.prevent="handleSubmit">
    <p class="text-red-500" v-if="formError">{{ formError }}</p>
    <div class="flex flex-col gap-2">
      <label>Adresse email</label>
      <input class="border border-gray-100 p-2" v-model="credentials.email"/>
    </div>
    <div class="flex flex-col gap-2">
      <label>Mot de passe</label>
      <input class="border border-gray-100 p-2" v-model="credentials.password" type="password"/>
    </div>
    <div class="flex flex-col gap-2">
      <button
          class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg text-lg transition duration-300">
        Se connecter
      </button>
    </div>
    <RouterLink class="text-end font-medium text-blue-600 dark:text-blue-500 hover:underline" to="/register">
      Page encore de compte ? Créer en un ici !
    </RouterLink>
  </form>
</template>
<script setup>
import {ref} from "vue";
import {useRouter} from "vue-router"
import {useAuth} from "@/hooks/useAuth.js";

const {login} = useAuth()
const credentials = ref({email: "", password: ""})
const formError = ref("")
const router = useRouter();

const handleSubmit = async () => {
  if (await login(credentials.value)) {
    router.push({name: "stories"})
  } else {
    credentials.value.password = ""
    formError.value = "Adresse email ou mot de passe incorrect."
  }
}
</script>
