<template>
    <v-main class="py-5">
        <v-container>
            <v-row justify="center">
                <h1 class="font-weight-bold text-h4 basil--text my-10 page-title">
                    ニュース
                </h1>
                <v-card class="w-100 my-5">
                    <div class="my-10 mx-16 d-flex justify-content-end">
                        <v-btn
                            href="/news/create"
                            v-show="user > 0"
                            color="primary"
                            elevation="2"
                            class="ms-auto"
                        >
                            新規作成
                        </v-btn>
                    </div>
                    <table class="table mx-auto my-10">
                        <thead>
                            <tr>
                                <th scope="col" width="1000">タイトル</th>
                                <th scope="col" width="300">種類</th>
                                <th scope="col">投稿日</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr v-for="news in getItems">
                                <td>
                                    <a :href="'/news/' + news.id" class="title-url d-block w-100 h-100">
                                      {{ news.title }}
                                    </a>
                                </td>
                                <td v-if="news.type === 0">ニュース</td>
                                <td v-if="news.type === 1">イベント</td>
                                <td>{{ formatDate(news.created_at) }}</td>
                        </tr>
                        </tbody>
                    </table>
                    <vuejs-paginate
                        :page-count="getPaginateCount"
                        :prev-text="'<'"
                        :next-text="'>'"
                        :click-handler="paginateClickCallback"
                        :container-class="'pagination justify-content-center'"
                        :page-class="'page-item'"
                        :page-link-class="'page-link'"
                        :prev-class="'page-item'"
                        :prev-link-class="'page-link'"
                        :next-class="'page-item'"
                        :next-link-class="'page-link'"
                        :first-last-button="true"
                        :first-button-text="'<<'"
                        :last-button-text="'>>'"
                    ></vuejs-paginate>
                </v-card>
            </v-row>
        </v-container>
    </v-main>
</template>

<script>
	import dayjs from 'dayjs'
	import VueJsPaginate from "vuejs-paginate";

	export default {
		name: "News",
		props: {
			newsalls: {},
			user: {},
		},
		components: {
			"vuejs-paginate": VueJsPaginate,
		},
		data: function () {
			return {
				currentPage: 1,
				perPage: 10,
			};
		},
		computed: {
			getItems: function () {
				let start = (this.currentPage - 1) * this.perPage;
				let end = this.currentPage * this.perPage;
				return this.newsalls.slice(start, end);
			},
			getPaginateCount: function () {
				return Math.ceil(this.newsalls.length / this.perPage);
			},
		},
		methods: {
			formatDate: dateStr => dayjs(dateStr).format('YYYY/MM/DD'),
			paginateClickCallback: function (pageNum) {
				this.currentPage = Number(pageNum);
			},
		},
		mounted() {
			console.log(this.newsalls.length)
        },
	}
</script>

<style scoped>
    table {
        width: 85%;
    }
    .title-url {
        color: black!important;
    }
</style>
