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
                    ギャラリー | 新規作成
                </h1>
                <v-card class="w-100 my-5">
                    <v-form
                        ref="form"
                        v-model="valid"
                        lazy-validation
                        class="px-sm-7 py-16 px-md-16 w-75 mx-auto"
                    >
                        <div>
                            <div>
                                <p class="fw-lighter text-danger caption ms-8">※ 画像はJPG, JPEG, PNGファイルのみ可能です。</p>
                                <p class="fw-lighter text-danger caption mb-10 ms-8 mt-n3">※ 複数の画像を選択する場合は、1ファイルあたり1MB以下を基準にサイズを小さくする必要があります。</p>
                            </div>
                            <h6 class="subtitle-1 font-weight-light mb-n2">《 画像をまとめて選択 》</h6>
                            <div class="mx-5">
                                <v-file-input
                                    v-model="files"
                                    counter
                                    required
                                    multiple
                                    truncate-length="50"
                                    accept="image/jpeg, image/jpg, image/png"
                                    class="mb-10"
                                ></v-file-input>
                            </div>
                        </div>
                        <div>
                            <h6 class="subtitle-1 font-weight-light mb-n2">《 サムネイル画像選択 》</h6>
                            <div class="mx-5">
                                <v-file-input
                                    v-model="thumbnail"
                                    counter
                                    required
                                    truncate-length="50"
                                    accept="image/jpeg, image/jpg, image/png"
                                    class="mb-10"
                                ></v-file-input>
                            </div>
                        </div>
                        <v-textarea
                            v-model="body"
                            outlined
                            :rules="[v => !!v || '内容を記入してください']"
                            label="コメント"
                            class="mt-6"
                            height="300"
                            required
                        ></v-textarea>
                        <v-btn
                            color="primary"
                            :disabled='!isComplete'
                            @click="onSubmit()"
                        >
                            作成
                        </v-btn>
                        <vue-loading type="spiningDubbles" v-if="show" color="#333" :size="{ width: '50px', height: '50px' }"></vue-loading>
                    </v-form>
                    <v-divider inset class="my-0 mx-auto"></v-divider>
                    <div class="my-10 mx-16">
                        <v-btn
                            color="secondary"
                            elevation="2"
                            href="/gallery/"
                        >
                            戻る
                        </v-btn>
                    </div>
                </v-card>
            </v-row>
        </v-container>
    </v-main>
</template>

<script>
	import { VueLoading } from 'vue-loading-template'
	export default {
		name: "create",
		components: {
			VueLoading
		},
		computed: {
			isComplete () {
				return this.body;
			}
		},
		data: () => ({
			show: false,
			valid: true,
			body: '',
            alert: false,
			files: [],
			thumbnail: [],
		}),

		methods: {
			onSubmit: function() {
				var self = this;
				this.show = true;

				let formData = new FormData();
				formData.append('body', this.body);
				formData.append('thumbnail',this.thumbnail);
				let requestFiles = this.files.filter((file) => file) // ファイルがあるものだけを取得
				requestFiles.forEach((file, index) => {
					formData.append('files[' + index + ']', file) // formDataに追加していく
				})

				axios.post('/gallery/create', formData)
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

</style>
