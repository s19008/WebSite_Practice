<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/src/css/style.css" rel="stylesheet">
    <title>完了画面</title>
</head>

<body>
    <section class="complete">
        <h3 class="complete-title">送信しました</h3><!-- /.complete-title -->
        <p class="complete-text">この度は、お問い合わせ頂きありがとうございます。</p><!-- /.complete-text -->
        <div class="complete-responsive">
            <table class="responsive-table">
                <tr>
                    <th>お名前</th>
                    <td>
                        <?php if (isset($_GET['name']) && $_GET['name']) echo $_GET['name']; ?>
                    </td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>
                        <?php if (isset($_GET['email']) && $_GET['email']) echo $_GET['email']; ?>
                    </td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td>
                        <?php if (isset($_GET['body']) && $_GET['body']) echo $_GET['body']; ?>
                    </td>
                </tr>
            </table><!-- /.responsive-table -->
        </div><!-- /.complete-responsive -->
        <a href="index.php" class="complete-btn">戻る</a>
    </section><!-- /.complete -->
</body>

</html>