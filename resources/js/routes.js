import {createRouter, createWebHistory} from 'vue-router';


const routes = [
    { path: '/', name: 'contact.index', component:() => import ("./components/Contact/IndexComponent.vue") },
    { path: '/new', name: 'contact.new', component:() => import ("./components/Contact/CreateComponent.vue") },
    { path: '/contact/:id/edit', name: 'contact.edit', component:() => import ("./components/Contact/EditComponent.vue") },
    { path: '/contact/:id', name: 'contact.show', component:() => import ("./components/Contact/ShowComponent.vue") },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
