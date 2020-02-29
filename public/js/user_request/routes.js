import Main from './screens/Main.vue';
import Company from './screens/Company.vue';
import Terms from './screens/Terms.vue'
import Privacy from './screens/Privacy'
const routes = [
    {
        path: '/',
        component: Main,
    },
    {path:'/company',component:Company},
    {path:'/terms',component:Terms},
    {path:'/privacy',component:Privacy},
    {path:'*',component:Main}
    
];

export default routes;
