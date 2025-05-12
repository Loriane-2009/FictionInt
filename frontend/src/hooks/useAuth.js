import {computed, ref} from "vue";
import UserRepository from "@/repositories/userRepository.js";

const authenticatedUser = ref();

const isAuthenticated = computed(() => !!authenticatedUser.value?.token);
const token = computed(() => authenticatedUser.value?.token);
const user = computed(() => authenticatedUser.value?.user);

const login = async (credentials) => {
    const user = await UserRepository.login(credentials);
    if (user) {
        authenticatedUser.value = user;
        localStorage.setItem("user", JSON.stringify(user));
        return true;
    }
    return false;
};

const logout = async () => {
    await UserRepository.logout();
    authenticatedUser.value = undefined;
    localStorage.removeItem("user");
};

const initialize = () => {
    const stored = localStorage.getItem("user");
    try {
        if (stored) {
            authenticatedUser.value = JSON.parse(stored);
        }
    } catch (e) {
        localStorage.removeItem("user");
    }
};

initialize();

export function useAuth() {
    return {token, isAuthenticated, user, login, logout};
}
