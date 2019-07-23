<template>
	<div class="main-wrapper">
        <section class="login">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-5 col-md-8 col-sm-9 col-12 text-center">
                <h1 class="common-h">Verify your phone</h1>
                <div class="mb-4 mt-5">
                  <p>Enter the code to verify <strong>{{ user.phone_number }}</strong></p>
                  <p>The OTP will expire 13:15, 2019 April 28 <a href="#" @click="resend()">Resend Code</a></p>
                  <li class="alert alert-success" v-if="code_resent">{{ code_resent }}</li>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="OTP" v-validate="'required|numeric'" v-model="otp" id="otp" placeholder="Verification Code">
               	  <span class="text-danger" v-if="otp_expired">{{ otp_expired }}</span>
               	  <span class="text-danger" v-if="code_mismatch">{{ code_mismatch }}</span>
                </div>
                <!-- <button class="btn btn-default block-btn" data-toggle="modal" data-target="#verified">Submit</button> -->
                <button class="btn btn-default block-btn" @click="verify()">Submit</button>
    
              </div>
            </div>
          </div>
        </section>
	    <!-- Modal -->
	    <!-- <div class="modal fade login-modal" id="verified" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	        <div class="modal-dialog" role="document">
	          <div class="modal-content">
	            <div class="modal-header">
	              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                <i class="far fa-times"></i>
	              </button>
	            </div>
	            <div class="modal-body">
	              <h1 class="common-h">Congratulation</h1>
	              <p><strong>{{ user.phone_number }}</strong> <br> is Varified.</p>
	              <button class="btn btn-default block-btn mt-4 mb-5">Go to your Profile</button>
	            </div>
	          </div>
	        </div>
	    </div> -->

	</div>
</template>
<script>

export default {
	name: 'OTP',
	data () {
		return {
			user: {},
			otp: null,
			otp_expired: '',
			code_resent: '',
			code_mismatch: ''
		}
	},
	methods: {
		resend () {
			axios.get('/api/resend/code/'+this.user.id).then(response => {
				this.code_resent = response.data.message
				console.log(response.data)
			}).catch(error => {
				console.log(error.data)
			})
		},
		verify () {
			let uri = '/api/verify/otp';
			axios.post(uri, {
				id: this.user.id,
				otp: this.otp
			}).then(response => {
				if (response.data.code == 200) {
					console.log(response.data)
					localStorage.setItem('user_api_token', response.data.success.token)
					this.$store.dispatch('setApiToken', response.data.success.token)
					this.$store.dispatch('setCurrentUser', response.data.user)
					this.$router.push("/")
				} else if(response.data.code == 400) {
					console.log(response.data.message)
					this.code_mismatch = response.data.message
				} else {
					this.otp_expired = response.data.message
					console.log(response.data.message);
				}
			}).catch(error => {
				console.log(error.response)
			})
		}
	},
	created () {
		let uri = `/api/user/${this.$route.params.id}`;
		axios.get(uri).then(response => {
			this.user = response.data.user
			console.log(response.data.otp)
			console.log(response.data.user)
		}).catch(error => {
			console.log(error.data)
		})
	}
}
</script>