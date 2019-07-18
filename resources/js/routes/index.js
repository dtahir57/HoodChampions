import Vue from 'vue'
import VueRouter from 'vue-router'

import log from '@/middleware/log'
import auth from '@/middleware/auth'

const Home = () => import('@/views/BL/home.vue');
const About = () => import('@/views/BL/About.vue');
const Login = () => import('@/views/Login.vue');
const Register = () => import('@/views/Register.vue');
const Terms = () => import('@/views/Terms.vue');
const VerifyOTP = () => import('@/views/OTP.vue');

// Team Components Starts
const Teams = () => import('@/views/AL/Teams.vue');
const TeamCreate = () => import('@/views/AL/team/Create.vue');
// Team Components Ends here
const Activity = () => import('@/views/AL/Activity.vue');
const Explore = () => import('@/views/AL/Explore.vue');
const LostAndFound = () => import('@/views/AL/LostAndFound.vue');
const Lelong = () => import('@/views/AL/Lelong.vue');
const Kakis = () => import('@/views/AL/Kaki.vue');
const KakiRequest = () => import('@/views/AL/KakiRequest.vue');
const KakiProfile = () => import('@/views/AL/KakiProfile.vue');
const Group = () => import('@/views/AL/Group.vue');
const SingleGroup = () => import('@/views/AL/group/Group.vue');

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
		component: Register,
	},
	{
		path: '/terms-and-use',
		name: 'Terms',
		component: Terms
	},
	{
		path: '/teams',
		name: 'Teams',
		component: Teams,
		meta: {
			middleware: [
				auth
			]
		}
	},
	{
		path: '/start-activity',
		name: 'Activity',
		component: Activity,
		meta: {
			middleware: [
				auth
			]
		}
	},
	{
		path: '/explore',
		name: 'Explore',
		component: Explore,
		meta: {
			middleware: [
				auth
			]
		}
	},
	{
		path: '/lost-and-found',
		name: 'LostAndFound',
		component: LostAndFound,
		meta: {
			middleware: [
				auth
			]
		}
	},
	{
		path: '/lelong',
		name: 'Lelong',
		component: Lelong,
		meta: {
			middleware: [
				auth
			]
		}
	},
	{
		path: '/kakis',
		name: 'Kakis',
		component: Kakis,
		meta: {
			middleware: [
				auth
			]
		}
	},
	{
		path: '/kaki-request',
		name: 'KakiRequest',
		component: KakiRequest,
		meta: {
			middleware: [
				auth
			]
		}
	},
	{
		path: '/kaki-profile',
		name: 'KakiProfile',
		component: KakiProfile,
		meta: {
			middleware: [
				auth
			]
		}
	},
	{
		path: '/interest-groups',
		name: 'Group',
		component: Group,
		meta: {
			middleware: [
				auth
			]
		}
	},
	{
		path: '/interest-group',
		name: 'SingleGroup',
		component: SingleGroup,
		meta: {
			middleware: [
				auth
			]
		}
	},
	{
		path: '/team/create',
		name: 'CreateTeam',
		component: TeamCreate
	},
	{
		path: '/verify/:id',
		name: 'OTP',
		component: VerifyOTP
	}
];

let router = new VueRouter({
	mode: 'history', 
	routes: routes
});

export default router;

