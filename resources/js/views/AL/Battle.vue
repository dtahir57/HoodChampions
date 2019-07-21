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
                  <router-link class="btn btn-default block-btn" to="/battles/create">Create Battle</router-link>
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
	        <carousel :autoplay="true" :nav="false" :items="categories.length" :loop="true">
	        	<template slot="prev"><span class="prev">prev</span></template>
	        	<div v-for="(category, index) in categories">
	        		<img :src="category.image" />
	        		{{ category.title }}
	        	</div>
	        	<template slot="next"><span class="next">next</span></template>
	        </carousel>
	      </div>
	    </div>
	  </div>
	  <section class="featured mi-groups">
	    <div class="container">
	      <div class="common-h">Battles in {{ getHoodName }}</div>
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
	  <section class="featured">
	    <div class="container">
	      <div class="head-title-icon">
	        <div class="common-h">All Interest Groups</div>
	        <div class="icon">
	          <img src="images/svg/decor.svg" alt="img">
	        </div>
	      </div>
	      <div class="row">
	        <div class="col-xl-3 col-lg-4 col-6 col-xs-12">
	          <div class="group">
	            <div class="img-holder">
	              <img src="images/dance.jpg" class="img-fluid" alt="img">
	            </div>
	            <a href="#">Dancing</a>
	            <p><i class="fal fa-user-circle"></i> 15</p>
	            <p>Lorem ipsum dolor sit dummy text using heres</p>
	          </div>
	        </div>
	        <div class="col-xl-3 col-lg-4 col-6 col-xs-12">
	          <div class="group">
	            <div class="img-holder">
	              <img src="images/swim.jpg" class="img-fluid" alt="img">
	            </div>
	            <a href="#">Swiming</a>
	            <p><i class="fal fa-user-circle"></i> 15</p>
	            <p>Lorem ipsum dolor sit du um dolor sit duv um dolor sit duum dolor sit duum dolor sit du um dolor sit dummy text using heres</p>
	          </div>
	        </div>
	        <div class="col-xl-3 col-lg-4 col-6 col-xs-12">
	          <div class="group">
	            <div class="img-holder">
	              <img src="images/abstract.jpg" class="img-fluid" alt="img">
	            </div>
	            <a href="#">Painting</a>
	            <p><i class="fal fa-user-circle"></i> 15</p>
	            <p>Lorem ipsum dolor sit dummy text using heres</p>
	          </div>
	        </div>
	        <div class="col-xl-3 col-lg-4 col-6 col-xs-12">
	          <div class="group">
	            <div class="img-holder">
	              <img src="images/dance.jpg" class="img-fluid" alt="img">
	            </div>
	            <a href="#">Dancing</a>
	            <p><i class="fal fa-user-circle"></i> 15</p>
	            <p>Lorem ipsum dolor sit dummy text using heres</p>
	          </div>
	        </div>
	        <div class="col-xl-3 col-lg-4 col-6 col-xs-12">
	          <div class="group">
	            <div class="img-holder">
	              <img src="images/swim.jpg" class="img-fluid" alt="img">
	            </div>
	            <a href="#">Swiming</a>
	            <p><i class="fal fa-user-circle"></i> 15</p>
	            <p>Lorem ipsum dolor sit du um dolor sit duv um dolor sit duum dolor sit duum dolor sit du um dolor sit dummy text using heres</p>
	          </div>
	        </div>
	        <div class="col-xl-3 col-lg-4 col-6 col-xs-12">
	          <div class="group">
	            <div class="img-holder">
	              <img src="images/abstract.jpg" class="img-fluid" alt="img">
	            </div>
	            <a href="#">Painting</a>
	            <p><i class="fal fa-user-circle"></i> 15</p>
	            <p>Lorem ipsum dolor sit dummy text using heres</p>
	          </div>
	        </div>
	        <div class="col-xl-3 col-lg-4 col-6 col-xs-12">
	          <div class="group">
	            <div class="img-holder">
	              <img src="images/dance.jpg" class="img-fluid" alt="img">
	            </div>
	            <a href="#">Dancing</a>
	            <p><i class="fal fa-user-circle"></i> 15</p>
	            <p>Lorem ipsum dolor sit dummy text using heres</p>
	          </div>
	        </div>
	        <div class="col-xl-3 col-lg-4 col-6 col-xs-12">
	          <div class="group">
	            <div class="img-holder">
	              <img src="images/swim.jpg" class="img-fluid" alt="img">
	            </div>
	            <a href="#">Swiming</a>
	            <p><i class="fal fa-user-circle"></i> 15</p>
	            <p>Lorem ipsum dolor sit du um dolor sit duv um dolor sit duum dolor sit duum dolor sit du um dolor sit dummy text using heres</p>
	          </div>
	        </div>
	        <div class="col-xl-3 col-lg-4 col-6 col-xs-12">
	          <div class="group">
	            <div class="img-holder">
	              <img src="images/abstract.jpg" class="img-fluid" alt="img">
	            </div>
	            <a href="#">Painting</a>
	            <p><i class="fal fa-user-circle"></i> 15</p>
	            <p>Lorem ipsum dolor sit dummy text using heres</p>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
	</div>
</template>
<script>
import { config } from '@/config/config'
import carousel from 'vue-owl-carousel'
import { mapGetters } from 'vuex'

export default {
	name: 'Battle',
	components: { carousel },
	data () {
		return {
			battles: [],
			categories: []
		}
	},
	computed: {
		...mapGetters(['getHoodName'])
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