<template>
    <v-main class="py-5">
        <v-container>
            <v-row justify="center">
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
                            @click="onSubmit()"
                        >
                            送信
                        </v-btn>
                    </v-form>
                </v-card>
            </v-row>
        </v-container>
    </v-main>
</template>

<script>
	export default {
		name: "contact",
		data: () => ({
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
				'',
				'意見',
				'要望',
				'質問',
				'その他',
			],
			checkbox: false,
		}),

		methods: {
			onSubmit: function() {
				this.$refs.form.validate()

				var params = {
					first_name: this.firstName,
					last_name: this.lastName,
					email: this.email,
					subject_id: this.subjectId,
					body: this.body
				};
				axios.post('/contact', params)
					.then(function(response){

						// 成功した時

					})
					.catch(function(error){

						// 失敗したとき

					});

			}
		},
	}
</script>

<style scoped>

</style>
