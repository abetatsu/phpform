<?php

//抽象クラス 設定するメソッドの強制
abstract class ProductAbstract{

     public function echoProduct(){
          echo '親クラスです';
     }

     abstract public function getProduct();
}



//具象クラス
class Product extends BaseProduct{


     private $product = [];

     function __construct($product)
     {
          $this->product = $product;
     }

     public function getProduct()
     {
          echo $this->product;
     }

     public function addProduct($item)
     {
          $this->product .= $item;
     }

     public static function getStaticProduct($str)
     {
          echo $str;
     }

}

$instance = new Product('テスト');

$instance->getProduct();
echo '<br>';

$instance->echoProduct();
echo '<br>';

$instance->addProduct('追加分');
echo '<br>';

$instance->getProduct();
echo '<br>';

Product::getStaticProduct('静的');
echo '<br>';