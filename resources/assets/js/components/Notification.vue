<template>
	
	<div>
		
	</div>

</template>

<script>
	export default{
		mounted(){
			this.listen()
		},
		props: ['id'],
		methods: {
			listen() {
				Echo.private('App.User.' + this.id)
					.notification( (notification) => {
						swal({
                              title: "Request Accepted",
                              text: notification.name + notification.messsage,
                              icon: "success",
                            });
						document.getElementById("swal_audio").play()
					})
			}
		}
	}
</script>