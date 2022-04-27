# MIDIKAno[2021-2022.3]制作分


## 本アプリの概要
Web上で漆器作品を3D回転画像として見ることができるアプリケーション

http://midikano.herokuapp.com/
(←テスト用のです。投稿した画像は数時間後見えなくなる)


#### 作成した機能
- Login(Laravel auth使用)
- ギャラリーページでのCRUD
- ニュースページでのCRUD
- 問い合わせ機能
- マイページでの権限申請


---

## 使用技術
- Laravel
- Vue.js
- MySQL

---

## 中身
```
MIDIKAno-2022
|
├─ docker(ここらはDockerで環境作ってるファイル系)
│    ├─ php
│    │   └─ Dockerfile
│    │   └─ php.ini
│    ├─ nginx
│    │    └─ Dockerfile
│    │    └─ default.conf
│    └─ mysql
│         └─ Dockerfile
│         └─ my.cnf
│─ .env(環境の設定類が記載されてる 例：DB情報とかとか)
│─ src(中身がlaravelやvueを書き込んでいるコード)⬅️ ここのみ
└─ docker-compose.yml
```
---

## その他(開発に関してのメモ)
laravelで主にやりたかった(今からVueメイン・laravelはapiでってやると時間がかかる←学習コスト)ために、`axios`ってものをつかった
→`axios + laravel + vue`で検索したら出てくる系の


[Laravel x Vue.jsの組み合わせのパターン紹介](https://zenn.dev/m2/articles/2679cf85b49b50)
**Laravel（メイン） x Vue.js（部分的に使用）**
