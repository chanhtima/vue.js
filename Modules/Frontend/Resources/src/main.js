import './assets/'

import { createApp } from 'vue'
import { createPinia } from 'pinia'


import App from './App.vue'
import router from './router'


const app = createApp(App)


import PageHeader from './layouts/PageHeader.vue'
import PageFooter from './layouts/PageFooter.vue'
import TextEditor from './components/texteditor/TextEditor.vue'
app.component('PageHeader',PageHeader)
.component('TextEditor',TextEditor)
.component('PageFooter',PageFooter)


app.use(createPinia())
app.use(router)

app.mount('#app')
