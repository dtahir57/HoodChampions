<template>
	<div class="main-wrapper">
	  <service :services="services"></service>
	</div>
</template>
<script>
import { config } from '@/config/'
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
		axios.get(uri, config).then(response => {
			this.services = response.data.services
		}).catch(error => {
			console.log(error.response)
		})
	}
}
</script>