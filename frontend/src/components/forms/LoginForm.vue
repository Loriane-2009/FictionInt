<template>
  <form class="backdrop-blur-lg container max-w-2xl mx-auto p-4 flex flex-col gap-4 rounded" @submit.prevent="handleSubmit">
    <p class="text-red-500" v-if="formError">{{ formError }}</p>
    <div class="flex flex-col gap-2 text-sky-100">
      <label>Adresse email</label>
      <input class="border border-sky-200 p-2" v-model="credentials.email"/>
    </div>
    <div class="flex flex-col gap-2 text-sky-100">
      <label>Mot de passe</label>
      <input class="border border-sky-200 p-2" v-model="credentials.password" type="password"/>
    </div>
    <div class="flex flex-col gap-2">
      <button
          class="bg-sky-800 hover:bg-sky-950 text-white font-bold py-2 px-4 rounded-lg text-lg transition duration-300">
        Se connecter
      </button>
    </div>
    <RouterLink class="text-end font-medium text-sky-600 hover:underline" to="/register">
      Pas encore de compte ? Créer en un ici !
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
    await router.push({name: "stories"})
  } else {
    credentials.value.password = ""
    formError.value = "Adresse email ou mot de passe incorrect."
  }
}
</script>
