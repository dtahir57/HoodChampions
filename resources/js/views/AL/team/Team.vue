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
	            <button class="bt btn-outline btn-block" v-if="is_joined" disabled>Joined</button>
	            <button class="bt btn-default btn-block" v-if="!is_joined" @click="join">Joined</button>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
	  <section class="team-posts">
	    <div class="container">
	      <div class="row" v-if="is_joined">
	        <div class="col-xl-3 col-md-4">
	          <div class="publisher">
	            <h1 class="common-h">Wall</h1>
	            <div class="img-holder">
	              <img src="@/images/person.jpg" alt="img">
	            </div>
	            <div >
	              <textarea class="info-msg" placeholder="Click this space to start posting in this group. Please do not comment anything." name="Comment" v-validate="'required'" v-model="comment"></textarea>
	              <span class="text-danger">{{ errors.first('Comment') }}</span>
	            </div>
	            <button class="btn btn-default btn-block" @click="saveComment">Publish</button>
	          </div>
	        </div>
	        <div class="col-lg-7 col-md-8 offset-xl-2 offset-lg-1">
	          <div class="posts">
	          	<div class="info-msg" v-if="!comments.length > 0">
	          		<p>There are no posts. Why not post somthing?</p>
	          	</div>
	            <div class="info-msg" v-else v-for="(comment, index) in comments" :key="index">
	              <p>{{ comment.post }}</p>
	            </div>
	          </div>
	        </div>
	      </div>
	      <div class="info-msg">Join a Team to post on a wall</div>
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
			user: {},
			is_joined: null,
			comment: '',
			comments: []
		}
	},
	methods: {
		join () {
			let uri = '/api/team/join';
			axios.post(uri, {
				id: this.team.id
			}, {
				headers: {
					"Accept": "application/json",
				 	"Authorization": `Bearer ${localStorage.getItem('user_api_token')}`
				}
			}).then(response => {
				this.team = response.data.team
				this.users = response.data.users
				this.user = response.data.user
				this.is_joined = response.data.is_join
				console.log(response.data)
			}).catch(error => {
				console.log(error.response)
			})
		},
		saveComment () {
			if (this.$validator.validate()) {
				let uri = '/api/team/post';
				console.log(uri)
				axios.post(uri, {
					comment: this.comment,
					team_id: this.team.id
	 			}, {
	 				headers: {
	 					"Accept": "application/json",
	 				 	"Authorization": `Bearer ${localStorage.getItem('user_api_token')}`
	 				}
	 			}).then(response => {
	 				this.comments = response.data.posts
	 				console.log(response.data)
	 				
	 			}).catch(error => {
	 				console.log(error.response)
	 			})
			}
			this.comment = ''
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
			this.is_joined = response.data.is_join
			this.comments = response.data.team_posts
			console.log(response.data)
		}).catch(error => {
			console.log(error.response)
		})
		
	}
}
</script>