<template>
    <v-main class="py-5">
        <v-container>
            <v-row>
                <div class="box ma-5"></div>


<!--                    <div class="thumbnails mx-2">-->
<!--                        <div-->
<!--                            class="photo my-5 col-sm-6 col-md-4 hover-ef"-->
<!--                            v-for="item in getItems"-->
<!--                            v-on:mouseover="mouseOverAction(item)"-->
<!--                            v-on:mouseleave="mouseLeaveAction(item)"-->
<!--                        >-->
<!--                            <a :href="'/gallery/' + item.post_id">-->
<!--                                <img-->
<!--                                    class="photo__image mw-100 h-auto"-->
<!--                                    :src="getImgUrl(item)"-->
<!--                                >-->
<!--                                <div class="mask">-->
<!--                                    &lt;!&ndash;                                <p class="caption" v-show="hoverFlag && item === hoverIndex ">あああ</p>&ndash;&gt;-->
<!--                                    <v-list-item-icon class="caption" v-show="hoverFlag && item === hoverIndex ">-->
<!--                                        <v-icon class="good-btn">mdi-heart-outline</v-icon>-->
<!--                                    </v-list-item-icon>-->
<!--                                </div>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->

                <div class="my-10">
                    <h4>News/Event</h4>
                    <v-card class="w-100 my-1 pa-5">
                        <table class="table table-hover mx-auto">
                            <thead>
                                <tr>
                                    <th scope="col" width="200">投稿日</th>
                                    <th scope="col" width="250">種類</th>
                                    <th scope="col" width="1000">タイトル</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr v-for="item in news">
                                <td>{{ formatDate(item.created_at) }}</td>
                                <td v-if="item.type === 0">ニュース</td>
                                <td v-if="item.type === 1">イベント</td>
                                <td width="1000">
                                    <a :href="'/news/' + item.id" class="d-block w-100 h-100 text-body">
                                        {{ item.title }}
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-right">
                            <a href="/news" class="text-body more-hvr">> もっと見る</a>
                        </div>
                    </v-card>
                </div>
            </v-row>
        </v-container>
    </v-main>
</template>

<script>
	import dayjs from 'dayjs'
	export default {
		name: "Top",
		props: {
			images: {},
			news: {},
		},
		methods: {
			formatDate: dateStr => dayjs(dateStr).format('YYYY/MM/DD'),
		// 	getImgUrl(img) {
		// 		// すでに存在している写真を表示させる
		// 		let path = ["/uploads/", img.src];
		// 		let path_link = path.join("");
		// 		return path_link
		// 	},
		// 	mouseOverAction(index) {
		// 		this.hoverFlag = true
		// 		this.hoverIndex = index
		// 	},
		// 	mouseLeaveAction() {
		// 		this.hoverFlag = false
		// 	},
		},
	}
</script>

<style scoped>
    .box{
        width: 100%;
        height: 350px;
        background-color: #336699;
    }
    .more-hvr:hover {
        text-decoration: underline!important;
    }
</style>
