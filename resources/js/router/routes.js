import DefaultLayouts from '@/layouts/Default.vue'

const routes = [
    { path: "/login"    , name: "login"     , component: () => import('@/pages/Login.vue')      , meta: { middleware: "guest", title: `Nerk | Login`    , layouts: ''} },
    { path: "/register" , name: "register"  , component: () => import('@/pages/Register.vue')   , meta: { middleware: "guest", title: `Nerk | Register` , layouts: ''} },

    { path: "/"         , name: "dashboard" , component: () => import('@/pages/Dashboard.vue')  , meta: {                      title: `Nerk | home`     , layouts: DefaultLayouts} },
]

export default routes