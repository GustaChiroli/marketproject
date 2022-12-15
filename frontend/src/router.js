import { createRouter, createWebHistory } from 'vue-router';

import Home from './views/Home.vue';
import Login from './views/Login.vue';
import PageNotFound from './views/PageNotFound.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
    },
    {
        path: '/:pathMatch(.*)*',
        name: 'pagenotfound',
        component: PageNotFound,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;