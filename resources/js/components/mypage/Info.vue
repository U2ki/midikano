<template>
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
            <p>権限申請ボタン</p>
        </div>
    </div>
</template>

<script>
	export default {
		name: "Info",
		props: {
			user: {},
		},
		data () {
			return {
				returnStatus: '',
			}
		},
        created() {
			if ( this.user.status === 2 ) {
				this.returnStatus = '管理者'
            } else if ( this.user.status === 1 ) {
				this.returnStatus = '関係者　(閲覧 + 作品・ニュース投稿可)'
			} else {
				this.returnStatus = '一般　(閲覧 + 作品投稿可)'
            }
		}
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
