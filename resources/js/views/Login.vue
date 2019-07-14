<template>
	<div class="main-wrapper">
        <section class="login">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-5 col-md-8 col-sm-9 col-12 text-center">
                <h1 class="common-h">login</h1>
                <button class="btn btn-fb block-btn"><i class="fab fa-facebook"></i> Countinue with Facebook</button>
                <div class="or">
                  <p>or</p>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="phone-num" v-model="phoneNumber" placeholder="Phone Number">
                  <div class="mark">
                    <i class="far fa-times"></i>
                    <i class="far fa-check"></i>
                  </div>
                  <div class="v-text">
                    <p class="requirement">
                      Please use a Mobile Device capable of receiving SMSes (Short Messeging Services) for registeration.
                    </p>
                    <p class="valid">Your phone is valid.</p>
                  </div>
                </div>
                <button class="btn btn-default block-btn" :disabled="!phoneNumber" data-toggle="modal" data-target="#code-sent">Login</button>
                <p>Do not have an account? <router-link to="/Register">Sign Up</router-link></p>
    
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
export default {
	name: 'Login',
	data () {
		return {
			phoneNumber: ''
		}
	}
}
</script>