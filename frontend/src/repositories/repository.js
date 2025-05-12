export default class Repository {
    #url = "http://localhost:8000/api/v1"

    get url() {
        return this.#url
    }

    getHeader() {
        const user = localStorage.getItem('user')
        let token = null

        if(user) {
            token = JSON.parse(user)?.token
        }

        return {
            authorization: "Bearer " + token,
            "Content-Type": "application/json",
            "accept": "application/json"
        }
    }
}