<template>
	<div class="main-wrapper">
	  <section class="edit-battle">
	    <div class="container">
	      <div class="row">
	        <div class="col-12">
	          <h1 class="common-h">Start your own activity</h1>
	        </div>
	      </div>
	      <div class="row"> 
	        <div class="col-lg-5 col-sm-6">
	          <div class="form-group">
	            <label for="sela">Type</label>
	            <select id="sela" type="text" class="form-control">
	              <option value="s">Select</option>
	              <option value="1">1</option>
	              <option value="2">2</option>
	              <option value="3">3</option>
	              <option value="4">4</option>
	              <option value="5">5</option>
	            </select>
	          </div>
	          <div class="form-group">
	            <label for="selb">Category</label>
	            <select id="selb" type="text" class="form-control">
	              <option value="s">Select</option>
	              <option value="2">2</option>
	              <option value="3">3</option>
	              <option value="4">4</option>
	              <option value="5">5</option>
	            </select>
	          </div>
	          <div class="form-group">
	            <label for="ttl">Title <span>Max. 30</span></label>
	            <input id="ttl" type="text" class="form-control">
	          </div>
	          <div class="form-group">
	            <label for="max-groups">Max Number of Groups<span>Max. 30</span></label>
	            <select id="max-groups" type="text" class="form-control">
	              <option value="1">1</option>
	              <option value="2">2</option>
	              <option value="3">3</option>
	              <option value="4">4</option>
	              <option value="5">5</option>
	            </select>
	          </div>
	          <div class="form-group">
	            <label for="max-groups">Description<span>Max. 100</span></label>
	            <textarea id="description" rows="3" class="form-control"></textarea>
	          </div>
	          <div class="form-group">
	            <label for="about">About Us <span>Max. 30</span></label>
	            <input id="about" type="text" class="form-control">
	          </div>
	          <div class="form-group">
	            <label for="mail">Email <span>Max. 30</span></label>
	            <input id="mail" type="email" class="form-control">
	          </div>
	        </div>
	        <div class="col-lg-5 offset-lg-2 col-sm-6">
	          <div class="form-group">
	            <label for="cnumber">Contact Number</label>
	            <input id="cnumber" type="text" class="form-control">
	          </div>
	          <div class="form-group">
	            <label for="mplace">Meetup place</label>
	            <input id="mplace" type="text" class="form-control">
	          </div>
	          <div class="form-group">
	            <div class="img-box">
	              <a href="#" class="remove-img"><i class="far fa-times"></i></a>
	              <img src="#">
	            </div>
	            <input type="file" class="file-holder" onchange="readURL(this);">
	            <button class="btn btn-default block-btn img-uploader">Add Photo</button>
	            <p>Only images (.jpg, .gif, .png) with the file size below 300kb is allowed</p>
	      
	          </div>
	          <div class="form-check">
	            <input id="termz" type="checkbox" class="form-check-input" svalue="checkedValue">
	            <label for="termz" class="form-check-label">I have read and agreed to <a href="#"> Terms and Use </a></label>
	          </div>  
	          <div class="group-btns">
	            <button class="btn btn-default">Update</button>
	            <button class="btn btn-outline">Cancel</button>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>
	</div>
</template>
<script>
export default {
	name: 'Activity',
	data () {
		return {
			// 
		}
	}
}
</script>