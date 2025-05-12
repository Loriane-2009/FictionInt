import { createWebHistory, createRouter } from 'vue-router'
import StoriesPage from "@/pages/StoriesPage.vue";
import StoryPage from "@/pages/StoryPage.vue";

const routes = [
    { path: '/', component: StoriesPage },
    { path: "/stories/:id", component: StoryPage}
]

export const router = createRouter({
    history: createWebHistory(),
    routes,
})