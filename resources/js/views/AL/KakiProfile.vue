<template>
	<div class="main-wrapper">
	  <section class="friend-profile">
	    <div class="container-fluid p-0">
	      <div class="row no-gutters">
	        <div class="col-lg-4 col-md-5">
	          <div class="profile-details">
	            <div class="img-holder">
	              <img src="images/person.jpg" alt="img">
	            </div>
	            <h6>Joel Wong</h6>
	            <p><i class="far fa-map-marker-alt"></i> Ang Mo Kio</p>
	            <ul>
	              <li>Age: 00s</li>
	              <li>Gender: M</li>
	            </ul>
	              <button class="btn btn-outline">Your Kaki</button>
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
	                <div class="col-lg-4 col-6 col-xs-12">
	                  <div class="group">
	                    <div class="img-holder">
	                      <img src="images/dance.jpg" class="img-fluid" alt="img">
	                    </div>
	                    <a href="#">Dancing</a>
	                    <p><i class="fal fa-user-circle"></i> 15</p>
	                  </div>
	                </div>
	                <div class="col-lg-4 col-6 col-xs-12">
	                  <div class="group">
	                    <div class="img-holder">
	                      <img src="images/swim.jpg" class="img-fluid" alt="img">
	                    </div>
	                    <a href="#">Swiming</a>
	                    <p><i class="fal fa-user-circle"></i> 15</p>
	                  </div>
	                </div>
	                <div class="col-lg-4 col-6 col-xs-12">
	                  <div class="group">
	                    <div class="img-holder">
	                      <img src="images/abstract.jpg" class="img-fluid" alt="img">
	                    </div>
	                    <a href="#">Painting</a>
	                    <p><i class="fal fa-user-circle"></i> 15</p>
	                  </div>
	                </div>
	              </div>
	            </div>
	            <div class="block">
	              <h1 class="common-h">Teams</h1>
	              <div class="not-any">
	                <p>Joel Wong has not joined any Teams</p>
	                <button class="btn btn-default">Descover New Teams</button>
	              </div>
	            </div>
	            <div class="block">
	              <h1 class="common-h">Battles</h1>
	              <div class="not-any">
	                <p>Joel Wong has not joined any Battles</p>
	                <button class="btn btn-default">Descover New Battles</button>
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
export default {
	name: 'KakiProfile',
	data () {
		return {
			// 
		}
	}
}
</script>