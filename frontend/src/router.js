import { createRouter, createWebHistory } from 'vue-router';

import Home from './views/Home.vue';
import Login from './views/Login.vue';
import PageNotFound from './views/PageNotFound.vue';
import Dashboard from './views/Dashboard.vue';
import Sales from './views/Sales.vue';
import Stock from './views/Stock.vue';

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
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard,
    },
    {
        path: '/sales',
        name: 'sales',
        component: Sales,
    },
    {
        path: '/stock',
        name: 'stock',
        component: Stock,
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