<template>
<article>
    <div class="post" v-for="post in posts">
    	<div class="post_dot"></div>
        <div class="post-arrow"></div>
        <div class="post_date">{{ post.created_at }} </div>
        <div class="row-fluid post_top">
            <div class="small_pic"><img :src="post.user.avatar" alt="" width="40px" height="40px"></div>
            <h3>{{ post.user.name }}</h3>
        </div>
        <img src="post.user.avatar" class="post_img" alt="" />
        <p>{{ post.content }}</p>
        <p class="likenwin">"Like" This Contest Entry To Help This Person Win $500.00</p>
        <hr />
        <div class="row-fluid post_btm">
            <div class="post_like">
                <i class="fa fa-heart"></i> <span><like :id="post.id"></like></span>
            </div>
            <div class="post_comment"> <input type="text" /> </div>
            <div class="post_property">
            	<i class="fa fa-ellipsis-v"></i>
            	<div class="report_box">
                	<div><a href="">report</a> </div>
                    <div><a href="">block </a></div>
                </div>
            </div>
        </div>
    </div>

</article>
</template>

<script>
	import Like from './Like.vue'
	export default {
		mounted() {
			this.get_feed()
		},
		components: {
			Like
		},
		methods: {
			get_feed() {
				this.$http.get('/feed')
					.then((response) => {
						response.body.forEach( (post) => {
							this.$store.commit('add_post', post)
						})
					})
			}
		},
		computed: {
			posts() {
				return this.$store.getters.all_posts 
			}
		}
	}
</script>