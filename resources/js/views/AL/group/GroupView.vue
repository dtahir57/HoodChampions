<template>
	<div class="main-wrapper">
	  <section class="interest">
	    <div class="interest-banner">
	      <div class="container">
	        <div class="row align-items-center">
	          <div class="col-md-6 col-lg-5 col-xl-4">
	            <div class="text">
	              <h1 class="common-h">Interest Groups</h1>
	              <p>Create or join a team in your neighbourhood to share interests, resources, contacts and ideas. Start a community action team to make things better in the neighbourhood!</p>
	              <router-link class="btn btn-default block-btn" to="/interest-groups/create">Create Interest Group</router-link>
	            </div>
	          </div>
	          <div class="col-md-5 offset-md-1 col-lg-5 offset-lg-2 col-xl-4 offset-xl-3">
	            <img src="@/images/svg/Interest Group.svg" height="400" width="400" alt="img">
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
	  <section class="join-interest-group">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-6">
	          <div class="img-holder">
	            <img :src="group.photo" alt="img">
	          </div>
	        </div>
	        <div class="col-md-6 col-lg-5 offset-lg-1">
	          <div class="ig-info">
	            <div class="text">
	              <h3>{{ group.title }}<a href="edit-battle.html"><i class="fas fa-edit    "></i></a></h3>
	              <span><i class="fal fa-user-circle"></i> {{ group.users }}</span>
	              <p>{{ group.description }}</p>
	            </div>
	            <button class="bt btn-default btn-block" v-if="!is_member" @click="join">Join</button>
	            <button class="bt btn-outline btn-block" disabled v-if="is_member">Joined</button>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
	  <!-- ig stands for Interest Groups-->
	  <section class="ig-activities">
	    <div class="container" v-if="is_member">
	      <div class="row">
	        <div class="col-xl-3 col-md-4">
	          <div class="publisher">
	            <h1 class="common-h">Wall</h1>
	            <div class="img-holder">
	              <img src="@/images/person.jpg" alt="img">
	            </div>
	            <textarea class="info-msg form-control" style="background-color: #fff3e6;" rows="3" placeholder="Click this space to start posting in this group. Please do not comment anything." name="Comment" v-validate="'required'" v-model="comment">
	            </textarea>
	              <span class="text-danger">{{ errors.first('Comment') }}</span>
	            <button class="btn btn-default btn-block" @click="saveComment">Publish</button>
	          </div>
	        </div>
	        <div class="col-lg-7 col-md-8 offset-xl-2 offset-lg-1">
	          <div class="activities">
	          	<div class="info-msg" v-if="!comments.length > 0"><p>There are no posts. Why not post somthing?</p></div>
	            <ul>
	              <li v-for="(comment, index) in comments" :key="index">
	                <div class="strip">
	                  <p>{{ comment.post }}</p>
	                  <div class="img-holder">
	                    <img src="@/images/person.jpg" alt="img">
	                  </div>
	                </div>
	                <div class="adate">
	                  <a href="#" class="trash" v-if="comment.user.id === getAuthenticatedUser.id"><i class="fas fa-trash"></i></a>
	                  <ul class="remove-action">
	                    <li>
	                      <a href="#">Yes</a>
	                    </li>
	                    <li>
	                      <a href="#" class="dismiss">Cancel</a>
	                    </li>
	                  </ul>
	                  <span>{{ comment.created_at }}</span>
	                </div>
	              </li>
	            </ul>
	          </div>
	        </div>
	      </div>
	    </div>
	    <div class="container" v-else>
	    	<div class="info-msg">
	    	  <p>You need to join this group to start posting on wall</p>
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
	                <p>{{ group.about_us }}</p>
	              </li>
	              <li>
	                <span>Email</span>
	                <p>{{ group.email }}</p>
	              </li>
	              <li>
	                <span>contact Number</span>
	                <p>{{ group.contact_no }}</p>
	              </li>
	              <li>
	                <span>Meet Place</span>
	                <p>{{ group.meetup_place }}</p>
	              </li>
	            </ul>
	          </div>
	        </div>
	        <div class="col-md-8 offset-xl-1">
	          <div class="members">
	            <h1 class="common-h">Members</h1>
	            <div class="row">
	              <div class="col-xl-3 col-md-4 col-6" v-for="(user, index) in members" :key="index">
	                <div class="single-member">
	                  <router-link :to="{ name: 'KakiProfile', params: { id: user.id } }">
	                    <div class="img-holder">
	                      <img src="@/images/person.jpg" alt="img">
	                    </div>
	                    <div class="name-place">
	                      <h4>{{ user.name }}</h4>
	                      <p><i class="fal fa-map-marker-alt"></i> {{ user.hood_name }}</p>
	                    </div>
	                  </router-link>
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
import { mapGetters } from 'vuex'

export default {
	name: 'SingleGroup',
	data () {
		return {
			group: {},
			members: [],
			is_member: false,
			comment: '',
			comments: []
		}
	},
	methods: {
		join () {
			let uri = '/api/interest_group/join';
			axios.post(uri, {
				id: this.group.id
			}, config).then(response => {
				this.group = response.data.group
				this.members = response.data.users
				this.is_member = response.data.is_member
			}).catch(error => {
				console.log(error.response)
			})
		},
		saveComment () {
			if (this.$validator.validate()) {
				let uri = '/api/interest_group/post';
				axios.post(uri, {
					id: this.group.id,
					comment: this.comment
				}, config).then(response => {
					this.comments = response.data.comments
				}).catch(error => {
					console.log(error.response)
				})
			}
			this.comment = ''
		}
	},
	computed: {
		...mapGetters(['getAuthenticatedUser'])
	},
	created () {
		let uri = `/api/interest_group/${this.$route.params.id}`;
		axios.get(uri, config).then(response => {
			this.group = response.data.group
			this.members = response.data.users
			this.is_member = response.data.is_member
			this.comments = response.data.comments
		}).catch(error => {
			console.log(error.response)
		})
	}
}
</script>
<style scoped>
.remove-action {

}
</style>