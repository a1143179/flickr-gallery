
<template>
	<div>
		<img v-for="photo in photos" 
			:data-id="photo.id" 
			v-on:click="flickrInfo" 
			class="flickr-image float-left" 
			:src="photo.url" />
	</div>
</template> 

<script>
	export default {
		
		data: function(){
			return {
				photos: [{id:111,url:'sss'}]
			};
		},
		methods: {
			flickrInfo: function() {}
		}
	};
</script>
