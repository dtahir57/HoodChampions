<template>
	<div class="main-wrapper">
        <section class="login">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-5 col-md-8 col-sm-9 col-12 text-center">
                <h1 class="common-h">login</h1>
                <li class="alert alert-danger" v-if="server_error">{{ server_error }}</li>
                <!-- <facebook-login class="button"
                      appId="369760443724755"
                      @login="getUserData"
                      @logout="onLogout"
                      @get-initial-status="getUserData">
                    </facebook-login> -->
                <button class="btn btn-fb block-btn"><i class="fab fa-facebook"></i> Countinue with Facebook</button>
                <div class="or">
                  <p>or</p>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="Phone Number" v-validate="'required|numeric'" v-model="phoneNumber" placeholder="Phone Number">
                  <span class="text-danger">{{ errors.first('Phone Number') }}</span>
                  <span class="text-danger" v-if="invalid_phone">{{ invalid_phone }}</span>
                  <div class="mark">
                    <i class="far fa-times"></i>
                    <i class="far fa-check"></i>
                  </div>
                  <div class="v-text">
                    <p class="requirement">
                      Please use a Mobile Device capable of receiving SMSes (Short Messeging Services) for registeration.
                    </p>
                  </div>
                </div>
                <button class="btn btn-default block-btn" @click="validate" :disabled="!phoneNumber" data-toggle="modal" data-target="#code-sent">Login</button>
                <p>Do not have an account? <router-link to="/Register">Sign Up</router-link></p>
    
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
                  <p>We'll text your verification code to <strong>{{ phoneNumber }}</strong> <br> Standard fees may apply.</p>
                  <button class="btn btn-default block-btn my-4" @click="login" data-dismiss="modal">Confirm</button>
                </div>
              </div>
            </div>
        </div>
      </div>
</template>
<script>
import facebookLogin from 'facebook-login-vuejs';

export default {
	name: 'Login',
  components: {
        facebookLogin
    },
	data () {
		return {
			phoneNumber: '',
      showModal: false,
      invalid_phone: '',
      server_error: ''
		}
	},
  methods: {
    validate () {
      this.$validator.validateAll()
    },
    login () {
      let uri = '/api/login'
      axios.post(uri, {
        phone_number: this.phoneNumber
      }).then(response => {
        console.log(response.data)
        if (response.data.code == 200) {
          this.$router.push({ name: 'OTP', params: {id: response.data.user.id} })
        } else if (response.data.code == 400) {
          this.invalid_phone = response.data.message
        } else {
          this.server_error = response.data.error
        }
      }).catch(error => {
        console.log(error.response.data)
      })
    }
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