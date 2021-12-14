<template>
    <v-main class="py-5">
        <v-container>
            <v-row justify="center">
                <v-card class="w-100 my-5">
                    <div class="ma-16 message">
                        <h3 v-show="error === 0">エラーが発生しました。<br>ログインをして再度実行して下さい。</h3>
                        <h3 v-show="error === 1">権限がありません。</h3>
                    </div>
                    <div class="my-10 mx-16">
                        <div class="text-center">
                            <v-btn
                                href="/register"
                                v-show="error === 0"
                                color="primary"
                                elevation="2"
                                class="mx-8"
                            >
                                新規アカウント作成
                            </v-btn>
                            <v-btn
                                href="/login"
                                v-show="error === 0"
                                color="orange darken-3"
                                elevation="2"
                                class="mx-8 text-white"
                            >
                                ログイン
                            </v-btn>
                            <v-btn
                                href="/"
                                v-show="error === 1"
                                color="orange darken-3"
                                elevation="2"
                                class="mx-8 text-white"
                            >
                                権限を申請する
                            </v-btn>

                        </div>
                        <v-btn
                            color="secondary"
                            elevation="2"
                            class="my-5"
                            onClick="history.back(); return false;"
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
	export default {
		name: "Error",
		props: {
			error: { type: String, required: false, default: 0 },
		},
	}
</script>

<style scoped>
    .message {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
