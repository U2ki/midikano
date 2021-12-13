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
                                color="indigo lighten-1"
                                elevation="2"
                                class="text-white mx-14"
                            >
                                編集
                            </v-btn>
                            <v-btn
                                color="red accent-4"
                                elevation="2"
                                class="text-white"
                                @click="deleteConfirm(news.id)"
                            >
                                削除
                            </v-btn>
                        </div>
                    </div>
                </v-card>
                <v-dialog v-model="deleteDialog" persistent max-width="290">
                    <v-card>
                        <v-card-title class="headline">削除確認</v-card-title>
                        <v-card-text>本当に削除してもよろしいですか？</v-card-text>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="green darken-1" text @click="deleteDialog = false">キャンセル</v-btn>
                            <v-btn color="green darken-1" text @click="deleteItem(deleteID)">削除</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
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
		data() {
			return {
				deleteDialog: false,
			    deleteID: null,
		    }
		},
		methods: {
			formatDate: dateStr => dayjs(dateStr).format('YYYY/MM/DD'),

			// 削除確認ダイアログ表示を追加
			deleteConfirm(id) {
				this.deleteDialog = true;
				this.deleteID = id;
			},
			// 削除実行
			deleteItem(id) {
				axios.delete('/news/' + id)
					.then( (res) => {
						window.location.href = '/news';
					})
					.catch( (error) => {
						console.log(error);
					})
				this.deleteDialog = false;	// 最後に削除確認ダイアログは閉じます。
			},
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
