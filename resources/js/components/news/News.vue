<template>
    <v-main class="py-5">
        <v-container>
            <v-row justify="center">
                <h1 class="font-weight-bold text-h4 basil--text my-10 page-title">
                    ニュース
                </h1>
                <v-card class="w-100 my-5">
                    <v-btn
                        href="/news/create"
                        color="accent"
                        elevation="2"
                    ></v-btn>
                    <v-card-title class="w-50 ms-auto">
                        <v-text-field
                            v-model="search"
                            append-icon="mdi-magnify"
                            label="Search"
                            single-line
                            hide-details
                        ></v-text-field>
                    </v-card-title>
                    <v-data-table
                        :headers="headers"
                        :items="newsalls"
                        :search="search"
                        class="ma-10"
                    >
                    </v-data-table>
                </v-card>
            </v-row>
        </v-container>
    </v-main>
</template>

<script>
	export default {
		name: "News",
		props: ["newsalls"],
		data () {
			return {
				search: '',
				headers: [
					{
						text: 'タイトル',
						align: 'start',
						sortable: false,
						value: 'title',
					},
					{ text: '種類', value: 'type' },
					{ text: '投稿日', value: 'updated_at' },
				],
				newsalls: [],
			}
		},
	}
</script>

<style scoped>

</style>
