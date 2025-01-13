import { createWebHistory, createRouter } from 'vue-router'
import store from '@/store'

/* Guest Component */
const Login = () => import('@/components/Login.vue')
const Register = () => import('@/components/Register.vue')
/* Guest Component */
/* Layouts */
const DashboardLayout = () => import('@/components/layouts/Default.vue')
/* Layouts */
/* Authenticated Component */
const Dashboard = () => import('@/components/Dashboard.vue')
const Cliente = () => import('@/components/Cliente.vue')
const ClienteForm = () => import('@/components/ClienteForm.vue')
const Cobranca = () => import('@/components/Cobranca.vue')
const CobrancaForm = () => import('@/components/CobrancaForm.vue')
/* Authenticated Component */
const routes = [
    {
        name: "login",
        path: "/login",
        component: Login,
        meta: {
            middleware: "guest",
            title: `Login`
        }
    },
    {
        name: "register",
        path: "/register",
        component: Register,
        meta: {
            middleware: "guest",
            title: `Register`
        }
    },
    {
        path: "/",
        component: DashboardLayout,
        meta: {
            middleware: "auth"
        },
        children: [
            {
                name: "dashboard",
                path: '/',
                component: Dashboard,
                meta: {
                    title: `Dashboard`
                }
            },
            {
                name: "cliente",
                path: '/cliente',
                component: Cliente,
                meta: {
                    title: `Cliente`
                }
            },
            {
                name: "cliente_novo",
                path: '/cliente/novo',
                component: ClienteForm,
                meta: {
                    title: `Cliente Novo`
                }
            },                    
            {
                name: "cobranca",
                path: '/cobranca',
                component: Cobranca,
                meta: {
                    title: `Cobranca`
                }
            },            
            {
                name: "cobranca_novo",
                path: '/cobranca/novo',
                component: CobrancaForm,
                meta: {
                    title: `Cobranca Nova`
                }
            }                          
        ]
    }
]
const router = createRouter({
    history: createWebHistory(),
    routes, // short for `routes: routes`
})
router.beforeEach((to, from, next) => {
    document.title = to.meta.title
    if (to.meta.middleware == "guest") {
        if (store.state.auth.authenticated) {
            next({ name: "dashboard" })
        }
        next()
    } else {
        if (store.state.auth.authenticated) {
            next()
        } else {
            next({ name: "login" })
        }
    }
})
export default router