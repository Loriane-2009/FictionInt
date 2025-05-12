import { createMemoryHistory, createRouter } from 'vue-router'
import StoryPage from "../pages/StoryPage.vue";

const routes = [
    { path: '/', component: StoryPage },
]

export const router = createRouter({
    history: createMemoryHistory(),
    routes,
})