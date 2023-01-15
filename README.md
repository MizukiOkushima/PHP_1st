# PHP_1st
### 概要
PHPを使用した掲示板投稿サイトを作成する。<br>
phpmyadminにデータベース接続をし投稿を参照、登録を行う。<br>

### 環境構築
1. ソース内のPHP_1st.sqlをデータベースをインポートする。<br>
2. ソース内のindex.php 20行目のデータベースの接続設定の編集をする。<br>
`$pdo = new PDO('mysql:host=localhost;dbname=PHP_1st', "root", "root");`<br>
"root", "root"の箇所はデータベースへログインする際の"ユーザー名"と"パスワード"を指定する<br>

### ページスクリーンショット
![bbs com_](https://user-images.githubusercontent.com/95268598/212529791-daf2d150-30ac-4e53-b11d-92cc4e80b065.png)
