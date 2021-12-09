<template>
    <div>
        <!-- Jmap表示位置 -->
        <div id="jmap">
            <div class="jmap-infobox"></div>
        </div>
        <p class="text-right">※色がついている都道府県を押すと詳細が表示されます。</p>
        <!-- モーダル用HTML -->
        <div class="modal fade" id="prefectureModal" tabindex="-1" role="dialog"
             aria-labelledby="prefectureModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="prefectureModalTitle"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body overflow-auto" style="height:350px;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
	export default {
		name: "Kinds",
		mounted: function () {
			$(document).ready(function () {
				$('#jmap').jmap({
					height: '450px',
					lineColor: '#bfbfbf',
					lineWidth: 1,
					showInfobox: true,
					backgroundRadius: '0.3rem',
					backgroundPadding: '1rem',
					backgroundColor: '#ff000000',
					prefectureClass: 'prefecture',
					prefectureLineColor: '#ffffff',
					prefectureLineWidth: 1,
					prefectureLineHoverColor: '#fff',
					fontSize: '0.8rem',
					fontColor: '#000',
					font: 'serif',
					areas: [
						{code: 1, name: "北海道", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{
							code: 2,
							name: "青森",
							color: "#759ef4",
							hoverColor: "#98b9ff",
							yesOrNo: "yes",
							kindName: "津軽塗",
							kindKana: "つがるぬり",
							intro: "青森県弘前市周辺で作られている漆器",
							explanation: "主に素材となるのは、ヒバの木であり、ヒバを使った素地に漆を何重にも塗り重ねて研ぐ工程を繰り返し美しい模様を生み出す",
							tech: ["「唐塗」（からぬり）", "「七々子塗 」（ななこぬり）", "「紋紗塗」（もんしゃぬり", "「錦塗」（にしきぬり）"]
						},
						{
							code: 3,
							name: "岩手",
							color: "#759ef4",
							hoverColor: "#98b9ff",
							yesOrNo: "yes",
							kindName: "秀衡塗",
							kindKana: "ひでひらぬり",
							intro: "岩手県平泉町周辺で作られている漆器",
							explanation: "金箔をあしらい、漆器の「秀衡椀」を模範にした、源氏雲に有職菱文様が描かれているのが特徴",
							tech: [],
							kindName2: "浄法寺塗",
							kindKana2: "じょうぼうじぬり",
							intro2: "岩手県二戸市浄法寺町周辺で作られている漆器",
							explanation2: "国内最大の漆生産地でもあり、高品質の浄法寺漆を使って普段使いできる光沢感をおさえた単色の仕上がり",
							tech2: ["「花塗」（はなぬり）", "「ろいろ塗」"]
						},
						{
							code: 4,
							name: "宮城",
							color: "#759ef4",
							hoverColor: "#98b9ff",
							yesOrNo: "yes",
							kindName: "鳴子漆器",
							kindKana: "なるこしっき",
							intro: "宮城県大崎市の周辺で作られている漆器",
							explanation: "透明な漆を使って木地の木目を生かす「木地呂塗」により、見た目が美しく、丈夫である",
							tech: ["「木地呂塗」（きじろぬり）", "「竜文塗」（りゅうもんぬり）", "「紅溜塗」（べにためぬり）", "「拭き漆塗」(ふきうるしぬり)"]
						},
						{
							code: 5,
							name: "秋田",
							color: "#759ef4",
							hoverColor: "#98b9ff",
							yesOrNo: "yes",
							kindName: "川連漆器",
							kindKana: "かわつらしっき",
							intro: "秋田県南部の湯沢市川連町で作られている漆器",
							explanation: "シンプルで強度が高く丈夫で手頃価格であることが特徴",
							tech: ["「花塗」（はなぬり）"]
						},
						{code: 6, name: "山形", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{
							code: 7,
							name: "福島",
							color: "#759ef4",
							hoverColor: "#98b9ff",
							yesOrNo: "yes",
							kindName: "会津塗",
							kindKana: "あいづぬり",
							intro: "福島県会津地方で作られている漆器",
							explanation: "縁起の良い絵柄や多彩な加飾が特徴。さまざまな塗りの技法を用いられている",
							tech: ["「鉄錆塗」（てつさびぬり）", "「金虫くい塗」（きんむしくいぬり）", "「木地呂塗」（きじろぬり）", "「花塗」（はなぬり）", "「消粉蒔絵」（けしふんまきえ）"]
						},
						{code: 8, name: "茨城", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{code: 9, name: "栃木", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{code: 10, name: "群馬", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{code: 11, name: "埼玉", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{code: 12, name: "千葉", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{code: 13, name: "東京", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{
							code: 14,
							name: "神奈川",
							color: "#759ef4",
							hoverColor: "#98b9ff",
							yesOrNo: "yes",
							kindName: "鎌倉彫",
							kindKana: "かまくらぼり",
							intro: "鎌倉市周辺で作られている漆器",
							explanation: "立体的な彫り目、漆を塗り重ねて生まれる深みがあり、他の漆器にはない特徴がある",
							tech: [],
							kindName2: "小田原漆器",
							kindKana2: "おだわらしっき",
							intro2: "神奈川県小田原市で作られている漆器",
							explanation2: "自然の木目を活かした塗りと実用性に特徴がある",
							tech2: ["「木地呂塗り」（きじろぬり）", "「すり漆塗り」(すりうるしぬり)", "「彩漆塗」(いろうるしぬり)"]
						},
						{
							code: 15,
							name: "新潟",
							color: "#759ef4",
							hoverColor: "#98b9ff",
							yesOrNo: "yes",
							kindName: "村上木彫堆朱",
							kindKana: "むらかみきぼりついしゅ",
							intro: "新潟県村上市周辺で作られている漆器",
							explanation: "立体的な彫り目、漆を塗り重ねて生まれる深みがあり、他の漆器にはない特徴がある",
							tech: [],
							kindName2: "新潟漆器",
							kindKana2: "にいがたしっき",
							intro2: "新潟県新潟市周辺で作られている漆器",
							explanation2: "「花塗」「石目塗」「錦塗」「磯草塗」「竹塗」などとさまざまな塗りが特徴",
							tech2: ["「花塗」（はなぬり）", "「石目塗」（いしめぬり）", "「錦塗」（にしきぬり）", "「磯草塗」（いそくさぬり）", "「竹塗」（たけぬり）", "「金磨塗」（きんまぬり）", "「青銅塗」（せいどうぬり）", "「青貝塗」（あおかいぬり）", "「呂色塗」（ろいろぬり）", "「紫檀塗」（したんぬり）", "「夕日塗」（ゆうひぬり）"]
						},
						{
							code: 16,
							name: "富山",
							color: "#759ef4",
							hoverColor: "#98b9ff",
							yesOrNo: "yes",
							kindName: "高岡漆器",
							kindKana: "たかおかしっき",
							intro: "富山県高岡市で作られている漆器",
							explanation: "玉石を貼り、あわびや夜光貝・貝殻を使うなどと材料の細片を組み合わせて作り上げるのが特徴",
							tech: ["「勇助塗」（ゆうすけぬり）", "「彫刻塗」（ちょうこくぬり）", "「青貝塗」（あおがいぬり）"]
						},
						{
							code: 17,
							name: "石川",
							color: "#759ef4",
							hoverColor: "#98b9ff",
							yesOrNo: "yes",
							kindName: "輪島塗",
							kindKana: "わじまぬり",
							intro: "石川県輪島市で作られている漆器",
							explanation: "金や金粉・銀粉がよく使われており、見た目が美しく、物持ちがいいのが特徴",
							tech: [],
							kindName2: "山中漆器",
							kindKana2: "やまなかしっき",
							intro2: "石川県加賀市の山中温泉地区で作られている漆器",
							explanation2: "自然の木目と優雅さが特徴",
							tech2: ["「摺漆」（すりうるし）"],
							kindName3: "金沢漆器",
							kindKana3: "かなざわしっき",
							intro3: "石川県金沢市周辺で作られている漆器",
							explanation3: "さまざま技法によって品位の高さ、華麗さを持ち合わせているのが特徴",
							tech3: ["「平蒔絵」（ひらまきえ）", "「研出蒔絵」（とぎだしまきえ）", "「高蒔絵」（たかまきえ）", "「肉合研出蒔絵」（ししあいとぎだしまきえ）"]
						},
						{
							code: 18,
							name: "福井",
							color: "#759ef4",
							hoverColor: "#98b9ff",
							yesOrNo: "yes",
							kindName: "越前漆器",
							kindKana: "えちぜんしっき",
							intro: "福井県鯖江市周辺で作られている漆器",
							explanation: "上品かつ艶やかであり、、軽さと丈夫さがあるのが特徴",
							tech: ["「花塗」（はなぬり）"],
							kindName2: "若狭塗",
							kindKana2: "わかさぬり",
							intro2: "福井県小浜市周辺で作られている漆器",
							explanation2: "卵の殻、青貝、マツの葉、ヒノキ葉、菜種等を使って模様を作るのが特徴",
							tech2: []

						},
						{code: 19, name: "山梨", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{
							code: 20,
							name: "長野",
							color: "#759ef4",
							hoverColor: "#98b9ff",
							yesOrNo: "yes",
							kindName: "木曽漆器",
							kindKana: "きそしっき",
							intro: "旧木曽郡楢川村である長野県塩尻市とその周辺で作られている漆器",
							explanation: "木地の美しい木目を生かす技法や、幾何学模様を作り出す技法が特徴",
							tech: ["「春慶塗」（しゅんけいぬり）", "「塗り分け呂色塗」（ぬりわけろいろぬり）"]
						},
						{
							code: 21,
							name: "岐阜",
							color: "#759ef4",
							hoverColor: "#98b9ff",
							yesOrNo: "yes",
							kindName: "飛騨春慶",
							kindKana: "ひだしゅんけい",
							intro: "岐阜県高山市周辺で作られている漆器",
							explanation: "自然な木目が持つ素朴な美しさと、透漆の自然と透き通っており木肌の持つ美しさが特徴",
							tech: []
						},
						{code: 22, name: "静岡", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{code: 23, name: "愛知", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{code: 24, name: "三重", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{code: 25, name: "滋賀", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{
							code: 26,
							name: "京都",
							color: "#759ef4",
							hoverColor: "#98b9ff",
							yesOrNo: "yes",
							kindName: "京漆器",
							kindKana: "きょうしっき",
							intro: "京都周辺で作られている漆器",
							explanation: "「わび」「さび」といった内面的な深い味わいがあり、木地が薄く繊細さが特徴",
							tech: []
						},
						{code: 27, name: "大阪", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{code: 28, name: "兵庫", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{code: 29, name: "奈良", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{
							code: 30,
							name: "和歌山",
							color: "#759ef4",
							hoverColor: "#98b9ff",
							yesOrNo: "yes",
							kindName: "紀州漆器",
							kindKana: "きしゅうしっき",
							intro: "和歌山県海南市の北西部にある黒江地区を中心に作られている漆器",
							explanation: "シンプルかつ丈夫で日常生活で気軽に使えるのが特徴",
							tech: ["「黒江塗」（くろえぬり）", "「根来塗」（ねごろぬり）"]
						},
						{code: 31, name: "鳥取", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{code: 32, name: "島根", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{code: 33, name: "岡山", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{code: 34, name: "広島", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{
							code: 35,
							name: "山口",
							color: "#759ef4",
							hoverColor: "#98b9ff",
							yesOrNo: "yes",
							kindName: "大内塗",
							kindKana: "おおうちぬり",
							intro: "山口県山口市周辺で作られている漆器",
							explanation: "渋く深みのある朱色の地塗りの上に、彩漆で秋の草や雲の形を描き、家紋（大内菱）をあしらう模様が特徴",
							tech: []
						},
						{code: 36, name: "徳島", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{
							code: 37,
							name: "香川",
							color: "#759ef4",
							hoverColor: "#98b9ff",
							yesOrNo: "yes",
							kindName: "香川漆器",
							kindKana: "かがわしっき",
							intro: "香川県高松市を中心に生産されている漆器",
							explanation: "さまざまな技法があり、優雅で美しく、商品の種類が豊富なのが特徴",
							tech: ["「蒟醤」（きんま）", "「存清」（ぞんせい）", "「後藤塗」（ごとうぬり）", "「彫漆」（ちょうしつ）", "「象谷塗」（ぞうこくぬり）"]
						},
						{code: 38, name: "愛媛", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{code: 39, name: "高知", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{code: 40, name: "福岡", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{code: 41, name: "佐賀", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{code: 42, name: "長崎", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{code: 43, name: "熊本", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{code: 44, name: "大分", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{code: 45, name: "宮崎", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{code: 46, name: "鹿児島", color: "#edf3f9", hoverColor: "#edf3f9", yesOrNo: "no"},
						{
							code: 47,
							name: "沖縄",
							color: "#759ef4",
							hoverColor: "#98b9ff",
							yesOrNo: "yes",
							kindName: "琉球漆器",
							kindKana: "りゅうきゅうしっき",
							intro: "沖縄県で作られている漆器",
							explanation: "主に朱色の漆や黒い漆を用いた花塗で作られており、模様付けにはさまざまな技法が用いられているのが特徴",
							tech: ["「花塗」（はなぬり）", "「堆錦」（ついきん）", "「沈金」（ちんきん）", "「箔絵」（はくえ）", "「螺鈿」（らでん）"]
						},
					],
					onLoad: function (e, data) {
						$(this).html('<strong>' + data.name + '</strong>');
					},
					onSelect: function (e, data) {
						if (data.option.yesOrNo === "yes") {
							$('#prefectureModal').find('#prefectureModalTitle')
								.html(data.name + data.full)
								.end().find('.modal-body')
								.html('<p style="font-weight: bold!important;"> - ' + data.option.kindName + '(' + data.option.kindKana + ')</p>' )
								.append('<div class="mx-2">')
								.append('<p class="my-2">' + data.option.intro + '</p>')
								.append('<p class="have-tech">' + data.option.explanation + '。</p>')
								.append('</div>')
								.end().modal('show');
						}
						if (data.option.tech.length !== 0) {
                            $('.have-tech')
                                .append('<p class="mb-1 mt-3">[技法]</p>')
                                .append('<ul');
							for (var i=0; i<data.option.tech.length;i++){
								$('.have-tech').append('<li class="mx-3">'+ data.option.tech[i] + '</li>');
							}
							$('.have-tech').append('</ul>');
                        }
                        if (data.option.kindName2) {
							$('.have-tech')
                                .append('<hr class="my-6">')
                                .append('<p style="font-weight: bold!important;"> - ' + data.option.kindName2 + '(' + data.option.kindKana2 + ')</p>' )
								.append('<p class="my-2">' + data.option.intro2 + '</p>')
								.append('<p>' + data.option.explanation2 + '。</p>');
							if (data.option.tech2.length !== 0) {
								$('.have-tech')
									.append('<p class="mb-1 mt-3">[技法]</p>')
									.append('<ul');
								for (var i=0; i<data.option.tech2.length;i++){
									$('.have-tech').append('<li class="mx-3">'+ data.option.tech2[i] + '</li>');
								}
								$('.have-tech').append('</ul>');
							}
							if (data.option.kindName3) {
								$('.have-tech')
									.append('<hr class="my-6">')
									.append('<p style="font-weight: bold!important;"> - ' + data.option.kindName3 + '(' + data.option.kindKana3 + ')</p>' )
									.append('<p class="my-2">' + data.option.intro3 + '</p>')
									.append('<p>' + data.option.explanation3 + '。</p>');
								if (data.option.tech3.length !== 0) {
									$('.have-tech')
										.append('<p class="mb-1 mt-3">[技法]</p>')
										.append('<ul');
									for (var i=0; i<data.option.tech3.length;i++){
										$('.have-tech').append('<li class="mx-3">'+ data.option.tech3[i] + '</li>');
									}
									$('.have-tech').append('</ul>');
								}
							}
						}
					},
				});
			});
		}
	}
</script>

<style scoped>

</style>
