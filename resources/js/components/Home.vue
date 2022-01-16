<template>
    <v-main class="py-5">
        <v-container>
            <v-row justify="center">
                <v-card class="w-100 my-16">
                    <v-tabs
                        v-model="tab"
                        background-color="transparent"
                        grow
                        class="border-bottom"
                    >
                        <v-tab
                            v-for="item in items"
                            :key="item"
                        >
                            {{ item }}
                        </v-tab>
                    </v-tabs>

                    <v-tabs-items v-model="tab">
                        <v-tab-item>
                            <v-card class="pa-10">
                                <v-card-text>
                                    <Info :user="user"></Info>
                                </v-card-text>
                            </v-card>
                        </v-tab-item>
                        <v-tab-item>
                            <v-card class="pa-10">
                                <v-card-text>
                                    <PostLog :user="user" :images="img" :newsalls="news"></PostLog>
                                </v-card-text>
                            </v-card>
                        </v-tab-item>
                        <v-tab-item>
                            <v-card class="pa-10">
                                <v-card-text>
                                    <Goodlog :images="good"></Goodlog>
                                </v-card-text>
                            </v-card>
                        </v-tab-item>
                        <v-tab-item>
                            <v-card class="pa-10">
                                <v-card-text>
                                    <CommentLog :images="comment"></CommentLog>
                                </v-card-text>
                            </v-card>
                        </v-tab-item>
                    </v-tabs-items>
                </v-card>
            </v-row>
        </v-container>
    </v-main>
</template>

<script>
	import Info from './mypage/Info.vue';
	import PostLog from './mypage/PostLog';
	import Goodlog from './mypage/GoodLog';
	import CommentLog from './mypage/CommentLog';

	export default {
		name: "Home",
		props: {
			user: {},
			img: {},
			news: {},
			good: {},
			comment: {},
		},
		components: {
			Info,
			PostLog,
			Goodlog,
			CommentLog,
		},
		data () {
			return {
				tab: null,
				items: [
					'登録情報', '投稿履歴', 'いいね履歴', 'コメント履歴',
				],
			}
		},
	}
</script>

<style scoped>
    .v-tab--active {
        background-color: #E7EFFA!important;
    }
</style>
