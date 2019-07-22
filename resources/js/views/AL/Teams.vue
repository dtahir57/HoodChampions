<template>
	<div class="main-wrapper">
	  <section class="teams">
	    <div class="create-team-banner">
	      <div class="container">
	        <div class="row align-items-center">
			<div class="col-12">
	              <h1 class="common-h">Teams</h1>
				</div>
	          <div class="col-md-5 col-lg-4">
	            <div class="text">
	              <p>Create or join a team in your neighbourhood to share interests, resources, contacts and ideas. Start a community action team to make things better in the neighbourhood!</p>
					<img class="inner-img" src="@/images/svg/Teams.svg" alt="img">
	            </div>
				  <router-link class="btn btn-default block-btn" to="/team/create">Create Team</router-link>
	          </div>
	          <div class="col-md-5 offset-md-2 col-lg-4 offset-lg-3">
	            <img class="outer-img" src="@/images/svg/Teams.svg" width="100%" alt="img">
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
	  <section class="my-teams">
	    <div class="container">
	      <h1 class="common-h">My Teams</h1>
	      <div class="row">
	        <div class="col-lg-4 col-6 col-xs-12" v-for="(team, index) in getUserTeams">
	          <div class="team-box">
	            <div class="img-holder">
	              <img :src="team.image" class="img-fluid" alt="img">
	            </div>
	            <router-link :to="{ name: 'Team', params: {id: team.id} }">{{ team.title }}</router-link>
	            <p><i class="fal fa-user-circle"></i> {{ team.users }}</p>
	            <p>{{ team.about_us }}</p>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
	  <section class="all-teams">
	    <div class="container">
	      <h1 class="common-h">All Teams in {{ hood_name }}</h1>
	      <div class="row">
	        <div class="col-lg-3 col-md-4 col-6 col-xs-12" v-for="(team, index) in getHoodTeams">
	          <div class="team-box">
	            <div class="img-holder">
	              <img :src="team.image" class="img-fluid" alt="img">
	            </div>
	            <router-link :to="{ name: 'Team', params: {id: team.id} }">{{ team.title }}</router-link>
	            <p>{{ team.about_us }}</p>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
	</div>
</template>
<script>
import { mapGetters } from 'vuex'
import { config } from '@/config/'

export default {
	name: 'Teams',
	data () {
		return {
			user_teams: [],
			hood_name: '',
			teams: []
		}
	},
	computed: {
		...mapGetters(['getUserTeams', 'getHoodTeams'])
	},
	created () {
		let uri = '/api/teams'
		axios.get(uri, {
			headers: {
				"Accept": "application/json",
			 	"Authorization": `Bearer ${localStorage.getItem('user_api_token')}`
			 	// "Content-Type": "multipart/form-data"
			}
		}).then(response => {
			this.user_teams = response.data.user_teams
			this.$store.dispatch('setUserTeams', this.user_teams);
			this.hood_name = response.data.hood_name
			this.teams = response.data.teams
			this.$store.dispatch('setHoodTeams', this.teams)
			console.log(response.data)
		}).catch(error => {
			console.log(error.data)
		})
	}
}
</script>