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
            name: 'admin',
            component: () => import('@/layouts/Layout'),
            redirect: "/admin/dashboard/basic-dashboard",
            children: [
                // Components
                {
                    name: 'RegistroPractica',
                    path: '/admin/registro-practica',
                    component: () => import('@/views/estudiante/registro_practica'),
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

                {
                    name: 'AsignarPermiso',
                    path: '/admin/asignar-permiso',
                    component: () => import('@/views/decanatura/asignarPermiso'),
                },

                {
                    name: 'Convenios',
                    path: '/practicas/convenios',
                    component: () => import('@/views/practicas/convenios'),
                },

                {
                    name: 'Tutores USA',
                    path: '/practicas/tutor-usa',
                    component: () => import('@/views/practicas/tutor_usa'),
                },

                {
                    name: 'Tutores SP',
                    path: '/practicas/tutor-sp',
                    component: () => import('@/views/practicas/tutor_sp'),
                },

                {
                    name: 'Asignaciones',
                    path: '/practicas/asignaciones',
                    component: () => import('@/views/practicas/AdminAsignaciones'),
                },

                {
                    name: 'Caracterizacion',
                    path: '/estudiante/caracterizacion',
                    component: () => import('@/views/estudiante/caracterizacion'),
                },

                {
                    name: 'Personalidad',
                    path: '/estudiante/test-personalidad',
                    component: () => import('@/views/estudiante/personalidad'),
                },
            ]
        },
    ],
})