<template>
    <v-main class="py-5">
        <v-container>
            <v-row justify="center">
                <h1 class="font-weight-bold text-h4 basil--text my-10 page-title">
                    ギャラリー
                </h1>
                <v-card class="w-100 my-5">
                    <div class="my-10 mx-16 d-flex justify-content-end">
                        <v-btn
                            href="/gallery/create"
                            color="primary"
                            elevation="2"
                            class="ms-auto"
                        >
                            新規作成
                        </v-btn>
                    </div>
<!--                    <vuejs-paginate-->
<!--                        :page-count="getPaginateCount"-->
<!--                        :prev-text="'<'"-->
<!--                        :next-text="'>'"-->
<!--                        :click-handler="paginateClickCallback"-->
<!--                        :container-class="'pagination justify-content-center'"-->
<!--                        :page-class="'page-item'"-->
<!--                        :page-link-class="'page-link'"-->
<!--                        :prev-class="'page-item'"-->
<!--                        :prev-link-class="'page-link'"-->
<!--                        :next-class="'page-item'"-->
<!--                        :next-link-class="'page-link'"-->
<!--                        :first-last-button="true"-->
<!--                        :first-button-text="'<<'"-->
<!--                        :last-button-text="'>>'"-->
<!--                    ></vuejs-paginate>-->
                </v-card>
            </v-row>
        </v-container>
    </v-main>
</template>

<script>
	import VueJsPaginate from "vuejs-paginate";

	export default {
		name: "gallery",
		props: {
			newsalls: {},
			user: {},
		},
		components: {
			"vuejs-paginate": VueJsPaginate,
		},
		data: function () {
			return {
				currentPage: 1,
				perPage: 10,
			};
		},
		computed: {
			getItems: function () {
				let start = (this.currentPage - 1) * this.perPage;
				let end = this.currentPage * this.perPage;
				return this.newsalls.slice(start, end);
			},
			getPaginateCount: function () {
				return Math.ceil(this.newsalls.length / this.perPage);
			},
		},
		methods: {
			formatDate: dateStr => dayjs(dateStr).format('YYYY/MM/DD'),
			paginateClickCallback: function (pageNum) {
				this.currentPage = Number(pageNum);
			},
		},
	}
</script>

<style scoped>

</style>
