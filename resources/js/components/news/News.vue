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
                        <tr v-for="news in newsalls">
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
                </v-card>
            </v-row>
        </v-container>
    </v-main>
</template>

<script>
	import dayjs from 'dayjs'

	export default {
		name: "News",
		props: {
			newsalls: {},
			user: {},
		},
		methods: {
			formatDate: dateStr => dayjs(dateStr).format('YYYY/MM/DD')
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
