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
const SingleTeam = () => import('@/views/AL/team/Team.vue');
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
			requiresAuth: true
		}
	},
	{
		path: '/start-activity',
		name: 'Activity',
		component: Activity,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/explore',
		name: 'Explore',
		component: Explore,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/lost-and-found',
		name: 'LostAndFound',
		component: LostAndFound,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/lelong',
		name: 'Lelong',
		component: Lelong,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/kakis',
		name: 'Kakis',
		component: Kakis,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/kaki-request',
		name: 'KakiRequest',
		component: KakiRequest,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/kaki-profile',
		name: 'KakiProfile',
		component: KakiProfile,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/interest-groups',
		name: 'Group',
		component: Group,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/interest-group',
		name: 'SingleGroup',
		component: SingleGroup,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/team/create',
		name: 'CreateTeam',
		component: TeamCreate,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/team/:id',
		name: 'Team',
		component: SingleTeam,
		meta: {
			requiresAuth: true
		}
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

router.beforeEach((to, from, next) => {
  if(to.matched.some(record => record.meta.requiresAuth)) {
    if (localStorage.getItem('user_api_token')) {
      next()
      return
    }
    next('/Login') 
  } else {
    next()
  }
})

export default router;

