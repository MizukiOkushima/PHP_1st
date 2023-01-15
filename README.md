# PHP_1st
### 環境構築
1. ソース内のPHP_1st.sqlをデータベースをインポートする。<br>
2. ソース内のindex.php 20行目のデータベースの接続設定の編集をする。<br>
`$pdo = new PDO('mysql:host=localhost;dbname=PHP_1st', "root", "root");`<br>
"root", "root"の箇所はデータベースへログインする際の"ユーザー名"と"パスワード"を指定する<br>
