import { createRouter, createWebHistory } from 'vue-router';
import Landing from '../components/Landing.vue';

const routes = [
    {
        path: '/',
        name: 'landing',
        component: Landing,
        meta: {
            requiresLayout: false // No menu for landing page
        }
    },
    {
        path: '/lounge',
        name: 'lounge',
        component: () => import('../components/Lounge.vue')
    },
    {
        path: '/:pathMatch(.*)*',
        redirect: '/'
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;