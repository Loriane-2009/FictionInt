import Repository from "./repository.js";

class StoryRepository extends Repository {
    async getAll() {
        const response = await fetch(this.url + '/stories')
        return await response.json()
    }

    async getOne(id) {
        const response = await fetch(this.url + '/stories/' + id)
        return await response.json()
    }
}
export default new StoryRepository()