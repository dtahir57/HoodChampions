<template>
	<div class="main-wrapper">
	  <section class="teams">
	    <div class="create-team-banner">
	      <div class="container">
	        <div class="row align-items-center">
	          <div class="col-md-5 col-lg-4">
	            <div class="text">
	              <h1 class="common-h">Teams</h1>
	              <p>Create or join a team in your neighbourhood to share interests, resources, contacts and ideas. Start a community action team to make things better in the neighbourhood!</p>
	              <button class="btn btn-default block-btn">Create Team</button>
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
	            <img :src="team.image" alt="img">
	          </div>
	        </div>
	        <div class="col-md-6 col-lg-5 offset-lg-1">
	          <div class="team-info">
	            <div class="text">
	              <h3>{{ team.title }}</h3>
	              <span><i class="fal fa-user-circle"></i> {{ users.length }}</span>
	              <p>{{ team.description }}</p>
	            </div>
	            <button class="bt btn-default btn-block">Join</button>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
	  <section class="team-posts">
	    <div class="container">
	      <div class="row">
	        <div class="col-xl-3 col-md-4">
	          <div class="publisher">
	            <h1 class="common-h">Wall</h1>
	            <div class="img-holder">
	              <img src="@/images/person.jpg" alt="img">
	            </div>
	            <div class="info-msg">
	              <p>Click this space to start posting in this group. Please do not comment anything.</p>
	            </div>
	            <button class="btn btn-default btn-block">Publish</button>
	          </div>
	        </div>
	        <div class="col-lg-7 col-md-8 offset-xl-2 offset-lg-1">
	          <div class="posts">
	            <div class="info-msg">
	              <p>There are no posts. Why not post somthing?</p>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
	  <section class="team-details">
	    <div class="container">
	      <div class="row">
	        <div class="col-xl-3 col-md-4">
	          <h1 class="common-h">About</h1>
	          <div class="about-team">
	            <ul>
	              <li>
	                <span>About Us</span>
	                <p>{{ team.about_us }}</p>
	              </li>
	              <li>
	                <span>Email</span>
	                <p>{{ team.email }}</p>
	              </li>
	              <li>
	                <span>contact Number</span>
	                <p>{{ team.contact_no }}</p>
	              </li>
	              <li>
	                <span>Meet Place</span>
	                <p>{{ team.meetup_place }}</p>
	              </li>
	            </ul>
	          </div>
	        </div>
	        <div class="col-md-8 offset-xl-1">
	          <div class="members">
	            <h1 class="common-h">Members</h1>
	            <div class="row">
	              <div class="col-xl-3 col-md-4 col-6" v-for="(user, index) in users">
	                <div class="single-member">
	                  <a href="#">
	                    <div class="img-holder">
	                      <img src="images/person.jpg" alt="img">
	                    </div>
	                    <div class="name-place">
	                      <h4>{{ user.name }}</h4>
	                      <p><i class="fal fa-map-marker-alt"></i> {{ user.hood_name }}</p>
	                    </div>
	                  </a>
	                </div>
	              </div>
	            </div>
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
	name: 'Team',
	data () {
		return {
			team: {},
			users: [],
		}
	},
	created () {
		let uri = `/api/team/${this.$route.params.id}`;
		axios.get(uri, {
			headers: {
				"Accept": "application/json",
			 	"Authorization": `Bearer ${localStorage.getItem('user_api_token')}`
			}
		}).then(response => {
			this.team = response.data.team,
			this.users = response.data.users
		}).catch(error => {
			console.log(error.response)
		})
		
	}
}
</script>