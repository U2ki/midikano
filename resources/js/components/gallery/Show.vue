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
                    ギャラリー | 詳細
                </h1>
                <v-card class="w-100 my-5">
                    <div class="my-10 mx-8">
                        <p class="text-right ma-0">{{ formatDate(post.created_at) }}</p>
                        <div class="float-right my-sm-10 mx-5">
                            <button
                                v-if="status == false"
                                type="button"
                                @click.prevent="like_check"
                                v-on:click="userError"
                                class="icon-waku"
                            >
                                <v-icon class="icon">mdi-heart</v-icon>
                            </button>
                            <p v-if="status == false" class="text-center">{{count}}</p>

                            <button
                                v-else type="button"
                                @click.prevent="like_check"
                                v-on:click="userError"
                                class="icon-waku"
                            >
                                <v-icon class="icon" color="#CC3333">mdi-heart</v-icon>
                            </button>
                            <p v-if="status == true" class="text-center">{{count}}</p>
                        </div>
                        <div class="ma-10 text-center">
                            <div class="position-static col-12 mb-4 p-0">
                                <vue-three-sixty
                                    :amount=image.length
                                    imagePath="/uploads"
                                    :fileName="getImgName(image)"
                                    spinReverse
                                    autoplay
                                    buttonClass="dark"
                                    scrollImage
                                    class="image-360"
                                >
                                </vue-three-sixty>
                            </div>
                        </div>
                        <pre class="mx-auto my-15 w-75 body-1">{{ post.content }}</pre>
                        <p class="my-5 me-5 text-right atag"><a :href="'/user/'+userid">( 投稿者: {{name}} )</a></p>
                        <div class="my-16">
                            <div class="ma-2">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#writeComment" aria-expanded="false" aria-controls="writeComment">
                                    コメントを書く
                                </button>
                            </div>
                            <div class="collapse ma-2" id="writeComment">
                                <div class="card card-body">
                                    <v-form
                                        ref="form"
                                        v-model="valid"
                                        lazy-validation
                                        class="w-100 mx-auto"
                                    >
                                        <v-textarea
                                            v-model="comment"
                                            outlined
                                            :rules="[v => !!v || '内容を記入してください']"
                                            label="コメント"
                                            class=""
                                            height="100"
                                            required
                                        ></v-textarea>
                                        <div class="text-center">
                                            <v-btn
                                                color="primary"
                                                :disabled='!isComplete'
                                                @click="commentSubmit()"
                                            >
                                                この内容でコメントする
                                            </v-btn>
                                        </div>
                                        <vue-loading type="spiningDubbles" v-if="loadShow" color="#333" :size="{ width: '50px', height: '50px' }"></vue-loading>
                                    </v-form>
                                </div>
                            </div>
                            <div class="ma-2 mt-7">
                                <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#showComment" aria-expanded="false" aria-controls="showComment">
                                    コメントを表示する <span>{{comments.length}}</span>件
                                </button>
                            </div>
                            <div class="collapse ma-2" id="showComment">
                                <div class="card card-body pt-0">
                                    <div v-for="item in comments">
                                        <div class="d-flex mt-8">
                                            <p class="mb-2">{{ formatDate(item.created_at) }}</p>
                                            <p class="mx-4 mb-2">-</p>
                                            <p class="mb-2">[ {{ returnCommentUser(item.user_id) }} ]</p>
                                        </div>
                                        <div class="mx-5 ">
                                            <p>{{ item.content }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <v-divider inset class="my-0 mx-auto"></v-divider>
                    <div class="d-flex">
                        <div class="my-10 mx-16">
                            <v-btn
                                color="secondary"
                                elevation="2"
                                href="/gallery/"
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
                                @click="deleteConfirm(post.id)"
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
                            <p class="my-10">画像の編集( ※ 機能未定なため未実装 )</p>
                            <v-textarea
                                v-model="body"
                                outlined
                                :rules="[v => !!v || '内容を記入してください']"
                                label="内容"
                                class="mt-10"
                                height="200"
                                required
                            ></v-textarea>
                            <div class="text-center mt-7">
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
			post: {},
			name: {},
			userid: {},
			image: {},
			user: {},
			comments: {},
			comment_user: {},
			login_info: {},
			right: {},
		},
		computed: {
			isComplete () {
				return this.body;
			}
		},
		data() {
			return {
				loadShow: false,
				deleteDialog: false,
			    deleteID: null,
				alert: false,
				valid: true,
				files: [],
				body: this.post.content,
				comment: '',
				status: false,
                count: 0,
		    }
		},
		created() {
			this.first_check()
		},
		methods: {
			formatDate: dateStr => dayjs(dateStr).format('YYYY/MM/DD'),

			getImgUrl(img) {
				let path = ["/uploads/", img[0].src];
				let path_link = path.join("");
				return path_link
			},

			getImgName(img) {
				let file_name = img[0].src.split('_')[0] + '_{index}.' + img[0].src.split('.')[1]
				return file_name
			},

			first_check() {
                axios.get('/gallery/likefirst/' + this.post.id)
                    .then(res => {
                        if(res.data[0] == 1) {
                            this.status = true
                            this.count = res.data[1]
                        } else {
                            this.status = false
                            this.count = res.data[1]
                        }
                    }).catch(function(err) {
                    console.log(err)
                })
			},

			like_check() {
                axios.get('/gallery/like/' + this.post.id)
                    .then(res => {
                        if (res.data[0] == 1) {
                            this.status = true
                            this.count = res.data[1]
                        } else {
                            this.status = false
                            this.count = res.data[1]
                        }
                    }).catch(function (err) {
                    console.log(err)
                })
			},

			userError: function (event) {
				if ( this.login_info === 0 ) {
					alert('いいねするには、ログインしてください。');
				}
			},


			// コメントのユーザー名
            returnCommentUser(user) {
                if (user !== null) {
					return this.comment_user.find((u) => u.id === user).name
                } else  {
                    return '名無し'
                }
            },

			// コメント投稿
			commentSubmit: function() {
				var self = this;
				this.show = true;

				var params = {
					comment: this.comment
				};
				axios.put('/gallery/comment/' + this.post.id, params)
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
					body: this.body
				};
				axios.put('/gallery/' + this.post.id, params)
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
				axios.delete('/gallery/' + id)
					.then( (res) => {
						window.location.href = '/gallery';
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
    .atag a {
        color: black!important;
    }
    pre {
        white-space: pre-wrap!important;
    }
    table {
        width: 85%;
    }
    .type-line {
        background-color: #0d47a1;
        width: 9%;
    }
    .icon-waku {
        border-radius: 50%;
        border: solid 1px #757575;
        padding: 5px 5px 3px 5px;
    }
    .icon {
        font-size: 45px!important;
    }
    .type-line p {
        color: white;
        font-weight: bold;
        text-align: center;
        margin: 0;
    }
    .image-360 {
        max-width: 500px;
        margin: 0 auto;
    }
</style>
