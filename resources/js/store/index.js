import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
	strict: true,
	state: {
		api_token: null,
		UserTeams: [],
		hoodTeams: [],
		user: {}
	}, 
	getters: {
		apiToken: state => {
			return state.api_token;
		},
		getUserTeams: state => {
			return state.UserTeams
		},
		getHoodTeams: state => {
			return state.hoodTeams
		},
		getAuthenticatedUser: state => {
			return state.user
		}
	}, 
	mutations: {
		setApiToken: (state, payload) => {
			state.api_token = payload;
		},
		setUserTeams: (state, payload) => {
			state.UserTeams = payload;
		},
		setHoodTeams: (state, payload) => {
			state.hoodTeams = payload;
		},
		setCurrentUser: (state, payload) => {
			state.user = payload
		}
	}, 
	actions: {
		setApiToken: (context, payload) => {
			context.commit('setApiToken', payload);
		},
		setUserTeams: (context, payload) => {
			context.commit('setUserTeams', payload);
		},
		setHoodTeams: (context, payload) => {
			context.commit('setHoodTeams', payload)
		},
		setCurrentUser: (context, payload) => {
			context.commit('setCurrentUser', payload)
		}
	}
});