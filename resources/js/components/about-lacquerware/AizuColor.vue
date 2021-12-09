<template>
    <div>
        <p>
            漆の色は、透明がかった茶色です。<br>
            そこに顔料などを混ぜるとさまざまな色の漆になります。<br>
            天然の鉱物などの顔料を使っていた縄文時代から明治時代まで、漆の色は限られていました。<br>
            漆とうまく混ざり、綺麗に色を出せる顔料が限られていたからです。<br>
            天然顔料による漆の伝統色は落ち着きがありシックです。<br>
            また色数が限られているからこそ巧みに考案された配色の妙も見所を生みました。<br>
            江戸時代の会津漆器に多くみられる色は、黒、朱、青光（緑）。<br>
            近代以降には、赤茶のうるみや、あざやかなオレンジ色の洗朱もみられます。<br>
            また、会津は江戸時代以降、色漆を使った漆絵の技法を得意とし松竹梅や菊を色漆で描いた「会津絵」と呼ばれる漆器を制作しました。<br>
            漆絵には、朱、黄、緑などが多く使われました。
        </p>
        <div class="my-13">
            <p class="text-center mb-1">天然の６色</p>
            <table border="1" class="mx-auto">
                <tbody>
                <tr>
                    <th class="c-sample kuro"></th>
                    <th class="text-center">黒</th>
                    <th class="px-3">漆＋鉄分、もしくは油煙、灰墨</th>
                </tr>
                <tr>
                    <th class="c-sample syu"></th>
                    <th class="text-center">朱</th>
                    <th class="px-3">漆＋辰砂（しんしゃ：赤色の鉱物）、あるいは硫化水銀</th>
                </tr>
                <tr>
                    <th class="c-sample araisyu"></th>
                    <th class="text-center">洗朱</th>
                    <th class="px-3">漆＋硫化水銀（硫化水銀の作り方の違いで明るい朱色に）</th>
                </tr>
                <tr>
                    <th class="c-sample aobikari"></th>
                    <th class="text-center">青光(緑)</th>
                    <th class="px-3">漆＋石黄＋藍蝋、もしくはベレンス</th>
                </tr>
                <tr>
                    <th class="c-sample urumi"></th>
                    <th class="text-center">うるみ</th>
                    <th class="px-3">朱漆＋黒漆</th>
                </tr>
                <tr>
                    <th class="c-sample ki"></th>
                    <th class="text-center">黄</th>
                    <th class="px-3">漆＋石黄</th>
                </tr>
                </tbody>
            </table>
        </div>
        <p>
            明治時代の後期に化学的な顔料が開発されると、漆の色数は格段に豊富になりました。<br>
            白、紫、ピンク、黄緑、水色などなど。<br>
            中間色もあり絵具のように描ける化学顔料の色漆は天然顔料の色漆に比べ耐久性に劣るとされていますが表現の可能性を広げたことは間違いありません。
        </p>
        <p class="mt-12">（福島県立博物館学芸員　小林めぐみ）</p>
    </div>
</template>

<script>
	export default {
		name: "AizuColor"
	}
</script>

<style scoped>
    table {
        border-collapse: collapse;
    }
    th {
        padding: 0.1rem!important;
        }
    .c-sample {
        padding: 0 20px!important;
    }
    .kuro {
        background-color: black;
    }
    .syu {
        background-color: #E11904;
    }
    .araisyu {
        background-color: #DC7248;
    }
    .aobikari {
        background-color: #00822F;
    }
    .urumi {
        background-color: #9A4243;
    }
    .ki {
        background-color: #CBCC00;
    }
</style>
