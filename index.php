<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>phpform</title>
</head>

<body>
     <?php
     $page = 0;
     if (!empty($_POST['confirm'])) {
          $page = 1;
     }
     if (!empty($_POST['register'])) {
          $page = 2;
     }
     ?>
     <?php if ($page === 2) : ?>
          送信完了しました。
     <?php endif; ?>
     <?php if ($page === 1) : ?>
          <form action="index.php" method="post">
               <P>名前：<?php print($_POST['name']); ?></p>
               <p>メールアドレス： <?php print($_POST['email']); ?></p>
               <input type="submit" name="register" value="登録する">
               <input type="submit" value="戻る">
               <input type="hidden" name="name">
               <input type="hidden" name="email">
          </form>
     <?php endif; ?>
     <?php if ($page === 0) : ?>
          <form action="index.php" method="post">
               <input type="text" name="name" placeholder="名前" value="<?php print($_POST['name']); ?>"><br>
               <input type="email" name="email" placeholder="メールアドレス" value="<?php print($_POST['email']); ?>"><br>
               <input type="submit" name="confirm" value="確認する">
          </form>
     <?php endif; ?>
</body>

</html>