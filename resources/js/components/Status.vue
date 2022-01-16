<template>
    <v-main class="py-5">
        <v-container>
            <v-row justify="center">
                <v-card class="w-100 my-5">
                    <div class="ma-16 message">
                        <h3>承認ができました。</h3>
                    </div>
                    <div class="my-10 mx-16">
                        <v-btn
                            href="/"
                            color="orange darken-3"
                            elevation="2"
                            class="my-5 text-white"
                        >
                            Topに戻る
                        </v-btn>
                    </div>
                </v-card>
            </v-row>
        </v-container>
    </v-main>
</template>

<script>
	export default {
		name: "Status",
	}
</script>

<style scoped>
    .message {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
