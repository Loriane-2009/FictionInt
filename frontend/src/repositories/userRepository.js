import Repository from "@/repositories/repository.js";
import {FormException} from "@/exceptions/formException.js";

class UserRepository extends Repository {
    async login(credentials) {
        const response = await fetch(this.url + "/login", {
            method: "POST",
            body: JSON.stringify(credentials),
            headers: this.getHeader()
        })

        if (!response.ok) {
            return null
        }
        return await response.json()
    }

    async register(formData) {
        const response = await fetch(this.url + "/register", {
            method: "POST",
            body: JSON.stringify(formData),
            headers: this.getHeader()
        })

        if (!response.ok) {
            const data = await response.json();
            throw new FormException(data.errors);
        }

        return await response.json()
    }

    async logout() {
        const response = await fetch(this.url + "/logout", {
            method: "DELETE",
            headers: this.getHeader()
        })
        return response.ok
    }
}

export default new UserRepository()