<template>
  <form
      class="backdrop-blur-lg container max-w-2xl mx-auto p-4 flex flex-col gap-4 rounded"
      @submit.prevent="handleSubmit">
    <div class="flex flex-col gap-2 text-sky-100">
      <FormError :errors="formErrors" name="name"/>
      <label>Nom</label>
      <input
          class="border border-sky-200 p-2"
          type="text"
          v-model="formData.name"
      />
    </div>
    <div class="flex flex-col gap-2 text-sky-100">
      <FormError :errors="formErrors" name="email"/>
      <label>Adresse email</label>
      <input
          class="border border-sky-200 p-2"
          type="email"
          v-model="formData.email"
      />
    </div>
    <div class="flex flex-col gap-2 text-sky-100">
      <FormError :errors="formErrors" name="password"/>
      <label>Mote de passe</label>
      <input
          class="border border-sky-200 p-2"
          v-model="formData.password"
          type="password"
      />
    </div>
    <div class="flex flex-col gap-2 text-sky-100">
      <FormError :errors="formErrors" name="password_confirmation"/>
      <label>Confirmer le mot de passe</label>
      <input
          class="border border-sky-200 p-2"
          v-model="formData.password_confirmation"
          type="password"
      />
    </div>
    <div class="flex flex-col gap-2 text-sky-100 ">
      <button
          class="bg-sky-800 hover:bg-sky-950 text-white font-bold py-2 px-4 rounded-lg text-lg transition duration-300">
        S'inscrire
      </button>
    </div>
    <RouterLink class="text-end font-medium text-sky-600 hover:underline" to="/login">
      Déjà un compte ? Connecte toi ici !
    </RouterLink>
  </form>
</template>
<script setup>
import {ref} from "vue";
import UserRepository from "@/repositories/userRepository.js";
import FormError from "@/components/FormError.vue";
import {useAuth} from "@/hooks/useAuth.js";
import {useRouter} from "vue-router";

const formData = ref({
  name: "",
  email: "",
  password: "",
  password_confirmation: ""
})

const formErrors = ref({})
const {login} = useAuth()
const router = useRouter()

const handleSubmit = async () => {
  try {
    await UserRepository.register(formData.value)
    if (await login({email: formData.value.email, password: formData.value.password})) {
      await router.push({name: "stories"})
    }
  } catch (e) {
    formErrors.value = e.errors
  }
}
</script>