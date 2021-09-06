<?php

require './src/libs/functions.php';

//POSTされたデータがあれば変数に格納、なければ NULL（変数の初期化）
$name = isset($_POST['name']) ? $_POST['name'] : NULL;
$email = isset($_POST['email']) ? $_POST['email'] : NULL;
$subject = "ご質問";
$body = isset($_POST['body']) ? $_POST['body'] : NULL;

//送信ボタンが押された場合の処理
if (isset($_POST['submitted'])) {

  //POSTされたデータに不正な値がないかを別途定義した checkInput() 関数で検証 
  $_POST = checkInput($_POST);

  //filter_var を使って値をフィルタリング
  if (isset($_POST['name'])) {
    //スクリプトタグがあれば除去
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  }

  if (isset($_POST['email'])) {
    //全ての改行文字を削除
    $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
    //E-mail の形式にフィルタ
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
  }

  if (isset($_POST['body'])) {
    $body = filter_var($_POST['body'], FILTER_SANITIZE_STRING);
  }

  //POST でのリクエストの場合
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //メールアドレス等を記述したファイルの読み込み
    require './src/libs/mailvars.php';

    //メール本文の組み立て。値は h() でエスケープ処理
    $mail_body = 'コンタクトページからのお問い合わせ' . "\n\n";
    $mail_body .=  "お名前： " . h($name) . "\n";
    $mail_body .=  "Email： " . h($email) . "\n";
    $mail_body .=  "＜お問い合わせ内容＞" . "\n" . h($body);

    //-------- sendmail を使ったメールの送信処理 ------------

    //メールの宛先（名前<メールアドレス> の形式）。値は mailvars.php に記載
    $mailTo = mb_encode_mimeheader(MAIL_TO_NAME) . "<" . MAIL_TO . ">";

    //Return-Pathに指定するメールアドレス
    $returnMail = "-f" . $email; //
    //mbstringの日本語設定
    mb_language('ja');
    mb_internal_encoding('UTF-8');

    // 送信者情報（From ヘッダー）の設定
    $header = "From: " . mb_encode_mimeheader($name) . "<" . $email . ">\n";

    //メールの送信結果を変数に代入 （サンプルなのでコメントアウト）
    if (ini_get('safe_mode')) {
      //セーフモードがOnの場合は第5引数が使えない
      $result = mb_send_mail($mailTo, $subject, $mail_body, $header);
    } else {
      $result = mb_send_mail($mailTo, $subject, $mail_body, $header, $returnMail);
    }

    //メールが送信された場合の処理
    if ($result) {
      //空の配列を代入し、すべてのPOST変数を消去
      $_POST = array();

      $params = '?';
      $params .= 'name=' . h($name);
      $params .= '&email=' . h($email);
      $params .= '&body=' . replace(h($body));


      //変数の値も初期化
      $name = '';
      $email = '';
      $body = '';

      $url = 'complete.php';
      header('Location:' . $url . $params);
      exit;
    }
  }
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="title" content="Yo's Portfolio — よーの作品集">
  <meta name="description" content="Webプログラミングの勉強をしております。よーのポートフォリオサイトです。">
  <link rel="icon" href="src/image/favicon.ico" id="favicon">
  <link rel="apple-touch-icon" sizes="180x180" href="src/image/apple-touch-icon-180x180.png">
  <link rel="stylesheet" href="src/css/style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <title>Yo's Portfolio — よーの作品集</title>
</head>

<body>
  <header class="header">
    <div class="header-inner">
      <nav class="header-nav _pc">
        <ul class="nav-list">
          <li class="nav-item about-btn">
            <a href="#about" class="nav-a">About</a>
          </li>
          <!-- /.nav-item -->
          <li class="nav-item service-btn">
            <a href="#service" class="nav-a">Skills</a>
          </li>
          <!-- /.nav-item -->
          <li class="nav-item works-btn">
            <a href="#works" class="nav-a">Works</a>
          </li>
          <!-- /.nav-item -->
          <li class="nav-item contact-btn">
            <a href="#contact" class="nav-a">Contact</a>
          </li>
          <hr />
        </ul>
        <!-- /.nav-list -->
      </nav>
      <!-- /.header-nav -->
      <nav class="header-nav _sp">
        <div class="btn-trigger" id="btn01">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="overlay">
          <ul class="sp-nav-list">
            <li class="nav-item about-btn">
              <a href="#about" class="nav-a">About</a>
              <hr class="sp-hr" />
            </li>
            <!-- /.nav-item -->
            <li class="nav-item service-btn">
              <a href="#service" class="nav-a">Skills</a>
              <hr class="sp-hr" />
            </li>
            <!-- /.nav-item -->
            <li class="nav-item works-btn">
              <a href="#works" class="nav-a">Works</a>
              <hr class="sp-hr" />
            </li>
            <!-- /.nav-item -->
            <li class="nav-item contact-btn">
              <a href="#contact" class="nav-a">Contact</a>
              <hr class="sp-hr" />
            </li>
            <!-- /.nav-item contact-btn -->
          </ul>
          <!-- /.nav-list -->
        </div>
        <!-- /.overlay -->
      </nav>
      <!-- /.header-nav sp -->
    </div>
  </header>
  <!-- /.header -->
  <header class="fix-header">
    <div class="fix-header-inner">
      <nav class="fix-header-nav _pc">
        <ul class="nav-list">
          <li class="nav-item about-btn">
            <a href="#about" class="nav-a">About</a>
          </li>
          <!-- /.nav-item -->
          <li class="nav-item service-btn">
            <a href="#service" class="nav-a">Skills</a>
          </li>
          <!-- /.nav-item -->
          <li class="nav-item works-btn">
            <a href="#works" class="nav-a">Works</a>
          </li>
          <!-- /.nav-item -->
          <li class="nav-item contact-btn">
            <a href="#contact" class="nav-a">Contact</a>
          </li>
          <hr />
        </ul>
        <!-- /.nav-list -->
      </nav>
      <!-- /.header-nav -->
      <nav class="fix-header-nav _sp">
        <div class="fix-btn-trigger" id="btn02">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="fix-overlay">
          <ul class="sp-nav-list">
            <li class="nav-item about-btn">
              <a href="#about" class="nav-a">About</a>
              <hr class="fix-sp-hr" />
            </li>
            <!-- /.nav-item -->
            <li class="nav-item service-btn">
              <a href="#service" class="nav-a">Skills</a>
              <hr class="fix-sp-hr" />
            </li>
            <!-- /.nav-item -->
            <li class="nav-item works-btn">
              <a href="#works" class="nav-a">Works</a>
              <hr class="fix-sp-hr" />
            </li>
            <!-- /.nav-item -->
            <li class="nav-item contact-btn">
              <a href="#contact" class="nav-a">Contact</a>
              <hr class="fix-sp-hr" />
            </li>
            <!-- /.nav-item contact-btn -->
          </ul>
          <!-- /.nav-list -->
        </div>
        <!-- /.overlay -->
      </nav>
      <!-- /.header-nav sp -->
    </div>
  </header>
  <!-- /.fix-header -->
  <main class="main">
    <div class="main-visual">
      <h1 class="main-text">Yo's<br />Portfolio</h1>
      <!-- /.main-text -->
    </div>
    <!-- /.main-visual -->
    <section class="about" id="about">
      <div class="about-inner">
        <h2 class="section-title">About Me</h2>
        <!-- /.section-title -->
        <div class="about-content">
          <p class="about-text">
            初めまして。<br>
            この度は、ポートフォリオサイトをご覧いただきありがとうございます。
            2000年生まれ、沖縄県出身です。<br>
            現在IT系の専門学校に通学しております。<br>
            去年から独学でもプログラミングの勉強を開始しており、<br>
            現在は、フロントエンドの勉強をしております。
          </p>
          <!-- /.about-text -->
        </div>
        <!-- /.about-text -->
      </div>
      <!-- /.about-inner -->
    </section>
    <!-- /.about -->
    <section class="service" id="service">
      <h2 class="section-title">Skills</h2>
      <!-- /.section-ttl -->
      <div class="service-wrapper">
        <div class="service-content">
          <img src="src/image/program-icon.svg" alt="コーディングイメージ画像" class="service-visual" />
          <h3 class="service-title">HTML/CSSコーディング</h3>
          <!-- /.service-title -->
          <p class="service-text">
            デザインデータから正確なコーディングができます。<br>レスポンシブ対応も可能です。
          </p>
          <!-- /.service-text -->
        </div>
        <!-- /.service-content -->
        <div class="service-content">
          <img src="src/image/js-logo.png" alt="Webサイト更新イメージ画像" class="service-visual" />
          <h3 class="service-title">JavaScript（jQuery）</h3>
          <!-- /.service-title -->
          <p class="service-text">
            JavaScriptを使用して簡単なアニメーションの実装ができます。<br>
            jQueryを使用してスライダーなどの実装もできます。
          </p>
          <!-- /.service-text -->
        </div>
        <!-- /.service-content -->
        <div class="service-content">
          <img src="src/image/WordPress-logotype-wmark.png" alt="Wordpressイメージ画像" class="service-visual" />
          <h3 class="service-title">WordPressの導入</h3>
          <!-- /.service-title -->
          <p class="service-text">
            既存のWebサイトをWordPress化することができます。
          </p>
          <!-- /.service-text -->
        </div>
        <!-- /.service-content -->
      </div>
      <!-- /.service-content -->
    </section>
    <!-- /.service -->
    <section class="works" id="works">
      <h2 class="section-title">Works</h2>
      <!-- /.section-ttl -->
      <div class="works-wrapper">
        <div class="works-content odd">
          <img src="src/image/screencapture-yo0620-xsrv-jp-XD-Clinic-2021-07-05-12_38_57.png" alt="クリニックサイト" class="works-visual"></img><!-- /.works-visual -->
          <a href="https://yo0620.xsrv.jp/XD_Clinic/" class="content-mask">
            <h3 class="works-title">XDデザインカンプからのコーディング</h3><!-- /.works-title -->
            <p class="works-text">ユーザー名: user1<br>パスワード: yodesu<br>提供元：しょーごログ様</p><!-- /.works-text -->
          </a><!-- /.content-mask -->
        </div><!-- /.works-content -->
        <div class="works-content even">
          <img src="src/image/screencapture-yo0620-xsrv-jp-Your-Coding-2021-07-06-00_02_32.png" alt="ユアコーディングサイト" class="works-visual"></img><!-- /.works-visual -->
          <a href="https://yo0620.xsrv.jp/Your_Coding" class="content-mask">
            <h3 class="works-title">XDデザインカンプからのコーディング2</h3><!-- /.works-title -->
            <p class="works-text">ユーザー名: user1<br>パスワード: yodesu2<br>提供元：しょーごログ様</p><!-- /.works-text -->
          </a>
        </div><!-- /.works-content -->
        <div class="works-content odd">
          <img src="src/image/screencapture-yo0620-xsrv-jp-XD-Hotel-2021-07-05-23_55_28.png" alt="架空旅館サイト" class="works-visual"></img><!-- /.works-visual -->
          <a href="https://yo0620.xsrv.jp/XD_Hotel" class="content-mask">
            <h3 class="works-title">XDデザインカンプからのコーディング3</h3><!-- /.works-title -->
            <p class="works-text">ユーザー名: user1<br>パスワード: yodesu3<br>提供元：しょーごログ様</p><!-- /.works-text -->
          </a>
        </div><!-- /.works-content -->

      </div><!-- /.works-inner -->
    </section>
    <!-- /.works -->
    <section class="contact" id="contact">
      <h2 class="section-title">Contact</h2><!-- /.section-title -->
      <form id="my_form" class="contact-form" method="post">
        <label for="name">お名前</label>
        <input type="text" name="name" required value="<?php echo h($name); ?>">
        <label for="email">メールアドレス</label>
        <input type="email" name="email" required value="<?php echo h($email); ?>">
        <label for="body">ご質問・ご相談</label>
        <textarea name="body" id="body" rows="3" placeholder="お問い合わせ内容をお書きください"><?php echo h($body); ?></textarea><!-- /# -->
        <input type="submit" name="submitted" value="送信する" class="contact-form-button">
      </form><!-- /.form -->
    </section>
    <!-- /.contact -->
  </main>
  <!-- /.main -->
  <footer class="footer">
    <p class="copy-right">&copy; 2021 Yo_Shinzato</p><!-- /.copy-right -->
  </footer>
  <!-- /.footer -->
  <script type="text/javascript" src="src/javascript/script.js"></script>
</body>

</html>