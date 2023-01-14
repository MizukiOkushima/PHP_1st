<?php

// PHPは変数の頭に$が必要
// $test = "a";

// タイムゾーン設定
date_default_timezone_set("Asia/Tokyo");

// $comment_array array()配列で用意する
$comment_array = array();
// $error_messages エラーメッセージを配列で用意する
$error_messages = array();

// $pdo DB接続
// PDO PHPDatabaseObjectの略 PDO基底クラスのインスタンスを作成することで接続が確立できる
// 第１引数：host名とデータベース名
// 第２引数：ユーザーネーム
// 第３引数：パスワード
try {
  $pdo = new PDO('mysql:host=localhost;dbname=PHP_1st', "root", "root");
} catch (PDOException $e) {
  // $eの中にあるgetMessageメソッドを取り出すための記述
  // getMessage 例題メッセージを取得するための関数
  echo $e->getMessage();
}

//$_POST スーパーグローバル変数 連想配列 フォームタグで取得した内容を取得
// input属性のnameから取得したデータ 連想配列なので[]を使用する
// !emptyで空でないときtrueになる
if (!empty($_POST["submitButton"]) && $_POST["submitButton"] === "書き込む") {

  // バリデーションチェック
  if(empty($_POST["username"])) {
    echo "名前を入力してください";
    $error_messages["username"] = "名前を入力してください";
  }
  if(empty($_POST["comment"])) {
    echo "コメントを入力してください";
    $error_messages["comment"] = "コメントを入力してください";
  }

  // $error_messagesが空の時DB登録を行う
  if(empty($error_messages)) {
    $postDate = date("Y-m-d H;i:s");
    try {
      // DB登録 ストアドプロシージャ
      $stmt = $pdo->prepare("INSERT INTO `PHP_1st_table` (`username`, `comment`, `postDate`) VALUES (:username, :comment, :postDate);");
      $stmt->bindParam(':username', $_POST['username']);
      $stmt->bindParam(':comment', $_POST['comment']);
      $stmt->bindParam(':postDate', $postDate);

      // 実行
      $stmt->execute();

    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
}

// $sql SQL文を代入する
$sql = "SELECT `id`, `username`, `comment`, `postDate` FROM `PHP_1st_table`;";
// $pdo->query($sql) DBからコメントデータを取得する $comment_arrayの配列に代入
$comment_array = $pdo->query($sql);
// DBの接続解除
$pdo = null;

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP掲示板</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1 class="title">PHP ニュー速VIP</h1>
  <hr>
  <div class="boardWrapper">
    <section>
      <!-- PHPを使って$comment_array配列に入ってるデータを一つずつ取り出す -->
      <?php foreach ($comment_array as $comment) : ?>
        <article>
          <div class="wrapper">
            <div class="nameArea">
              <span>名前：</span>
              <!-- 一つずつ取り出した$commentの中からusernameを取得する -->
              <p class="username"><?php echo $comment["username"]; ?></p>
              <time>：<?php echo $comment["postDate"]; ?></time>
            </div>
            <p class="comment"><?php echo $comment["comment"]; ?></p>
          </div>
        </article>
      <?php endforeach; ?>
    </section>
    <!-- POSTメソッド -->
    <form class="formWrapper" method="POST">
      <div>
        <input type="submit" value="書き込む" name="submitButton">
        <label for="">名前：</label>
        <input type="text" name="username">
      </div>
      <div>
        <textarea class="commentTextArea" name="comment"></textarea>
      </div>
    </form>
  </div>
</body>

</html>