import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/carroCompra',
      name: 'carro',
      component: () => import('../views/CompraView.vue')
    },
    {
      path: '/articulo/:id',
      name:'articulo',
      component: () => import('../views/ArticuloView.vue')
    },
    {
      path: '/noArticulo',
      name: 'noArticulo',
      component: () => import('../views/ArticuloNotFoundView.vue')
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    },
    {
      path: "/:pathMatch(.*)*",
      name: "NotFound",
      component: () => import("../views/NotFoundView.vue"),
    }
  ]
})

export default router
