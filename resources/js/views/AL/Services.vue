<template>
	<div class="main-wrapper">
	  <service :services="services"></service>
	</div>
</template>
<script>
import Service from '@/components/AL/Service.vue'

export default {
	name: 'Services',
	components: {
		'service': Service
	},
	data () {
		return {
			services: []
		}
	},
	created () {
		let uri = '/api/services';
		axios.get(uri, {
			headers: {
				"Accept": "application/json",
				"Authorization": `Bearer ${localStorage.getItem('user_api_token')}`
			}
		}).then(response => {
			this.services = response.data.services
		}).catch(error => {
			console.log(error.response)
		})
	}
}
</script>