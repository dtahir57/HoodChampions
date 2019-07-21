<template>
	<div class="main-wrapper">
	  <section class="edit-battle">
	    <div class="container">
	      <div class="row">
	        <div class="col-12">
	          <h1 class="common-h">CREATE YOUR TEAM</h1>
	        </div>
	      </div>
	      <div class="row"> 
	        <div class="col-lg-5 col-sm-6">
	          <div class="form-group">
	            <label for="ttl">Title <span>Max. 30</span></label>
	            <input id="ttl" name="Title" v-validate="'required|max:30'" type="text" class="form-control">
	            <span class="text-danger">{{ errors.first('Title') }}</span>
	          </div>
	          <div class="form-group">
	            <label for="max-groups">Max Number of Members</label>
	            <input type="number" name="Members" v-validate="'required|numeric'" class="form-control">
	            <span class="text-danger">{{ errors.first('Members') }}</span>
	          </div>
	          <div class="form-group">
	            <label for="max-groups">Description<span>Max. 100</span></label>
	            <textarea id="description" name="Description" v-validate="'required|max:100'" rows="3" class="form-control"></textarea>
	            <span class="text-danger">{{ errors.first('Description') }}</span>
	          </div>
	          <div class="form-group">
	            <label for="about">About Us <span>Max. 30</span></label>
	            <input id="about" name="About Us" v-validate="'required|max:30'" type="text" class="form-control">
	            <span class="text-danger">{{ errors.first('About Us') }}</span>
	          </div>
	          <div class="form-group">
	            <label for="mail">Email <span>Max. 30</span></label>
	            <input id="mail" name="Email" v-validate="'required|max:30'" type="email" class="form-control">
	            <span class="text-danger">{{ errors.first('Email') }}</span>
	          </div>
	        </div>
	        <div class="col-lg-5 offset-lg-2 col-sm-6">
	          <div class="form-group">
	            <label for="cnumber">Contact Number</label>
	            <input id="cnumber" name="Contact Number" v-validate="'required'" type="text" class="form-control">
	            <span class="text-danger">{{ errors.first('Contact Number') }}</span>
	          </div>
	          <div class="form-group">
	            <label for="mplace">Meetup place</label>
	            <input id="mplace" name="Meetup Place" v-validate="'required'" type="text" class="form-control">
	            <span class="text-danger">{{ errors.first('Meetup Place') }}</span>
	          </div>
	          <div class="form-group">
	            <div class="uimg-holder" v-if="data.image">
	              <a href="javascript:void(0)" @click="removeImage" class="remove-img"><i class="far fa-times"></i></a>
	              <img :src="data.image">
	            </div>
				<div class="img-clone" v-if="!data.image">
				</div>
	            <div class="upload-btn-wrapper">
	            	<input type="file" @change="onImageChange" v-if="!data.image" name="Image" v-validate="'required'">
	            	<span class="text-danger">{{ errors.first('Image') }}</span>
	            	<button class="btn btn-default block-btn" v-if="!data.image">Add Photo</button>
					<button class="btn btn-outline block-btn" disabled v-if="data.image">Photo Added</button>
	        	</div>
	            <p>Only images (.jpg, .gif, .png) with the file size below 300kb is allowed</p>
	      
	          </div>
	          <div class="form-check">
	            <input id="termz" type="checkbox" class="form-check-input" v-model="agreed" svalue="checkedValue">
	            <label for="termz" class="form-check-label">I have read and agreed to <a href="#"> Terms and Use </a></label>
	          </div>  
	          <div class="group-btns">
	            <button class="btn btn-default" :disabled="!agreed" @click="save">Save</button>
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
	name: 'CreateTeam',
	data () {
		return {
			data: {
				title: '',
				max_no_of_members: null,
				description: '',
				about_us: '',
				email: '',
				contact_no: '',
				meetup_place: '',
				image: ''
			},
			agreed: false
		}
	},
	methods: {
		onImageChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.createImage(files[0]);
        },
        createImage(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.data.image = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        removeImage () {
        	this.data.image = ''
        },
        save () {
        	this.$validator.validate()
        }
	}
}
</script>
<style scoped>
.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
  width: 100%;
}
.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
</style>