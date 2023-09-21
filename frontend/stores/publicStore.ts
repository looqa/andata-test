import {defineStore} from "pinia";


export const usePublicStore = defineStore('public', {
    state:() => ({
        pageTitle: ''
    }),
    actions: {
        setPageTitle(title: string) {
            this.pageTitle = title
        }
    }
})