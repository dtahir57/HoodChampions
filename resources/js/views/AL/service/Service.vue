<template>
	<div class="main-wrapper">
		<section class="teams">
		  <div class="create-team-banner">
		    <div class="container">
		      <div class="row align-items-center">
		        <div class="col-md-5 col-lg-4">
		          <div class="text">
		            <h1 class="common-h">Services</h1>
		            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam quibusdam amet cupiditate accusamus necessitatibus ipsam neque voluptatibus, quaerat quod non!</p>
		            <router-link class="btn btn-default block-btn" to="/services/create">Create Services</router-link>
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
		          <img :src="service.image" alt="img">
		        </div>
		      </div>
		      <div class="col-md-6 col-lg-5 offset-lg-1">
		        <div class="team-info">
		          <div class="text">
		            <h3>{{ service.title }}
	            		<router-link :to="{ name: 'EditService', params: { id: service.id } }" v-if="service.user_id === getAuthenticatedUser.id"><i class="fas fa-edit"></i></router-link>
		            </h3>
		            <p>{{ service.description }}</p>
		          </div>
		          <div class="text">
		          	<h3>Email</h3>
		          	<p>{{ service.email }}</p>
		          </div>
		          <div class="text">
		          	<h3>Contact No.</h3>
		          	<p>{{ service.contact_no }}</p>
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
	name: 'ServiceView',
	data () {
		return {
			service: {},
		}
	},
	computed: {
		...mapGetters(['getAuthenticatedUser'])
	},
	created () {
		let uri = `/api/service/${this.$route.params.id}`
		axios.get(uri, {
			headers: {
				"Accept": "application/json",
				"Authorization": `Bearer ${localStorage.getItem('user_api_token')}`
			}
		}).then(response => {
			this.service = response.data.service
		}).catch(error => {
			console.log(error.response)
		})
	}
}
</script>