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
// Starting Routes For LostAndFound Views
const LostAndFound = () => import('@/views/AL/LostAndFound.vue');
const LostAndFoundCreate = () => import('@/views/AL/lost_and_found/Create.vue')
const LostAndFoundView = () => import('@/views/AL/lost_and_found/Index.vue');
const LostAndFoundEdit = () => import('@/views/AL/lost_and_found/Edit.vue');
// Ending Routes For LostAndFound Views

//Starting Routes For Services
const Services = () => import('@/views/AL/Services.vue');
const ServiceView = () => import('@/views/AL/service/Service.vue');
const CreateService = () => import('@/views/AL/service/Create.vue');
const EditService = () => import('@/views/AL/service/Edit.vue');
//Ending Routes For Services 
const Lelong = () => import('@/views/AL/Lelong.vue');
const Kakis = () => import('@/views/AL/Kaki.vue');
const KakiRequest = () => import('@/views/AL/KakiRequest.vue');
const KakiProfile = () => import('@/views/AL/KakiProfile.vue');
// Group Routes Starts here
const Group = () => import('@/views/AL/Group.vue');
const GroupsByCategory = () => import('@/views/AL/group/Group.vue');
const SingleGroup = () => import('@/views/AL/group/GroupView.vue');
const CreateGroup = () => import('@/views/AL/group/Create.vue');
// Group Routes Ends here

// Starting Routes For Battles
const Battles = () => import('@/views/AL/Battle.vue');
const CreateBattle = () => import('@/views/AL/battle/Create.vue');
const BattleView = () => import('@/views/AL/battle/Battle.vue');
// Ending Routes For Battles

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
		path: '/lost-and-found/create',
		name: 'LostAndFoundCreate',
		component: LostAndFoundCreate,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/lost-and-found/:id',
		name: 'LostAndFoundView',
		component: LostAndFoundView,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/lost-and-found/:id/edit',
		name: 'LostAndFoundEdit',
		component: LostAndFoundEdit,
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
		path: '/kaki/:id',
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
		path: '/interest-groups/create',
		name: 'CreateGroup',
		component: CreateGroup,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/interest_group/:id',
		name: 'SingleGroup',
		component: SingleGroup,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/interest-group/:id',
		name: 'GroupsByCategory',
		component: GroupsByCategory,
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
		path: '/services',
		name: 'Services',
		component: Services,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/service/:id',
		name: 'ServiceView',
		component: ServiceView,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/services/create',
		name: 'CreateService',
		component: CreateService,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/services/:id/edit',
		name: 'EditService',
		component: EditService,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/battles',
		name: 'Battles',
		component: Battles,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/battle/create',
		name: 'CreateBattle',
		component: CreateBattle,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/battles/:id',
		name: 'BattleView',
		component: BattleView,
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

