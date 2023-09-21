import {createApp} from 'vue'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import {createVuetify} from "vuetify";
import '@mdi/font/css/materialdesignicons.css'
import {aliases, mdi} from 'vuetify/iconsets/mdi'
import 'vuetify/styles'
import {createPinia} from "pinia";

const app = createApp({})


const pinia = createPinia()
const vuetify = createVuetify({
    components,
    directives,
    icons: {
        defaultSet: 'mdi',
        aliases,
        sets: {
            mdi,
        },
    }
})
app.use(vuetify)
app.use(pinia)

Object.entries(import.meta.glob('./**/*.vue', {eager: true})).forEach(([path, definition]) => {
    app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
});

app.mount('#app')