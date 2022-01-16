<template>
    <div>
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
            申請しました。
        </v-alert>
        <div class="textBox">
            <table class="table table-bordered mt-4">
                <tbody>
                    <tr>
                        <td class="w-25">名前</td>
                        <td>{{ user.name }}</td>
                    </tr>
                    <tr>
                        <td class="w-25">メールアドレス</td>
                        <td>{{ user.email }}</td>
                    </tr>
                    <tr>
                        <td class="w-25">ステータス</td>
                        <td>{{ returnStatus }}</td>
                    </tr>
                </tbody>
            </table>
            <div v-if="user.status !== 2" class="mt-10">
                <div class="ma-2">
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#writeComment" aria-expanded="false" aria-controls="writeComment">
                        ステータス(権限)を申請する
                    </button>
                </div>
                <div class="collapse ma-2" id="writeComment">
                    <div class="card card-body">
                        <p>【ステータスについて】</p>
                        <p class="mb-0">関係者…一般の方ができることに加えニュース/イベント投稿することができます。</p>
                        <p class="mb-0">管理者…こちらは本サイト管理者のみになります。</p>
                        <p class="my-6">※申請後、承認までにお時間をいただくことがあります。ご了承ください。</p>
                        <v-form
                            ref="form"
                            v-model="valid"
                            lazy-validation
                            class="w-100 mx-auto"
                        >
                            <v-select
                                v-model="select"
                                :items="items"
                                :rules="[v => !!v || '申請するステータスを選択してください']"
                                label="ステータス種類"
                                required
                                class="w-75 mx-auto"
                            ></v-select>
                            <div class="text-center">
                                <v-btn
                                    color="primary"
                                    :disabled='!isComplete'
                                    @click="onSubmit()"
                                >
                                    この内容で申請する
                                </v-btn>
                            </div>
                            <vue-loading type="spiningDubbles" v-if="loadShow" color="#333" :size="{ width: '50px', height: '50px' }"></vue-loading>
                        </v-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
	import { VueLoading } from 'vue-loading-template'
	export default {
		name: "Info",
		components: {
			VueLoading
		},
		computed: {
			isComplete () {
				return this.select;
			}
		},
		props: {
			user: {},
		},
		data () {
			return {
				returnStatus: '',
				show: false,
				valid: true,
				select: null,
				items: [
					'　',
					'関係者',
					'管理者',
				],
				alert: false,
			}
		},
        created() {
			if ( this.user.status === 2 ) {
				this.returnStatus = '管理者'
            } else if ( this.user.status === 1 ) {
				this.returnStatus = '関係者　(閲覧 + 作品・ニュース/イベント投稿可)'
			} else {
				this.returnStatus = '一般　(閲覧 + 作品投稿可)'
            }
		},
		methods: {
			onSubmit: function() {
				var self = this;
				this.show = true;

				var params = {
					select: this.select,
				};
				axios.post('/mypage', params)
					.then(response => {
						this.$refs.form.reset()
						this.alert = true;
						$('.alert').fadeIn("slow", function () {
							$(this).delay(3000).fadeOut("slow");
						});
					})
					.catch(error => {
						console.log(error)
					})
					.then(function(){
						self.show = false;
					});
			}
		},
	}
</script>

<style scoped>
    .textBox {
        border: 2px solid #333;
        border-radius: 5px;
        padding: 50px;
        position: relative;
    }
    .textBox::before {
        background-color: #fff;
        color: #333;
        content: "登録情報";
        font-weight: bold;
        left: 30px;
        padding: 3px 10px;
        position: absolute;
        top: -15px;
        border-bottom: solid 2px #000;
        font-size: 24px;
    }
</style>
