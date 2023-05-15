import { createWebHistory, createRouter } from "vue-router";
import PageNew from './components/PageNew';

const routes = [
    {
        path: "/:id",
        name: "PageNew",
        component: PageNew,
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
