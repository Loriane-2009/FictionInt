import {createWebHistory, createRouter} from 'vue-router'
import StoriesPage from "@/pages/StoriesPage.vue";
import StoryPage from "@/pages/StoryPage.vue";
import LoginPage from "@/pages/LoginPage.vue";
import RegisterPage from "@/pages/RegisterPage.vue";
import CreateStoryPage from "@/pages/CreateStoryPage.vue";
import EditStoryPage from "@/pages/EditStoryPage.vue";

const routes = [
    {path: '/', component: StoriesPage, name: "stories"},
    {path: "/stories/:id", component: StoryPage},
    {path: "/login", component: LoginPage, name: "login"},
    {path: "/register", component: RegisterPage, name: "register"},
    {path: "/stories/create", component: CreateStoryPage, name: "createStory"},
    {path: "/stories/:id/edit", component: EditStoryPage, name: "editStory"},
]

export const router = createRouter({
    history: createWebHistory(),
    routes,
})