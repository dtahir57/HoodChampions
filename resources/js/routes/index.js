import Vue from 'vue'
import VueRouter from 'vue-router'

const Home = () => import('@/views/BL/home.vue');
const About = () => import('@/views/BL/About.vue');
const Login = () => import('@/views/Login.vue');
const Register = () => import('@/views/Register.vue');

Vue.use(VueRouter);

const routes = [
	{
		path: '/',
		name: 'Home',
		component: Home
	},
	{
		path: '/about',
		name: 'About',
		component: About
	},
	{
		path: '/Login',
		name: 'Login',
		component: Login
	},
	{
		path: '/Register',
		name: 'Register',
		component: Register
	}
];

let router = new VueRouter({
	mode: 'history', 
	routes: routes
});

export default router;

