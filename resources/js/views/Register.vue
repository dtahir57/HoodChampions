<template>
	<div class="main-wrapper">
	  <section class="login">
	    <div class="container">
	      <h1 class="common-h">Create an Account</h1>
	      <div class="row justify-content-center">
	        <div class="col-md-6">
	          <div class="form-group">
	            <input type="email" class="form-control" v-validate="'required|email'" name="email" placeholder="Email" v-model="email">
	            <span class="text-danger">{{ errors.first('email') }}</span>
	            <span class="text-danger" v-if="formErrors.email">{{ formErrors.email[0] }}</span>
	            <div class="mark">
	              <i class="far fa-times"></i>
	              <i class="far fa-check"></i>
	            </div>
	          </div>
	          <div class="form-group">
	            <input type="text" class="form-control" name="full_name" v-validate="'required'" placeholder="Full Name" v-model="full_name">
	            <span class="text-danger">{{ errors.first('full_name') }}</span>
	            <div class="mark">
	              <i class="far fa-times"></i>
	              <i class="far fa-check"></i>
	            </div>
	          </div>
	          <div class="form-group">
	            <input type="text" class="form-control" name="username" v-validate="'required'" placeholder="Username" v-model="username">
	            <span class="text-danger">{{ errors.first('username') }}</span>
	            <span class="text-danger" v-if="formErrors.username">{{ formErrors.username[0] }}</span>
	            <div class="mark">
	              <i class="far fa-times"></i>
	              <i class="far fa-check"></i>
	            </div>
	          </div>
	          <div class="form-group">
	            <model-list-select :list="hoods"
	                                 v-model="hood"
	                                 v-validate="'required'"
	                                 option-value="id"
	                                 name="hood"
	                                 option-text="planning_area_name"
	                                 placeholder="Residential Neighbourhood">
	              </model-list-select>
	              <span class="text-danger">{{ errors.first('hood') }}</span>
	          </div>
	        </div>
	        <div class="col-md-6">
	          <div class="form-group">
	            <input type="text" class="form-control" name="phone_number" v-validate="'required|numeric'" placeholder="Phone Number" v-model="phone_number">
	            <span class="text-danger">{{ errors.first('phone_number') }}</span>
	            <span class="text-danger" v-if="formErrors.phone_number">{{ formErrors.phone_number[0] }}</span>
	            <div class="mark">
	              <i class="far fa-times"></i>
	              <i class="far fa-check"></i>
	            </div>
	          </div>
	          <div class="form-group">
	            <model-list-select :list="genders"
	                                 v-model="gender"
	                                 v-validate="'required'"
	                                 name="gender"
	                                 option-value="value"
	                                 option-text="text"
	                                 placeholder="Select Gender">
	              </model-list-select>
	              <span class="text-danger">{{ errors.first('gender') }}</span>
	          </div>
	          <div class="form-group mt-5">
	            <label for="dob">Date of Birth</label>
	            <datepicker v-model="dob" name="dob" v-validate="'required'"></datepicker>
	            <span class="text-danger">{{ errors.first('dob') }}</span>
	          </div>
	        </div>
	        
	        <div class="col-lg-5 col-md-7 col-sm-9 col-12 mt-4">
	          <div class="form-check terms-check">
	            <input id="termz" type="checkbox" class="form-check-input" svalue="checkedValue" v-model="agreed">
	            <label for="termz" class="form-check-label">I have read and agreed to <router-link to="/terms-and-use"> Terms and Use </router-link></label>
	          </div>  
	          <button class="btn btn-default block-btn" data-toggle="modal" data-target="#code-sent" :disabled="!agreed" @click="validate()">Sign Up</button>
	        </div>
	      </div>
	    </div>
	  </section>
	
	
	  <!-- Modal -->
	  <div class="modal fade login-modal" id="code-sent" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" v-if="showModal">
	    <div class="modal-dialog" role="document">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <i class="far fa-times"></i>
	          </button>
	        </div>
	        <div class="modal-body">
	          <h1 class="common-h">Verify Your phone</h1>
	          <p>We'll text your verification code to <strong>{{ phone_number }}</strong> <br> Standard fees may apply.</p>
	          <button class="btn btn-default block-btn my-4" @click="confirm()">Confirm</button>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
</template>
<script>
import { ModelListSelect } from 'vue-search-select'
import Datepicker from 'vuejs-datepicker';

export default {
	name: 'Register',
	components: {
      ModelListSelect,
      Datepicker
    },
	data () {
		return {
			email: '',
			phone_number: '',
			full_name: '',
			gender: null,
			username: '',
			dob: '',
			hoods: [],
			hood: null,
			genders: [
				{ value: 1, text: 'Male' },
				{ value: 0, text: 'Female' }
			],
			formErrors: [],
			agreed: false,
			showModal: false
		}
	},
	methods: {
		validate () {
			this.$validator.validateAll()
		},
		confirm () {
			let uri = '/api/register';
			axios.post(uri, {
				email: this.email,
				name: this.full_name,
				username: this.username,
				hood_id: this.hood,
				phone_number: this.phone_number,
				gender: this.gender,
				date_of_birth: this.dob
			}).then(response => {
				console.log(response.data.user)
				this.$router.push({ name: 'OTP', params: {id: response.data.user.id} })
			}).catch(error => {
				this.formErrors = error.response.data.error
				var modal = document.getElementById("code-sent")

				modal.hide;
				console.log(error.response)
			})
		}
	},
	created () {
		let uri = '/api/hoods';
		axios.get(uri).then(response => {
			this.hoods = response.data.data
		}).catch(error => {
			console.log(error)
		})
	},
	updated () {
		  if (this.errors.items.length > 0) {
			    this.showModal = false
			} else {
				this.showModal = true
			}
	}
}
</script>
<style scoped>
select2 {

}
</style>