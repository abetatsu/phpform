<?php
function combineSpace(string $firstName, string $lastName): string
{
     return $lastName . ' ' . $firstName;
}

$nameParam = ['名前', '苗字'];

function useCombine(array $name, callable $func)
{
     $concatName = $func(...$name);
     print($func.'関数での結合結果: ' . $concatName . '<br>');
}

useCombine($nameParam, 'combineSpace');