<template>
	<div class="main-wrapper">
	  <group-view :groups="groups" :categories="categories" :hoodgroups="hoodgroups"></group-view>
	</div>
</template>
<script>
import Group from '@/components/AL/Group.vue'

export default {
	name: 'Group',
	components: {
		'group-view' : Group
	},
	data () {
		return {
			groups: [],
			categories: [],
			hoodgroups: []
		}
	},
	created () {
		let uri = '/api/interest_groups';
		axios.get(uri, {
			headers: {
				"Accept": "application/json",
				"Authorization": `Bearer ${localStorage.getItem('user_api_token')}`
			}
		}).then(response => {
			this.groups = response.data.interest_groups
			this.hoodgroups = response.data.hood_groups
			this.categories = response.data.categories
		}).catch(error => {
			console.log(error.response)
		})
	}
}
</script>