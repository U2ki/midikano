<template>
    <v-main class="py-5">
        <v-container>
            <v-row>
                <div class="box ma-5"></div>
                <div class="w-100 ma-15">
                    <h4 class="font-weight-bolder">新着の投稿</h4>
                    <div v-show="$mq === 'xs' || $mq === 'sm'">
                        <carousel
                            ref="carousel"
                            :per-page="1"
                            :navigation-enabled="true"
                            navigation-prev-label="〈"
                            navigation-next-label="〉"
                            @pageChange="onPageChange"
                            class="mt-8 carsel"
                        >
                            <slide
                                v-for="item in images"
                                v-bind:key="item.id"
                            >
                                <a :href="'/gallery/' + item.post_id">
                                    <img
                                        class="photo__image mw-100 slide"
                                        :src="getImgUrl(item)"
                                    >
                                </a>
                            </slide>
                        </carousel>
                    </div>
                    <div v-show="$mq === 'md' || $mq === 'lg' || $mq === 'xl'">
                        <carousel
                            ref="carousel"
                            :per-page="3"
                            :navigation-enabled="true"
                            navigation-prev-label="〈"
                            navigation-next-label="〉"
                            @pageChange="onPageChange"
                            class="mt-8 carsel"
                        >
                            <slide
                                v-for="item in images"
                                v-bind:key="item.id"
                            >
                                <a :href="'/gallery/' + item.post_id">
                                    <img
                                        class="photo__image mw-100 slide"
                                        :src="getImgUrl(item)"
                                    >
                                </a>
                            </slide>
                        </carousel>
                    </div>
                    <div class="text-right">
                        <a href="/gallery" class="text-body more-hvr">> もっと見る</a>
                    </div>
                </div>
                <div class="w-100 ma-15">
                    <h4 class="font-weight-bolder">いいねの多い投稿</h4>
                    <div v-show="$mq === 'xs' || $mq === 'sm'">
                        <carousel
                            ref="carousel"
                            :per-page="1"
                            :navigation-enabled="true"
                            navigation-prev-label="〈"
                            navigation-next-label="〉"
                            @pageChange="onPageChange"
                            class="mt-8 carsel"
                        >
                            <slide
                                v-for="item in images"
                                v-bind:key="item.id"
                            >
                                <a :href="'/gallery/' + item.post_id">
                                    <img
                                        class="photo__image mw-100 slide"
                                        :src="getImgUrl(item)"
                                    >
                                </a>
                            </slide>
                        </carousel>
                    </div>
                    <div v-show="$mq === 'md' || $mq === 'lg' || $mq === 'xl'">
                        <carousel
                            ref="carousel"
                            :per-page="3"
                            :navigation-enabled="true"
                            navigation-prev-label="〈"
                            navigation-next-label="〉"
                            @pageChange="onPageChange"
                            class="mt-8 carsel"
                        >
                            <slide
                                v-for="item in images"
                                v-bind:key="item.id"
                            >
                                <a :href="'/gallery/' + item.post_id">
                                    <img
                                        class="photo__image mw-100 slide"
                                        :src="getImgUrl(item)"
                                    >
                                </a>
                            </slide>
                        </carousel>
                    </div>
                    <div class="text-right">
                        <a href="/gallery" class="text-body more-hvr">> もっと見る</a>
                    </div>
                </div>
                <div class="ma-15">
                    <h4 class="font-weight-bolder">News/Event</h4>
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
	import { Carousel, Slide } from 'vue-carousel';
	export default {
		name: "Top",
		props: {
			images: {},
			news: {},
		},
		components: {
			Carousel,
			Slide
		},
		data() {
			return {
				preIndex: 0
			};
        },
		methods: {
			formatDate: dateStr => dayjs(dateStr).format('YYYY/MM/DD'),
			onPageChange: function(index) {
				this.preIndex = index;
			},
			getImgUrl(img) {
				// すでに存在している写真を表示させる
				let path = ["/thumbnail/", img.src];
				let path_link = path.join("");
				return path_link
			},
			mouseOverAction(index) {
				this.hoverFlag = true
				this.hoverIndex = index
			},
			mouseLeaveAction() {
				this.hoverFlag = false
			},
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
    .slide {
        position: relative;
        height: auto;
        width: 300px;
        margin: 0 auto;
        padding: 0.5rem;
    }
    img:hover {
        opacity: 0.6;
    }

    /deep/ .VueCarousel-slide {
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        max-height: 330px;
        max-width: 300px;
    }

    /deep/ .VueCarousel-dot-container {
        margin-top: 0!important;
    }
</style>
