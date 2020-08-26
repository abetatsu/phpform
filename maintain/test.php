<?php

$contactFile = '.contact.dat';

$contents = fopen($contactFile, 'a+');

$addText = '1行追記' . "\n";

fwrite($contents, $addText);

fclose($contents);

// $contactContents = file_get_contents($contactFile);

// $addText = 'テストです' . "\n";

// file_put_contents($contactFile, $addText, FILE_APPEND);

// echo $contactContents;

// $allData = file($contactFile);

// foreach($allData as $lineData) {
//      $lines = explode(',', $lineData);
//      echo $lines[0]. '<br>';
//      echo $lines[1]. '<br>';
//      echo $lines[2]. '<br>';
// }

