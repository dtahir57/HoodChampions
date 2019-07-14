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
		      <ul class="navbar-nav ml-auto">
		      	<li class="nav-item">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" to="/Login">Login</router-link>
              </li>
		        <li class="nav-item">
		          <router-link class="nav-link" to="/">Explore</router-link>
		        </li>
		        <li class="nav-item">
		          <router-link class="nav-link" to="/about">Start Activity</router-link>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#">Hood</a>
		          <ul class="sub-drop">
		            <li>
		              <a href="team.html">TEAMS</a>
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
		              <a href="#">Lelong!</a>
		            </li>
		            <li>
		              <a href="#">Lost and found!</a>
		            </li>
		          </ul>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#">Group</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="friends.html">Kakis</a>
		          <ul class="sub-drop">
		            <li>
		              <a href="#">MY KAKIS</a>
		            </li>
		            <li>
		              <a href="#">KAKIS REQUESTS</a>
		            </li>
		          </ul>
		        </li>
		        <li class="nav-item profile-item">
		          <a class="nav-link" href="#">
		            <div class="profile-circle">
		              <img src="@/images/person.jpg" alt="profile">
		            </div>
		          </a>
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

export default {
	components: {
		// 
	},
	data () {
		return {
			// 
		}
	}
}
</script>
<style>
</style>