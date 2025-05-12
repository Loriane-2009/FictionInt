import { createWebHistory, createRouter } from 'vue-router'
import StoriesPage from "@/pages/StoriesPage.vue";
import StoryPage from "@/pages/StoryPage.vue";
import LoginPage from "@/pages/LoginPage.vue";
import RegisterPage from "@/pages/RegisterPage.vue";
import CreateStoryPage from "@/pages/CreateStoryPage.vue";

const routes = [
    { path: '/', component: StoriesPage, name: "stories" },
    { path: "/stories/:id", component: StoryPage },
    { path: "/login", component: LoginPage, name: "login"},
    { path: "/register", component: RegisterPage, name: "register"},
    { path: "/story/create", component: CreateStoryPage, name: "createStory"},
]

export const router = createRouter({
    history: createWebHistory(),
    routes,
})