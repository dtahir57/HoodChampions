<template>
	<div class="main-wrapper">
	  <profile :user="user" :groups="groups" :teams="teams" :battles="battles"></profile>
	</div>
</template>
<script>
import Profile from '@/components/AL/Profile.vue'

export default {
	name: 'KakiProfile',
	components: {
		'profile': Profile
	},
	data () {
		return {
			user: {},
			groups: [],
			teams: [],
			battles: []
		}
	},
	created () {
		let uri = `/api/user/details/${this.$route.params.id}`
		axios.get(uri, {
			headers: {
				"Accept": "application/json",
			 	"Authorization": `Bearer ${localStorage.getItem('user_api_token')}`
			}
		}).then(response => {
			this.user = response.data.user
			this.groups = response.data.groups
			this.teams = response.data.teams
			this.battles = response.data.battles
			console.log(response.data)
		}).catch(error => {
			console.log(error.response)
		})
	}
}
</script>