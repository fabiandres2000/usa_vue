import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
    mode: 'hash',
    base: process.env.BASE_URL,
    routes: [
        {
            path: '/',
            name: 'Index',
            component: () => import ('@/layouts/Login')
        },
        {   
            path: '/admin',
            component: () => import('@/layouts/Layout'),
            redirect: "/admin/dashboard/basic-dashboard",
            children: [
                // Components
                {
                    name: 'Alerts',
                    path: '/admin/pages/alerts',
                    component: () => import('@/views/pages/Alerts'),
                },

                {
                    name: 'Profile',
                    path: '/admin/pages/profile',
                    component: () => import('@/views/pages/Profile'),
                },

                {
                    name: 'Icons',
                    path: '/admin/pages/icons',
                    component: () => import('@/views/pages/Icons'),
                },

                {
                    name: 'TableSimple',
                    path: '/admin/pages/tables-simple',
                    component: () => import('@/views/pages/TableSimple'),
                },

                {
                    name: 'Dashboard',
                    path: '/admin/dashboard/basic-dashboard',
                    component: () => import('@/views/dashboard/BasicDashboard'),
                },

            ]
        },
    ],
})