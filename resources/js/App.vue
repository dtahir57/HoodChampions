<template>
	<div class="app">
		<!-- Header Starts -->
		<div class="head-wrapper">
		  <nav class="navbar navbar-expand-lg">
		    <router-link class="navbar-brand" to="/">
		      <img src="@/images/svg/HoodChampions Logo.svg" alt="logo">
		    </router-link>
		    <button class="navbar-toggler" type="button" @click="show">
		        <i class="fal fa-bars"></i>
		    </button>
			<div :class="[{ 'visible': visible }, 'navbar-holder', 'ml-auto']" v-if="toggle">
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
					<a class="nav-link" href="javascript:void(0)" @click="hood_show">Hood <i class="far fa-chevron-down"></i></a>
					<ul :class="[{ 'visible': hood_visible }, 'menu-drop', 'sub-drop']">
						<li>
						<router-link to="/teams">TEAMS</router-link>
						</li>
						<li>
						<router-link to="/battles">{{ getAuthenticatedUser.hood_name }}</router-link>
						</li>
						<li>
						<a href="#">Other Hoods</a>
						</li>
						<li>
						<router-link to="/services">Hood Services</router-link>
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
					<a class="nav-link" href="javascript:void(0)" @click="kaki_show">Kakis <i class="far fa-chevron-down"></i></a>
					<ul :class="[{ 'visible' : kaki_visible },'menu-drop', 'sub-drop']">
						<li>
						<a href="#">MY KAKIS</a>
						</li>
						<li>
						<router-link to="/kaki-request">KAKIS REQUESTS</router-link>
						</li>
					</ul>
					</li>
					<li class="nav-item profile-item">
					<a class="nav-link">
						<div class="profile-circle">
						<img src="@/images/person.jpg" alt="profile">
						</div>
					</a>
					<ul class="sub-drop">
						<li>
						<router-link :to="{ name: 'KakiProfile', params: { id: getAuthenticatedUser.id } }"><i class="far fa-user"></i> Profile</router-link>
						</li>
						<li>
						<a href="javascript:void(0)" @click="logout"><i class="far fa-sign-out"></i> Logout</a>
						</li>
					</ul>
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
	              <ul class="flinks">
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
			api_token: null,
			user: {},
			toggle: true,
			visible: false,
			hood_visible: false,
			kaki_visible: false
		}
	},
	computed: {
		...mapGetters([
				'apiToken',
				'getAuthenticatedUser'
			])
	},
	methods: {
		logout () {
			let uri = '/api/user/logout';
			axios.post(uri, {}, {
				headers: {
					"Accept": "application/json",
					"Authorization": `Bearer ${localStorage.getItem('user_api_token')}`
				}
			}).then(response => {
				localStorage.removeItem('user_api_token')
				this.$store.dispatch('setApiToken', '')
				this.$store.dispatch('setCurrentUser', '')
				this.$router.push({ name: 'Login' })
				console.log(response.data)
			}).catch(error => {
				console.log(error.response)
			})
		},
		show () {
			if (this.visible) {
				this.visible = false
			} else {
				this.visible = true
			}
		},
		hood_show () {
			if (this.hood_visible) {
				this.hood_visible = false
			} else {
				this.hood_visible = true
			}
		},
		kaki_show () {
			if (this.kaki_visible) {
				this.kaki_visible = false
			} else {
				this.kaki_visible = true
			}
		}
	},
	created () {
		if (localStorage.getItem('user_api_token')) {
			this.api_token = localStorage.getItem('user_api_token');
			this.$store.dispatch('setApiToken', this.api_token)
			let uri = '/api/user/auth';
			axios.post(uri, {}, {
				headers: {
					"Accept": "application/json",
					"Authorization": `Bearer ${localStorage.getItem('user_api_token')}`
				}
			}).then(response => {
				this.user = response.data.user
				this.$store.dispatch('setCurrentUser', this.user)
				console.log(response.data)
			}).catch(error => {
				console.log(error.response)
			})			
		}
	},
	updated () {
		this.api_token = this.setApiToken
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