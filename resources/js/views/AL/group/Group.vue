<template>
	<div class="main-wrapper">
	  	<section class="interest">
	      <div class="interest-banner">
	        <div class="container">
	          <div class="row align-items-center">
	  			<div class="col-12">
	  				<h1 class="common-h">Interest Groups</h1>
	  			</div>
	            <div class="col-md-6 col-lg-5 col-xl-4">
	              <div class="text">
	                <p>Create or join a team in your neighbourhood to share interests, resources, contacts and ideas. Start a community action team to make things better in the neighbourhood!</p>
	              	<img src="@/images/svg/Interest Group.svg" class="inner-img" width="100%" alt="img">
	  			</div>
	  			<router-link class="btn btn-default block-btn" to="/interest-groups/create">Create Interest Group</router-link>
	            </div>
	            <div class="col-md-5 offset-md-1 col-lg-5 offset-lg-2 col-xl-4 offset-xl-3">
	              <img src="@/images/svg/Interest Group.svg" class="outer-img" width="100%" alt="img">
	            </div>
	          </div>
	        </div>
	      </div>
	    </section>
	    <section class="featured mi-groups">
	      <div class="container">
	        <div class="common-h">All Interest Groups</div>
	        <div class="row">
	          <div class="col-lg-4 col-6 col-xs-12" v-for="(group, index) in groups" :key="index">
	            <div class="group">
	              <div class="img-holder">
	                <img :src="group.photo" class="img-fluid" alt="img">
	              </div>
	              <a href="#">{{ group.title }}</a>
	              <p><i class="fal fa-user-circle"></i> {{ group.users }}</p>
	              <p>{{ group.description }}</p>
	            </div>
	          </div>
	        </div>
	      </div>
	    </section>
	</div>
</template>
<script>
import { config } from '@/config/'

export default {
	name: 'GroupsByCategory',
	data () {
		return {
			groups: [],
			category: {}
		}
	},
	created () {
		let uri = `/api/interest_group/category/${this.$route.params.id}`;
		axios.get(uri, config).then(response => {
			this.groups = response.data.groups
			this.category = response.data.category
		}).catch(error => {
			console.log(error.response)
		})
	}
}
</script>