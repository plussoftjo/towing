require('./bootstrap');
window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import App from './App.vue';
// router setup
import routes from './routes.js'
// configure router
const router = new VueRouter({
    routes, // short for routes: routes
    scrollBehavior: (to) => {
      if (to.hash) {
        return {selector: to.hash}
      } else {
        return { x: 0, y: 0 }
      }
    }
})
const app = new Vue({
    el: '#user_request',
    render: h => h(App),
    router
});
