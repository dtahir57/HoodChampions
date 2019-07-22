<template>
	<div>
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
	  <div class="categories container">
	  	<carousel :autoplay="true" :centerMode="true" :easing="'ease'">
	  		<slide v-for="(category, index) in categories" :key="index">
	  			<router-link :to="{ name: 'GroupsByCategory', params: { id: category.id } }">
		  			<img :src="category.image" style="height: 100px; width: 100px;" alt="Category Image" />
		  			<h5 class="mt-3">{{ category.title }}</h5>
		  		</router-link>
	  		</slide>
	  	</carousel>
	  </div>
	  <section class="featured mi-groups">
	    <div class="container">
	      <div class="common-h">My interest groups</div>
	      <div class="row">
	        <div class="col-lg-4 col-6 col-xs-12" v-for="(group, index) in groups" :key="index">
	          <div class="group">
	            <div class="img-holder">
	              <img :src="group.photo" class="img-fluid" alt="img">
	            </div>
	            <router-link :to="{ name: 'SingleGroup', params: {id: group.id} }">{{ group.title }}</router-link>
	            <p><i class="fal fa-user-circle"></i> {{ group.users }}</p>
	            <p>{{ group.description }}</p>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
	  <section class="featured">
	    <div class="container">
	      <div class="head-title-icon">
	        <div class="common-h">All Interest Groups</div>
	        <div class="icon">
	          <img src="@/images/svg/decor.svg" alt="img">
	        </div>
	      </div>
	      <div class="row">
	        <div class="col-xl-3 col-lg-4 col-6 col-xs-12" v-for="(group, index) in hoodgroups" :key="index">
	          <div class="group">
	            <div class="img-holder">
	              <img :src="group.photo" class="img-fluid" alt="img">
	            </div>
	            <router-link :to="{ name: 'SingleGroup', params: {id: group.id} }">{{ group.title }}</router-link>
	            <p><i class="fal fa-user-circle"></i> {{ group.user }}</p>
	            <p>{{ group.description }}</p>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
	</div>
</template>
<script>
import { Carousel, Slide } from 'vue-carousel';

export default {
	components: {
	    Carousel,
	    Slide
	  },
	props: {
		categories: {
			type: Array,
			required: true
		},
		groups: {
			type: Array,
			required: true
		},
		hoodgroups: {
			type: Array,
			required: true
		}
	}
}
</script>