<template>
    <v-main class="py-5">
        <v-container>
            <v-row justify="center">
                <v-alert
                    v-model="alert"
                    border="left"
                    close-text="Close Alert"
                    color="#1976d2"
                    height="52"
                    dark
                    dismissible
                    class="alert"
                >
                    作成できました。
                </v-alert>
                <h1 class="font-weight-bold text-h4 basil--text my-10 page-title">
                    ニュース | 詳細
                </h1>
                <v-card class="w-100 my-5">
                    <div class="my-10 mx-8">
                        <h2 class="text-center">{{ news.title }}</h2>
                        <p class="text-right">{{ formatDate(news.created_at) }}</p>
                        <div class="type-line py-1 mt-1 mb-5 ms-10">
                            <p v-if="news.type === 0">ニュース</p>
                            <p v-if="news.type === 1">イベント</p>
                        </div>
                        <pre class="ma-16 body-1">{{ news.content }}</pre>
                        <p class="ms-8 mb-0">( 投稿者: {{name}} )</p>
                    </div>
                    <v-divider inset class="my-0 mx-auto"></v-divider>
                    <div class="d-flex">
                        <div class="my-10 mx-16">
                            <v-btn
                                color="secondary"
                                elevation="2"
                                href="/news/"
                            >
                                戻る
                            </v-btn>
                        </div>
                        <div class="my-10 mx-16 w-100 d-flex justify-content-end">
                            <v-btn
                                color="indigo lighten-1"
                                v-show="user > 0 && right === 1"
                                elevation="2"
                                class="text-white mx-14"
                                @click="show"
                            >
                                編集
                            </v-btn>
                            <v-btn
                                color="red accent-4"
                                v-show="user > 0 && right === 1"
                                elevation="2"
                                class="text-white"
                                @click="deleteConfirm(news.id)"
                            >
                                削除
                            </v-btn>
                        </div>
                    </div>
                </v-card>
                <!-- 編集のモーダルウィンドウ -->
                <modal name="editModal" :adaptive="true" :resizable="true" :minHeight="550">
                    <div class="modal-header py-0">
                        <h4 class="my-auto">編集</h4>
                        <div class="my-2 text-right">
                            <v-btn
                                color="secondary"
                                elevation="2"
                                v-on:click="hide"
                            >
                                閉じる
                            </v-btn>
                        </div>
                    </div>
                    <div class="modal-body">
                        <v-form
                            ref="form"
                            v-model="valid"
                            lazy-validation
                            class="px-sm-7 px-md-5 w-75 mx-auto my-2"
                        >
                            <v-text-field
                                v-model="title"
                                :rules="titleRules"
                                label="タイトル"
                                required
                                outlined
                            ></v-text-field>
                            <v-select
                                v-model="select"
                                :items="items"
                                :rules="[v => !!v || '種類を選択してください']"
                                label="種類"
                            ></v-select>
                            <v-textarea
                                v-model="body"
                                outlined
                                :rules="[v => !!v || '内容を記入してください']"
                                label="内容"
                                class="mt-6"
                                height="200"
                                required
                            ></v-textarea>
                            <div class="text-center mt-2">
                                <v-btn
                                    color="primary"
                                    :disabled='!isComplete'
                                    @click="onSubmit()"
                                >
                                    編集
                                </v-btn>
                            </div>
                            <vue-loading type="spiningDubbles" v-if="loadShow" color="#333" :size="{ width: '50px', height: '50px' }"></vue-loading>
                        </v-form>
                    </div>
                </modal>
                <!-- 削除のダイアログ -->
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
	import { VueLoading } from 'vue-loading-template'

	export default {
		name: "Show",
		props: {
			news: {},
			name: {},
			right: {},
			user: {},
		},
		computed: {
			isComplete () {
				return this.title && this.body;
			}
		},
		data() {
			return {
				loadShow: false,
				deleteDialog: false,
			    deleteID: null,
				alert: false,
				valid: true,
				title: this.news.title,
				titleRules: [
					v => !!v || '必須です',
				],
				items: [
					'ニュース',
					'イベント',
				],
				select: '',
				body: this.news.content,
		    }
		},
		methods: {
			formatDate: dateStr => dayjs(dateStr).format('YYYY/MM/DD'),

            // modal
			show : function() {
				this.$modal.show('editModal');
			},
			hide : function () {
				this.$modal.hide('editModal');
			},

            // 編集
			onSubmit: function() {
				var self = this;
				this.show = true;

				var params = {
					title: this.title,
					select: this.select,
					body: this.body
				};
				axios.put('/news/' + this.news.id, params)
					.then(response => {
						this.$refs.form.reset()
						this.alert = true;
						$('.alert').fadeIn("slow", function () {
							$(this).delay(3000).fadeOut("slow");
						});
						location.reload();
					})
					.catch(error => {
						console.log(error)
					})
					.then(function(){
						self.show = false;
					});
			},

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
