<template>
	<div class="main-wrapper">
	  <section class="login">
	    <div class="container">
	      <h1 class="common-h">Create an Account</h1>
	      <div class="row justify-content-center">
	        <div class="col-md-6">
	          <div class="form-group">
	            <input type="email" class="form-control" placeholder="Email" id="reg_mail">
	            <div class="mark">
	              <i class="far fa-times"></i>
	              <i class="far fa-check"></i>
	            </div>
	            <div class="v-text">
	              <p class="invalid">Please fill in a valid email address.</p>
	              <p class="valid">Looks Good.</p>
	            </div>
	          </div>
	          <div class="form-group">
	            <input type="text" class="form-control" placeholder="Full Name" id="full_name">
	            <div class="mark">
	              <i class="far fa-times"></i>
	              <i class="far fa-check"></i>
	            </div>
	            <div class="v-text">
	              <p class="invalid">Please fill in your full name</p>
	              <p class="valid">Looks Good.</p>
	            </div>
	          </div>
	          <div class="form-group">
	            <input type="text" class="form-control" placeholder="Username" id="user_name">
	            <div class="mark">
	              <i class="far fa-times"></i>
	              <i class="far fa-check"></i>
	            </div>
	            <div class="v-text">
	              <p class="invalid">Please fill in a valid and unique username, no spaces, no capital letters and cannot start with a number</p>
	              <p class="valid">Looks Good.</p>
	            </div>
	          </div>
	          <div class="form-group">
	            <model-list-select :list="hoods"
	                                 v-model="hood"
	                                 option-value="id"
	                                 option-text="planning_area_name"
	                                 placeholder="Residential Neighbourhood">
	              </model-list-select>
	          </div>
	        </div>
	        <div class="col-md-6">
	          <div class="form-group">
	            <input type="text" class="form-control" id="reg_phone" placeholder="Phone Number">
	            <div class="mark">
	              <i class="far fa-times"></i>
	              <i class="far fa-check"></i>
	            </div>
	            <div class="v-text">
	              <p class="invalid">Your phone number is invalid.</p>
	              <p class="valid">Looks Good.</p>
	            </div>
	          </div>
	          <div class="form-group">
	            <model-list-select :list="genders"
	                                 v-model="gender"
	                                 option-value="value"
	                                 option-text="text"
	                                 placeholder="Select Gender">
	              </model-list-select>
	          </div>
	          <div class="form-group mt-5">
	            <label for="dob">Date of Birth</label>
	            <datepicker v-model="dob"></datepicker>
	          </div>
	        </div>
	        
	        <div class="col-lg-5 col-md-7 col-sm-9 col-12 mt-4">
	          <div class="form-check terms-check">
	            <input id="termz" type="checkbox" class="form-check-input" svalue="checkedValue">
	            <label for="termz" class="form-check-label">I have read and agreed to <a href="#"> Terms and Use </a></label>
	          </div>  
	          <button class="btn btn-default block-btn" data-toggle="modal" data-target="#code-sent">Sign Up</button>
	          <p>Already have an account? <router-link to="/Login">Login</router-link></p>
	        </div>
	      </div>
	    </div>
	  </section>
	
	
	  <!-- Modal -->
	  <div class="modal fade login-modal" id="code-sent" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <i class="far fa-times"></i>
	          </button>
	        </div>
	        <div class="modal-body">
	          <h1 class="common-h">Verify Your phone</h1>
	          <p>We'll text your verification code to <strong>9213812333</strong> <br> Standard fees may apply.</p>
	          <button class="btn btn-default block-btn my-4">Confirm</button>
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
			gender: '',
			username: '',
			dob: '',
			residential_neighbourhood: '',
			hoods: [],
			hood: '',
			genders: [
				{ value: 1, text: 'Male' },
				{ value: 2, text: 'Female' }
			]
		}
	},
	created () {
		let uri = '/api/hoods';
		axios.get(uri).then(response => {
			this.hoods = response.data.data
		}).catch(error => {
			console.log(error)
		})
	}
}
</script>
<style scoped>
select2 {

}
</style>