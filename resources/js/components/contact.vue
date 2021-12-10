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
                    内容が送信されました。
                </v-alert>
                <h1 class="font-weight-bold text-h4 basil--text my-10 page-title">
                    お問い合わせ
                </h1>
                <v-card class="w-100 my-5">
                    <v-form
                        ref="form"
                        v-model="valid"
                        lazy-validation
                        class="px-sm-7 py-16 px-md-16 w-75 mx-auto"
                    >
                        <p class="mb-16 pb-4 text-center">
                            ご意見・ご要望などはこちらよりお願いいたします。<br>
                            お問合せいただいてもご返信ができない場合がございます。<br>
                            ご了承のほど、よろしくお願い致します。
                        </p>
                        <v-text-field
                            v-model="name"
                            :counter="20"
                            :rules="nameRules"
                            label="名前"
                            required
                        ></v-text-field>

                        <v-text-field
                            v-model="email"
                            :rules="emailRules"
                            label="メールアドレス"
                            required
                        ></v-text-field>

                        <v-select
                            v-model="select"
                            :items="items"
                            :rules="[v => !!v || '問い合わせの種類を選択してください']"
                            label="お問い合わせ種類"
                            required
                        ></v-select>

                        <v-textarea
                            v-model="body"
                            outlined
                            :rules="[v => !!v || 'お問い合わせ内容を記入してください']"
                            label="お問い合わせ内容"
                            placeholder="お問い合わせ内容はこちらにお願いいたします。"
                            class="mt-6"
                            required
                        ></v-textarea>

                        <v-checkbox
                            v-model="checkbox"
                            :rules="[v => !!v || 'ここをチェックしなければ送信できません']"
                            label="この内容で送信しますか？"
                            required
                        ></v-checkbox>
                        <v-btn
                            color="primary"
                            class="mr-4"
                            :disabled='!isComplete'
                            @click="onSubmit()"
                        >
                            送信
                        </v-btn>
                        <vue-loading type="spiningDubbles" v-if="show" color="#333" :size="{ width: '50px', height: '50px' }"></vue-loading>
                    </v-form>
                </v-card>
            </v-row>
        </v-container>
    </v-main>
</template>

<script>
	import { VueLoading } from 'vue-loading-template'
	export default {
		name: "contact",
		components: {
			VueLoading
		},
		computed: {
			isComplete () {
				return this.name && this.email && this.select && this.body && this.checkbox;
			}
		},
		data: () => ({
			show: false,
			valid: true,
			name: '',
			nameRules: [
				v => !!v || '名前は必須です',
				v => (v && v.length <= 20) || '名前は20文字以内でお願いします',
			],
			email: '',
			emailRules: [
				v => /.+@.+\..+/.test(v) || 'このメールアドレスが有効ではありません',
			],
			select: null,
			items: [
				'　',
				'意見',
				'要望',
				'質問',
				'その他',
			],
			body: '',
			checkbox: false,
            alert: false,
		}),

		methods: {
			onSubmit: function() {
				var self = this;
				this.show = true;

				var params = {
					name: this.name,
					email: this.email,
					select: this.select,
					body: this.body
				};
				axios.post('/contact', params)
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
    .alert {
        position: fixed;
        z-index: 1;
        right: 13px;
    }
</style>
