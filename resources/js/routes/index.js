import Vue from 'vue'
import VueRouter from 'vue-router'

const Home = () => import('@/views/BL/home.vue');
const About = () => import('@/views/BL/About.vue');
const Login = () => import('@/views/Login.vue');
const Register = () => import('@/views/Register.vue');
const Terms = () => import('@/views/Terms.vue');

const Teams = () => import('@/views/AL/Teams.vue');
const Activity = () => import('@/views/AL/Activity.vue');
const Explore = () => import('@/views/AL/Explore.vue');
const LostAndFound = () => import('@/views/AL/LostAndFound.vue');
const Lelong = () => import('@/views/AL/Lelong.vue');
const Kakis = () => import('@/views/AL/Kaki.vue');
const KakiRequest = () => import('@/views/AL/KakiRequest.vue');
const KakiProfile = () => import('@/views/AL/KakiProfile.vue');

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
	},
	{
		path: '/terms-and-use',
		name: 'Terms',
		component: Terms
	},
	{
		path: '/teams',
		name: 'Teams',
		component: Teams
	},
	{
		path: '/start-activity',
		name: 'Activity',
		component: Activity
	},
	{
		path: '/explore',
		name: 'Explore',
		component: Explore
	},
	{
		path: '/lost-and-found',
		name: 'LostAndFound',
		component: LostAndFound
	},
	{
		path: '/lelong',
		name: 'Lelong',
		component: Lelong
	},
	{
		path: '/kakis',
		name: 'Kakis',
		component: Kakis
	},
	{
		path: '/kaki-request',
		name: 'KakiRequest',
		component: KakiRequest
	},
	{
		path: '/kaki-profile',
		name: 'KakiProfile',
		component: KakiProfile
	}
];

let router = new VueRouter({
	mode: 'history', 
	routes: routes
});

export default router;

