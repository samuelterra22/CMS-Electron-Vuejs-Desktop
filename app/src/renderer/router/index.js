import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'pages',
      component: require('@/components/Pages').default
    },
    {
      path: '*',
      redirect: '/'
    }
  ]
})
