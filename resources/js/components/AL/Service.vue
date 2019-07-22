<template>
	<div>
		<section class="teams">
	    <div class="create-team-banner">
	      <div class="container">
	        <div class="row align-items-center">
			<div class="col-12">
	              <h1 class="common-h">Services</h1>
				</div>
	          <div class="col-md-5 col-lg-4">
	            <div class="text">
	              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ipsum velit voluptates et blanditiis delectus dolorem neque aperiam inventore ea.</p>
					<img class="inner-img" src="@/images/svg/Hood Services.svg" alt="img">
	            </div>
				  <router-link class="btn btn-default block-btn" to="/services/create">Create Services</router-link>
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
	      <h1 class="common-h">Hood Services</h1>
	      <div class="row">
	        <div class="col-lg-4 col-6 col-xs-12" v-for="(service, index) in services">
	          <div class="team-box">
	            <div class="img-holder">
	              <img :src="service.image" class="img-fluid" alt="img">
	            </div>
	            <router-link :to="{ name: 'ServiceView', params: {id: service.id} }">{{ service.title }}</router-link>
	            <p>{{ service.description }}</p>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
	</div>
</template>
<script>
export default {
	props: {
		services: {
			type: Array,
			required: true
		}
	}
}
</script>