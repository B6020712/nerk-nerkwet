const routes = [
    { path: "/login", name: "login", component: () => import('@/pages/Login.vue'), meta: { middleware: "guest", title: `Nerk | Login` } },
    { path: "/register", name: "register", component: () => import('@/pages/Register.vue'), meta: { middleware: "guest", title: `Nerk | Register` } },

    { path: "/", name: "dashboard", component: () => import('@/pages/Dashboard.vue'), meta: { title: `Nerk | home` } },
]

export default routes