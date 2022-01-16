<template>
    <div>
        <div class="textBox">
            <div class="thumbnails mx-2">
                <div
                    class="photo my-5 col-sm-6 col-md-4 hover-ef"
                    v-for="item in getItems"
                    v-on:mouseover="mouseOverAction(item)"
                    v-on:mouseleave="mouseLeaveAction(item)"
                >
                    <a :href="'/gallery/' + item.post_id">
                        <img
                        class="photo__image mw-100 h-auto"
                        :src="getImgUrl(item)"
                    >
<!--                        <div class="mask">-->
<!--                            <p class="caption" v-show="hoverFlag && item === hoverIndex ">あああ</p>-->
<!--                            <v-list-item-icon class="caption" v-show="hoverFlag && item === hoverIndex ">-->
<!--                                <v-icon class="good-btn">mdi-heart-outline</v-icon>-->
<!--                            </v-list-item-icon>-->
<!--                        </div>-->
                    </a>
                </div>
            </div>
            <vuejs-paginate
                v-if="images.length !== 0"
                :page-count="getPaginateCount"
                :prev-text="'<'"
                :next-text="'>'"
                :click-handler="paginateClickCallback"
                :container-class="'pagination justify-content-center'"
                :page-class="'page-item'"
                :page-link-class="'page-link'"
                :prev-class="'page-item'"
                :prev-link-class="'page-link'"
                :next-class="'page-item'"
                :next-link-class="'page-link'"
                :first-last-button="true"
                :first-button-text="'<<'"
                :last-button-text="'>>'"
            ></vuejs-paginate>
        </div>
    </div>
</template>

<script>
	import VueJsPaginate from "vuejs-paginate";
	export default {
		name: "GoodLog",
		props: {
			images: {},
		},
		components: {
			"vuejs-paginate": VueJsPaginate,
		},
		data () {
			return {
				currentPage: 1,
				perPage: 9,
				hoverFlag: false,
				hoverIndex: null,
			}
		},
		computed: {
			getItems: function () {
				let start = (this.currentPage - 1) * this.perPage;
				let end = this.currentPage * this.perPage;
				return this.images.slice(start, end);
			},
			getPaginateCount: function () {
				return Math.ceil(this.images.length / this.perPage);
			},
		},
		methods: {
			formatDate: dateStr => dayjs(dateStr).format('YYYY/MM/DD'),
			paginateClickCallback: function (pageNum) {
				this.currentPage = Number(pageNum);
			},
			getImgUrl(img) {
				// すでに存在している写真を表示させる
				let path = ["/thumbnail/", img.src];
				let path_link = path.join("");
				return path_link
			},
			mouseOverAction(index) {
				this.hoverFlag = true
				this.hoverIndex = index
			},
			mouseLeaveAction() {
				this.hoverFlag = false
			},
		},
	}
</script>

<style scoped>
    .textBox {
        border: 2px solid #333;
        border-radius: 5px;
        padding: 30px;
        position: relative;
    }
    .textBox::before {
        background-color: #fff;
        color: #333;
        content: "過去にいいねした作品";
        font-weight: bold;
        left: 30px;
        padding: 3px 10px;
        position: absolute;
        top: -15px;
        border-bottom: solid 2px #000;
        font-size: 24px;
    }
    .thumbnails {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }
    .thumbnails:after {
        content: "";
        display: block;
        width: 32%;
        height: 0;
    }
    .photo {
        max-height: 300px;
        max-width: 300px;
    }
    img:hover {
        opacity: 0.6;
    }
    .hover-ef {
        overflow: hidden;
        position: relative;
    }
    .hover-ef .caption {
        text-align: right;
        padding: 1rem;
        display: table-cell;
        vertical-align: bottom;
    }
    /*.hover-ef .mask {*/
    /*    width: 100%;*/
    /*    height: 100%;*/
    /*    position: absolute;*/
    /*    top: 0;*/
    /*    left: 0;*/
    /*    opacity: 0;*/
    /*    background-color: rgba(0, 0, 0, 0.728);*/
    /*    display: table;*/
    /*}*/
    /*.hover-ef:hover .mask {*/
    /*    opacity: 0.6;*/
    /*}*/
    .pagination {
        margin-bottom: 0;
    }
</style>
