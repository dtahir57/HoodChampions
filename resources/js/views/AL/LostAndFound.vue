<template>
	<div class="main-wrapper">
	  <section class="lost-found">
	    <div class="lf-banner">
	      <div class="container">
	        <div class="row align-items-center">
			<div class="col-12">
				<h1 class="common-h">Lost and Founds</h1>
			</div>
	          <div class="col-md-6 col-lg-5 col-xl-4">
	            <div class="text">
	              <p>Dummy Text here, resources, contacts and ideas. Start a community action team to make things better in the neighbourhood!</p>
	            	<img src="@/images/svg/Lost and Found.svg" class="inner-img" width="100%" alt="img">
				</div>
				<router-link class="btn btn-default block-btn" to="/lost-and-found/create">Create Lost And Found</router-link>
	          </div>
	          <div class="col-md-5 offset-md-1 col-lg-5 offset-lg-2 col-xl-4 offset-xl-3">
	            <img src="@/images/svg/Lost and Found.svg" class="outer-img" width="100%" alt="img">
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
	    <div class="ad-holder">
	    <div class="container">
	      <div class="ad">
	        <h1>716 X 90</h1>
	      </div>
	    </div>
	  </div>
	  <section class="featured">
	    <div class="container">
	      <div class="row">
	        <div class="col-lg-4 col-6 col-xs-12" v-for="(data, index) in lost_and_founds" :key="index">
	          <div class="group">
	            <div class="img-holder">
	              <img :src="data.image" class="img-fluid" alt="img">
	            </div>
	            <a href="#">{{ data.title }}</a>
	            <p>{{ data.description }}</p>
	          </div>
	        </div>
	        
	      </div>
	    </div>
	  </section>
	</div>
</template>
<script>
export default {
	name: 'LostAndFound',
	data () {
		return {
			lost_and_founds: []
		}
	},
	created () {
		let uri = '/api/lost_and_founds';
		axios.get(uri, {
			headers: {
				"Accept": "application/json",
				"Authorization": `Bearer ${localStorage.getItem('user_api_token')}`
			}
		}).then(response => {
			this.lost_and_founds = response.data.lost_and_founds
		}).catch(error => {
			console.log(error.response)
		})
	}
}
</script>