import Repository from "@/repositories/repository.js";

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

    async logout() {
        const response = await fetch(this.url + "/logout", {
            method: "DELETE",
            headers: this.getHeader()
        })
        return response.ok
    }
}

export default new UserRepository()