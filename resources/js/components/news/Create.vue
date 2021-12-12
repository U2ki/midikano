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
                    ニュース | 新規作成
                </h1>
                <v-card class="w-100 my-5">
                    <v-form
                        ref="form"
                        v-model="valid"
                        lazy-validation
                        class="px-sm-7 py-16 px-md-16 w-75 mx-auto"
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
                            required
                        ></v-select>

                        <v-textarea
                            v-model="body"
                            outlined
                            :rules="[v => !!v || '内容を記入してください']"
                            label="内容"
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
				return this.title && this.select && this.body;
			}
		},
		data: () => ({
			show: false,
			valid: true,
			title: '',
			titleRules: [
				v => !!v || '必須です',
			],
			select: null,
			items: [
				'ニュース',
				'イベント',
			],
			body: '',
            alert: false,
		}),

		methods: {
			onSubmit: function() {
				var self = this;
				this.show = true;

				var params = {
					title: this.title,
					select: this.select,
					body: this.body
				};
				axios.post('/news/create', params)
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
