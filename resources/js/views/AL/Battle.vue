<template>
	<div class="main-wrapper">
	  <section class="interest">
	    <div class="interest-banner">
	      <div class="container">
	        <div class="row align-items-center">
	          <div class="col-md-6 col-lg-5 col-xl-4">
	            <div class="text">
	              <h1 class="common-h">Battles</h1>
                  <p>Create a Battle for InnerHood Competitions</p>
                  <router-link class="btn btn-default block-btn" to="/battle/create">Create Battle</router-link>
	            </div>
	          </div>
	          <div class="col-md-5 offset-md-1 col-lg-5 offset-lg-2 col-xl-4 offset-xl-3">
	            <img src="@/images/svg/Battles.svg" width="100%" alt="img">
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
	  <div class="categories">
	    <div class="container">
	      <div class="common-h">Categories</div>
	      <div class="categories-slider owl-carousel">
	        <carousel :autoplay="true" :centerMode="true" :easing="'ease'">
		  		<slide v-for="(category, index) in categories" :key="index">
		  			<router-link :to="{ name: 'GroupsByCategory', params: { id: category.id } }">
			  			<img :src="category.image" style="height: 100px; width: 100px;" alt="Category Image" />
			  			<h5 class="mt-3">{{ category.title }}</h5>
			  		</router-link>
		  		</slide>
		  	</carousel>
	      </div>
	    </div>
	  </div>
	  <section class="featured mi-groups">
	    <div class="container">
	      <div class="common-h">Battles in {{ getAuthenticatedUser.hood_name }}</div>
	      <div class="row">
	        <div class="col-lg-4 col-6 col-xs-12" v-for="(battle, index) in battles" :key="index">
	          <div class="group">
	            <div class="img-holder">
	              <img :src="battle.image" class="img-fluid" alt="img">
	            </div>
	            <router-link :to="{ name: 'BattleView', params: {id: battle.id} }">{{ battle.title }}</router-link>
	            <p><i class="fal fa-user-circle"></i> {{ battle.users }}</p>
	            <p>{{ battle.description }}</p>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
	</div>
</template>
<script>
import { config } from '@/config/'
import { mapGetters } from 'vuex'
import { Carousel, Slide } from 'vue-carousel';

export default {
	name: 'Battle',
	components: {
	    Carousel,
	    Slide
	  },
	data () {
		return {
			battles: [],
			categories: []
		}
	},
	computed: {
		...mapGetters(['getAuthenticatedUser'])
	},
	created () {
		let uri = '/api/battles';
		axios.get(uri, config).then(response => {
			this.battles = response.data.battles
			this.categories = response.data.categories
		}).catch(error => {
			console.log(error.response)
		})
	}
}
</script>