export default class Repository {
    #url = "http://localhost:8000/api/v1"

    get url() {
        return this.#url
    }
}