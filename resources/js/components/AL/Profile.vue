<template>
	<section class="friend-profile">
	  <div class="container-fluid p-0">
	    <div class="row no-gutters">
	      <div class="col-lg-4 col-md-5">
	        <div class="profile-details">
	          <div class="img-holder">
	            <img src="@/images/person.jpg" alt="img">
	          </div>
	          <h6>{{ user.name }}</h6>
	          <p><i class="far fa-map-marker-alt"></i> {{ user.hood_name }}</p>
	          <ul>
	            <li>Age: 00s</li>
	            <li v-if="user.gender">Gender: M</li>
	            <li v-if="!user.gender">Gender: F</li>
	          </ul>
	            <!-- <button class="btn btn-outline">Your Kaki</button> -->
	            <div class="hood-services">
	            <h1 class="common-h">Hood Services</h1>
	              <ul>
	                <li>
	                  <h5>Professional Networking</h5>
	                  <p>Partner & Co-Founder</p>
	                  <p>Krome</p>
	                </li>
	              </ul>
	            </div>
	        </div>
	      </div>
	      <div class="col-lg-8 col-md-7">
	        <div class="about-profile">
	          <div class="block">
	            <h1 class="common-h">Interest Groups</h1>
	            <div class="row">
	              <div class="col-lg-4 col-6 col-xs-12" v-for="(group, index) in groups" :key="index">
	                <div class="group">
	                  <div class="img-holder">
	                    <img :src="group.photo" class="img-fluid" alt="img">
	                  </div>
	                  <router-link :to="{ name: 'SingleGroup', params: { id: group.id } }">{{ group.title }}</router-link>
	                  <p><i class="fal fa-user-circle"></i>{{ group.users }}</p>
	                </div>
	              </div>
	            </div>
	          </div>
	          <div class="block">
	            <h1 class="common-h">Teams</h1>
	            <div class="not-any">
	              <p v-if="!teams.length > 0"><span v-if="user.id === getAuthenticatedUser.id">You</span><span v-else>{{ user.name }}</span> has not joined any Teams</p>
	              <div class="row">
	                <div class="col-lg-4 col-6 col-xs-12" v-for="(team, index) in teams" :key="index">
	                  <div class="group">
	                    <div class="img-holder">
	                      <img :src="team.image" class="img-fluid" alt="img">
	                    </div>
	                    <router-link :to="{ name: 'Team', params: {id: team.id} }">{{ team.title }}</router-link>
	                    <p><i class="fal fa-user-circle"></i>{{ team.users }}</p>
	                  </div>
	                </div>
	              </div>
	              <router-link type="button" class="btn btn-default" to="/teams">Dicover New Teams</router-link>
	            </div>
	          </div>
	          <div class="block">
	            <h1 class="common-h">Battles</h1>
	            <div class="not-any">
	              <p v-if="!teams.length > 0"><span v-if="user.id === getAuthenticatedUser.id">You</span><span v-else>{{ user.name }}</span> has not joined any Battles</p>
	              <div class="row">
	                <div class="col-lg-4 col-6 col-xs-12" v-for="(battle, index) in battles" :key="index">
	                  <div class="group">
	                    <div class="img-holder">
	                      <img :src="battle.image" class="img-fluid" alt="img">
	                    </div>
	                    <router-link :to="{ name: 'BattleView', params: {id: battle.id} }">{{ battle.title }}</router-link>
	                    <p><i class="fal fa-user-circle"></i>{{ battle.users }}</p>
	                  </div>
	                </div>
	              </div>
	              <router-link type="button" class="btn btn-default" to="/battles">Dicover New Battles</router-link>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	
	  </div>
	</section>
</template>
<script>
import { mapGetters } from 'vuex'
export default {
	props: {
		user: {
			type: Object,
			required: true
		},
		groups: {
			type: Array,
			required: true
		},
		teams: {
			type: Array,
			required: true
		},
		battles: {
			type: Array,
			required: true
		}
	},
	data () {
		return {
			// 
		}
	},
	computed: {
		...mapGetters(['getAuthenticatedUser'])
	}
}
</script>