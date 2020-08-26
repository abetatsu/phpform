<?php
function validation($data)
{
     $error = [];
     if (empty($data['name']) || mb_strlen($data['name']) < 20) {
          $error[] = '氏名は20文字以内で必ず入力してください';
     }
     if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
          $error[] = 'メールアドレスは正しい形式で必ず入力してください';
     }
     if (!empty($data['url'])) {
          if (!filter_var($data['url'], FILTER_VALIDATE_URL)) {
               $error[] = 'URLは正しい形式で入力してください';
          }
     }
     if (!isset($data['gender'])) {
          $error[] = '性別を指定してください';
     }
     if (empty($data['age']) || $data['age'] > 6) {
          $error[] = '年齢を項目から選択してください';
     }
     if (empty($data['contact']) || 100 < mb_strlen($data['contact'])) {
          $error[] = 'お問い合わせ内容は100文字以下で入力してください';
     }

     return $error;
}
