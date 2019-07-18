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
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="OTP" v-validate="'required|numeric'" v-model="otp" id="otp" placeholder="Verification Code">
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
	              <h1 class="common-h">Congratation</h1>
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
			otp: null
		}
	},
	methods: {
		resend () {
			axios.get('/api/resend/'+this.user.id).then(response => {
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
				if (response.data.code !== 401) {
					localStorage.setItem('user_api_token', response.data.user.token)
					this.$store.dispatch('setApiToken', response.data.success.token);
					this.$router.push("/")
				} else {
					console.log('Error')
				}
				console.log(response);
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
			console.log(response.data)
		}).catch(error => {
			console.log(error.data)
		})
	}
}
</script>