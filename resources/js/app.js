import './bootstrap';

import {createApp} from 'vue';
import "../scss/app.scss"
import App from './App.vue'
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"
import routes from './routes';
import {createRouter, createWebHistory} from 'vue-router'

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = createRouter({
    // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
    history: createWebHistory(),
    routes,
})

createApp(App).use(router).mount("#app")
