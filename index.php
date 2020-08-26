<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>phpform</title>
</head>

<body>
     <?php
     session_start();

     require 'validation.php';

     header('X-FRAME-OPTIONS:DENY');

     function h($str)
     {
          return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
     }

     $page = 0;
     $error = validation($_POST);

     if (!empty($_POST['confirm']) && empty($error)) {
          $page = 1;
     }
     if (!empty($_POST['register'])) {
          $page = 2;
     }
     ?>
     <?php if ($page === 2) : ?>
          <?php if ($_POST['csrf'] === $_SESSION['csrfToken']): ?>
          送信完了しました。
          <?php endif; ?>
     <?php endif; ?>
     <?php if ($page === 1) : ?>
          <?php if ($_POST['csrf'] === $_SESSION['csrfToken']): ?>
          <form action="index.php" method="post">
               <P>名前：<?php print(h($_POST['name'])); ?></p>
               <p>メールアドレス： <?php print(h($_POST['email'])); ?></p>
               <p>HP： <?php print(h($_POST['url'])); ?></p>
               <p>性別： 
               <?php
               if ($_POST['gender'] === '0'){echo '男性';}
               if ($_POST['gender'] === '1'){echo '女性';}
               if ($_POST['gender'] === '2'){echo 'その他';}
               ?>
               </p>
               <p>年齢：
               <?php
               if ($_POST['age'] === '1'){echo '〜19歳';}
               elseif ($_POST['age'] === '2'){echo '20歳〜29歳';}
               elseif ($_POST['age'] === '3'){echo '30歳〜39歳';}
               elseif ($_POST['age'] === '4'){echo '40歳〜49歳';}
               elseif ($_POST['age'] === '5'){echo '50歳〜59歳';}
               elseif ($_POST['age'] === '6'){echo '60歳〜';}
               ?></p>
               <p>お問い合わせ内容： <?php print(h($_POST['contact'])); ?></p>
               <input type="submit" name="register" value="登録する">
               <input type="submit" value="戻る">
               <input type="hidden" name="name" value="<?php print(h($_POST['name'])); ?>">
               <input type="hidden" name="email" value="<?php print(h($_POST['email'])); ?>">
               <input type="hidden" name="csrf" value="<?php print(h($_POST['csrf'])); ?>">
          </form>
          <?php endif; ?>
     <?php endif; ?>
     <?php if ($page === 0) : ?>
          <?php if (!isset($_SESSION['csrfToken'])): ?>
          <?php $csrfToken = bin2hex(random_bytes(32));
               $_SESSION['csrfToken'] = $csrfToken;
          ?>
          <?php endif; ?>
          <?php $token = $_SESSION['csrfToken']; ?>

          <?php if(!empty($_POST['confirm']) && !empty($error)): ?>
               <ul>
                    <?php foreach($error as $value): ?>
                         <li><?php echo $value;?></li>
                    <?php endforeach; ?>
               </ul>
          <?php endif; ?>
          <form action="index.php" method="post">
               <input type="text" name="name" placeholder="名前" value="<?php print(h($_POST['name'])); ?>"><br>
               <input type="email" name="email" placeholder="メールアドレス" value="<?php print(h($_POST['email'])); ?>"><br>
               <input type="url" name="url" value="<?php echo h($_POST['url']); ?>" placeholder="HP"><br>
               性別：
               <input type="radio" name="gender" value="0">男性
               <input type="radio" name="gender" value="1">女性
               <input type="radio" name="gender" value="2">その他<br>
               年齢：
               <select name="age">
                    <option value="">選択してください</option>
                    <option value="1">〜19歳</option>
                    <option value="2">20歳〜29歳</option>
                    <option value="3">30歳〜39歳</option>
                    <option value="4">40歳〜49歳</option>
                    <option value="5">50歳〜59歳</option>
                    <option value="6">60歳〜</option>
               </select>
               <br>
               お問い合わせ内容<br>
               <textarea name="contact" id="" cols="30" rows="10" value="<?php h($_POST['contact']); ?>"></textarea>
               <br>
               <input type="checkbox" name="caution" value="1">注意事項にチェックする
               <br>
               <input type="submit" name="confirm" value="確認する">
               <input type="hidden" name="csrf" value="<?php echo $token; ?>">
          </form>
     <?php endif; ?>
</body>

</html>