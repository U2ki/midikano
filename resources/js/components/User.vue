<template>
    <v-main class="py-5">
        <v-container>
            <v-row justify="center">
                <v-card class="w-100 my-16">
                    <div class="ma-16">
                        <p class="mb-14"><span class="font-weight-bold">ユーザー名</span>： {{name}}</p>
                        <PostLog :user="user" :images="img" :newsalls="news"></PostLog>
                    </div>
                </v-card>
            </v-row>
        </v-container>
    </v-main>
</template>

<script>
	import PostLog from './mypage/PostLog';

	export default {
		name: "Home",
		props: {
			name: {},
			status: {},
			img: {},
			news: {},
			good: {},
			comment: {},
		},
		components: {
			PostLog,
		},
		data () {
			return {
                user: { name: this.name, status: this.status }
			}
		},
	}
</script>

<style scoped>
    .v-tab--active {
        background-color: #E7EFFA!important;
    }
</style>
