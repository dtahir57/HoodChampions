<template>
	<div class="main-wrapper">
		<section class="teams">
		  <div class="create-team-banner">
		    <div class="container">
		      <div class="row align-items-center">
		        <div class="col-md-5 col-lg-4">
		          <div class="text">
		            <h1 class="common-h">Lost And Found</h1>
		            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam quibusdam amet cupiditate accusamus necessitatibus ipsam neque voluptatibus, quaerat quod non!</p>
		            <router-link class="btn btn-default block-btn" to="/services/create">Create Lost And Found</router-link>
		          </div>
		        </div>
		        <div class="col-md-5 offset-md-2 col-lg-4 offset-lg-3">
		          <img src="@/images/svg/Teams.svg" width="100%" alt="img">
		        </div>
		      </div>
		    </div>
		  </div>
		</section>
		<section class="join-team">
		  <div class="container">
		    <div class="row">
		      <div class="col-md-6">
		        <div class="img-holder">
		          <img :src="lost_and_found.image" alt="img">
		        </div>
		      </div>
		      <div class="col-md-6 col-lg-5 offset-lg-1">
		        <div class="team-info">
		          <div class="text">
		            <h3>{{ lost_and_found.title }}
	            		<router-link :to="{ name: 'LostAndFoundEdit', params: { id: lost_and_found.id } }" v-if="lost_and_found.user_id === getAuthenticatedUser.id"><i class="fas fa-edit"></i></router-link>
		            </h3>
		            <p>{{ lost_and_found.description }}</p>
		          </div>
		        </div>
		      </div>
		    </div>
		  </div>
		</section>
	</div>
</template>
<script>
import { mapGetters } from 'vuex'

export default {
	name: 'LostAndFoundView',
	data () {
		return {
			lost_and_found: {},
		}
	},
	computed: {
		...mapGetters(['getAuthenticatedUser'])
	},
	created () {
		let uri = `/api/lost_and_founds/${this.$route.params.id}`
		axios.get(uri, {
			headers: {
				"Accept": "application/json",
				"Authorization": `Bearer ${localStorage.getItem('user_api_token')}`
			}
		}).then(response => {
			this.lost_and_found = response.data.lost_and_found
		}).catch(error => {
			console.log(error.response)
		})
	}
}
</script>