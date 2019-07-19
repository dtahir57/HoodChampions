<template>
	<div class="app">
		<!-- Header Starts -->
		<div class="head-wrapper">
		  <nav class="navbar navbar-expand-lg">
		    <router-link class="navbar-brand" to="/">
		      <img src="@/images/svg/HoodChampions Logo.svg" alt="logo">
		    </router-link>
		    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
		        aria-expanded="false" aria-label="Toggle navigation">
		        <i class="fal fa-bars"></i>
		    </button>
		    <div class="collapse navbar-collapse" id="collapsibleNavId">
		      <ul class="navbar-nav ml-auto" v-if="!apiToken">
		      	<li class="nav-item">
		      		<router-link class="nav-link" to="/">Home</router-link>
              </li>
              <li class="nav-item">
		          <router-link class="nav-link" to="/about">About</router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" to="/Login">Login</router-link>
              </li>
          		</ul>
          		<ul class="navbar-nav ml-auto" v-if="apiToken">
		        <li class="nav-item">
		          <router-link class="nav-link" to="/explore">Explore</router-link>
		        </li>
		        <li class="nav-item">
	                <router-link class="nav-link" to="/start-activity">Start Activity</router-link>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#">Hood</a>
		          <ul class="sub-drop">
		            <li>
		              <router-link to="/teams">TEAMS</router-link>
		            </li>
		            <li>
		              <a href="#">Ang mo kio</a>
		            </li>
		            <li>
		              <a href="#">Other Hoods</a>
		            </li>
		            <li>
		              <a href="#">Hood Services</a>
		            </li>
		            <li>
		              <router-link to="/lelong">Lelong!</router-link>
		            </li>
		            <li>
		              <router-link to="/lost-and-found">Lost and found!</router-link>
		            </li>
		          </ul>
		        </li>
		        <li class="nav-item">
		          <router-link class="nav-link" to="/interest-groups">Group</router-link>
		        </li>
		        <li class="nav-item">
		          <router-link class="nav-link" to="/kakis">Kakis</router-link>
		          <ul class="sub-drop">
		            <li>
		              <a href="#">MY KAKIS</a>
		            </li>
		            <li>
		              <router-link to="/kaki-request">KAKIS REQUESTS</router-link>
		            </li>
		          </ul>
		        </li>
		        <li class="nav-item profile-item">
		          <router-link class="nav-link" to="/kaki-profile">
		            <div class="profile-circle">
		              <img src="@/images/person.jpg" alt="profile">
		            </div>
		          </router-link>
		        </li>
		      </ul>
		    </div>
		  </nav>
		</div>
		<!-- Header Ends -->		
		<router-view></router-view>
		<!-- Footer Starts -->
		<div class="foot-wrapper">
	        <section class="powered-bar">
	          <div class="container">
	            <div class="row">
	              <div class="col-12">
	                <div class="bar">
	                  <p>Powered by</p>
	                  <img src="@/images/skm.png" alt="img">
	                </div>
	              </div>
	            </div>
	          </div>
	        </section>
	        <footer class="footer">
	          <div class="container">
	            <div class="frow">
	              <p>&copy; 2019 Singapore Kindness Movement. <br> All rights reserved</p>
	              <ul>
	                <li>
	                  <a href="#">About</a>
	                </li>
	                <li>
	                  <a href="#">FAQ</a>
	                </li>
	                <li>
	                  <a href="#">Terms of Use</a>
	                </li>
	                <li>
	                  <a href="#">Privacy Policy</a>
	                </li>
	              </ul>
	              <ul class="social">
	                <li>
	                  <a href="#"><i class="fab fa-facebook"></i></a>
	                </li>
	                <li>
	                  <a href="#"><i class="fab fa-youtube"></i></a>
	                </li>
	              </ul>
	            </div>
	          </div>
	        </footer>
	    </div>
		<!-- Footer Ends -->
	</div>
</template>
<script>
import { mapGetters } from 'vuex'
import { mapActions } from 'vuex'
export default {
	components: {
		// 
	},
	data () {
		return {
			api_token: null
		}
	},
	computed: {
		...mapGetters([
				'apiToken'
			])
	},
	created () {
		this.api_token = localStorage.getItem('user_api_token');
		this.$store.dispatch('setApiToken', this.api_token)
	}
}
</script>
<style>
.app {
	display:flex;
	flex-direction:column;
	min-height:100vh;
}
.app .main-wrapper{
	flex-grow:1;
}
</style>