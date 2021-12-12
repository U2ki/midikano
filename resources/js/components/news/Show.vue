<template>
    <v-main class="py-5">
        <v-container>
            <v-row justify="center">
                <h1 class="font-weight-bold text-h4 basil--text my-10 page-title">
                    ニュース | 詳細
                </h1>
                <v-card class="w-100 my-5">
                    <div class="my-10 mx-8">
                        <h2 class="text-center">{{ news.title }}</h2>
                        <p class="text-right">{{ formatDate(news.updated_at) }}</p>
                        <div class="type-line py-1 mt-1 mb-5 ms-10">
                            <p v-if="news.type === 0">ニュース</p>
                            <p v-if="news.type === 1">イベント</p>
                        </div>
                        <pre class="ma-16 body-1">{{ news.content }}</pre>
                    </div>
                    <v-divider inset class="my-0 mx-auto"></v-divider>
                    <div class="d-flex">
                        <div class="my-10 mx-16">
                            <v-btn
                                color="secondary"
                                elevation="2"
                                onClick="history.back(); return false;"
                            >
                                戻る
                            </v-btn>
                        </div>
                        <div class="my-10 mx-16 w-100 d-flex justify-content-end">
                            <v-btn
                                href="/news/create"
                                color="indigo lighten-1"
                                elevation="2"
                                class="text-white mx-14"
                            >
                                編集
                            </v-btn>
                            <v-btn
                                href="/news/create"
                                color="red accent-4"
                                elevation="2"
                                class="text-white"
                            >
                                削除
                            </v-btn>
                        </div>
                    </div>
                </v-card>
            </v-row>
        </v-container>
    </v-main>
</template>

<script>
	import dayjs from 'dayjs'

	export default {
		name: "Show",
		props: {
			news: {},
			userStatus: {},
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
    .type-line {
        background-color: #0d47a1;
        width: 9%;
    }
    .type-line p {
        color: white;
        font-weight: bold;
        text-align: center;
        margin: 0;
    }
</style>
