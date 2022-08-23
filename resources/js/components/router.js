import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        name: "home",
        component: () => import("../components/home/home.vue"),
        meta: {
            requireAuth: true,
        }
    },
    {
        path: "/register",
        name: "register",
        component: () => import("../components/auth/register.vue"),
        meta: {
            requireAuth: false,
        }
    },
    {
        path: "/login",
        name: "login",
        component: () => import("../components/auth/login.vue"),
        meta: {
            requireAuth: false,
        }
    },
    {
        path: "/users",
        name: "users",
        component: () => import("../components/users/users-list.vue"),
        meta: {
            requireAuth: true,
        }
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to, from, savedPosition) {
        return {
            x: 0,
            y: 0
        }
    }
});


router.beforeEach((to, from) => {

     if(to.meta.requireAuth && !localStorage.getItem('token')) {
         return {path: "login"}
     }

    if(to.meta.requireAuth===false && localStorage.getItem('token')) {
        return {path: "/"}
    }


})

export default router;
