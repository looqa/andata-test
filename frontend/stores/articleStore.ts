import {defineStore} from "pinia";


export const useArticleStore = defineStore('article', {
    state: () => ({
        article: null
    }),
    getters: {
        comments: (state) => state.article?.comments
    },
    actions: {
        set(article: object) {
            this.article = article
        },
        async sendComment(props: object) {
            const url = `/api/articles/${this.article.id}/comments`
            try {
                const resp = await fetch(url, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(props)
                })
                if (!resp.ok) {
                    let error = await resp.json()
                    alert(error.error)
                    return
                }
                const result = await resp.json()
                this.article.comments.push(result)
            } catch (err) {
                alert('Произошла ошибка при добавлении комментария.')
                console.error(err)
            }
        }
    }
})