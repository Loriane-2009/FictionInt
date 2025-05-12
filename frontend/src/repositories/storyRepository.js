import Repository from "./repository.js";
import {FormException} from "@/exceptions/formException.js";

class StoryRepository extends Repository {
    async getAll() {
        const response = await fetch(this.url + '/stories', {
            headers: this.getHeader()
        })
        return await response.json()
    }

    async getOne(id) {
        const response = await fetch(this.url + '/stories/' + id, {
            headers: this.getHeader()
        })
        return await response.json()
    }

    async create(story) {
        const response = await fetch(this.url + '/stories/', {
            headers: this.getHeader(),
            body: JSON.stringify(story),
            method: "POST"
        })

        if(!response.ok) {
            const data = await response.json();
            throw new FormException(data.errors);
        }

        return await response.json()
    }

    async destroy(id) {
        const response = await fetch(this.url + '/stories/' + id, {
            headers: this.getHeader(),
            method: "DELETE"
        })
        return response.ok
    }
}
export default new StoryRepository()