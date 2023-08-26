import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../views/HomeView.vue')
    },
    {
      path: '/about',
      name: 'about',
      component: () => import('../views/AboutView.vue')
    },
    {
      path: '/contact',
      name: 'contact',
      component: () => import('../views/ContactView.vue')
    },
    {
      path: '/news-event',
      name: 'news-event',
      component: () => import('../views/NewsEventView.vue')
    },
    {
      path: '/news-event-detail',
      name: 'news-event-detail',
      component: () => import('../views/NewsEventDetail.vue')
    },
    {
      path: '/product',
      name: 'product',
      component: () => import('../views/ProductView.vue')
    },
    {
      path: '/product-detail',
      name: 'product-detail',
      component: () => import('../views/ProductDetail.vue')
    },
    {
      path: '/policy',
      name: 'policy',
      component: () => import('../views/PolicyView.vue')
    },
  ]
})

export default router
 