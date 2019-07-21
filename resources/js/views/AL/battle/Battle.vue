<template>
	<div class="main-wrapper">
	  <section class="create-battle-banner">
	    <div class="container">
	      <div class="row align-items-center">
	        <div class="col-md-5 col-lg-4">
	          <div class="text">
	            <h1 class="common-h">Battles</h1>
	            <p>Create a Battle for InnerHood Competitions</p>
	            <router-link class="btn btn-default block-btn" to="/battles/create">Create Battle</router-link>
	          </div>
	        </div>
	        <div class="col-md-5 offset-md-2 col-lg-4 offset-lg-3">
	          <img src="@/images/svg/Battles.svg" width="100%" alt="img">
	        </div>
	      </div>
	    </div>
	  </section>
	  <section class="create-battle">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-6">
	          <div class="img-holder">
	            <img :src="battle.image" alt="img">
	          </div>
	        </div>
	        <div class="col-md-6 col-lg-5 offset-lg-1">
	          <div class="team-info">
	            <div class="text">
	              <h3>{{ battle.title }} <a href="edit-battle.html"><i class="fas fa-edit    "></i></a></h3>
	              <span><i class="fal fa-user-circle"></i> {{ battle.users }}</span>
	              <p>{{ battle.description }}</p>
	            </div>
	            <button class="bt btn-outline btn-default" v-if="!exists" @click="join">Join</button>
	            <button class="bt btn-outline btn-block" v-if="exists" disabled>Joined</button>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
	  <section class="team-battles">
	    <div class="container">
	      <div class="row">
	        <div class="col-xl-3 col-md-4">
	          <div class="publisher">
	            <h1 class="common-h">Wall</h1>
	            <div class="img-holder">
	              <img src="images/person.jpg" alt="img">
	            </div>
	            <div class="info-msg">
	              <p>Click this space to start posting in this group. Please do not comment anything.</p>
	            </div>
	            <button class="btn btn-default btn-block">Publish</button>
	          </div>
	        </div>
	        <div class="col-lg-7 col-md-8 offset-xl-2 offset-lg-1">
	          <div class="battles">
	            <ul>
	              <li>
	                <div class="strip">
	                  <p>First Battle would be on 19 March 2019!</p>
	                  <div class="img-holder">
	                    <img src="images/person.jpg" alt="img">
	                  </div>
	                </div>
	                <div class="bdate">
	                  <a href="#" class="trash"><i class="fas fa-trash"></i></a>
	                  <ul class="remove-action">
	                    <li>
	                      <a href="#">Yes</a>
	                    </li>
	                    <li>
	                      <a href="#" class="dismiss">Cancel</a>
	                    </li>
	                  </ul>
	                  <span>1 March 2019, 12:00 AM</span>
	                </div>
	              </li>
	              <li>
	                <div class="strip">
	                  <p>First Battle would be on 19 March 2019!</p>
	                  <div class="img-holder">
	                    <img src="images/person.jpg" alt="img">
	                  </div>
	                </div>
	                <div class="bdate">
	                  <a href="#" class="trash"><i class="fas fa-trash"></i></a>
	                  <ul class="remove-action">
	                    <li>
	                      <a href="#">Yes</a>
	                    </li>
	                    <li>
	                      <a href="#" class="dismiss">Cancel</a>
	                    </li>
	                  </ul>
	                  <span>1 March 2019, 12:00 AM</span>
	                </div>
	              </li>
	              <li>
	                <div class="strip">
	                  <p>First Battle would be on 19 March 2019!</p>
	                  <div class="img-holder">
	                    <img src="images/person.jpg" alt="img">
	                  </div>
	                </div>
	                <div class="bdate">
	                  <a href="#" class="trash"><i class="fas fa-trash"></i></a>
	                  <ul class="remove-action">
	                    <li>
	                      <a href="#">Yes</a>
	                    </li>
	                    <li>
	                      <a href="#" class="dismiss">Cancel</a>
	                    </li>
	                  </ul>
	                  <span>1 March 2019, 12:00 AM</span>
	                </div>
	              </li>
	              <li>
	                <div class="strip">
	                  <p>First Battle would be on 19 March 2019!</p>
	                  <div class="img-holder">
	                    <img src="images/person.jpg" alt="img">
	                  </div>
	                </div>
	                <div class="bdate">
	                  <a href="#" class="trash"><i class="fas fa-trash"></i></a>
	                  <ul class="remove-action">
	                    <li>
	                      <a href="#">Yes</a>
	                    </li>
	                    <li>
	                      <a href="#" class="dismiss">Cancel</a>
	                    </li>
	                  </ul>
	                  <span>1 March 2019, 12:00 AM</span>
	                </div>
	              </li>
	              <li>
	                <div class="strip">
	                  <p>First Battle would be on 19 March 2019!</p>
	                  <div class="img-holder">
	                    <img src="images/person.jpg" alt="img">
	                  </div>
	                </div>
	                <div class="bdate">
	                  <a href="#" class="trash"><i class="fas fa-trash"></i></a>
	                  <ul class="remove-action">
	                    <li>
	                      <a href="#">Yes</a>
	                    </li>
	                    <li>
	                      <a href="#" class="dismiss">Cancel</a>
	                    </li>
	                  </ul>
	                  <span>1 March 2019, 12:00 AM</span>
	                </div>
	              </li>
	            </ul>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
	  <section class="battle-details">
	    <div class="container">
	      <div class="f-row">
	        <div class="column">
	          <h1 class="common-h">About</h1>
	          <div class="about-team">
	            <ul>
	              <li>
	                <span>About Us</span>
	                <p>{{ battle.about_us }}</p>
	              </li>
	              <li>
	                <span>Email</span>
	                <p>{{ battle.email }}</p>
	              </li>
	              <li>
	                <span>Contact Number</span>
	                <p>{{ battle.contact_no }}</p>
	              </li>
	              <li>
	                <span>Meet Place</span>
	                <p>{{ battle.meetup_place }}</p>
	              </li>
	            </ul>
	          </div>
	        </div>
	        <div class="column">
	          <div class="members">
	            <h1 class="common-h">Teams</h1>
	            <div class="single-member" v-for="(team, index) in teams">
	              <a href="#">
	                <div class="img-holder">
	                  <img :src="team.image" alt="img">
	                </div>
	                <div class="name-place">
	                  <h4>{{ team.title }}</h4>
	                  <p><i class="fal fa-map-marker-alt"></i> {{ team.hood_name }}</p>
	                </div>
	              </a>
	            </div>
	          </div>
	        </div>
	        <div class="column">
	          <div class="results">
	            <h1 class="common-h">Results</h1>
	            <h5>Hood ranikings</h5>
	            <table>
	              <tr class="winner">
	                <td>
	                  <i class="fas fa-trophy"></i>
	                </td>
	                <td>Hougang</td>
	              </tr>
	              <tr>
	                <td>2</td>
	                <td>Ang Mo Kio</td>
	              </tr>
	              <tr>
	                <td>3</td>
	                <td>Potong Pasir</td>
	              </tr>
	            </table>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
	</div>
</template>
<script>
import { config } from '@/config/config'
export default {
	name: 'BattleView',
	data () {
		return {
			battle: {},
			user: {},
			teams: [],
			exists: null
		}
	},
	methods: {
		join () {
			// let uri = '/api/battle/join';
		}
	},
	created () {
		let uri = `/api/battle/${this.$route.params.id}`;
		axios.get(uri, config).then(response => {
			this.battle = response.data.battle
			this.user = response.data.user
			this.teams = response.data.teams
			this.exists = response.data.exists
		}).catch(error => {
			console.log(error.response)
		})
	}
}
</script>