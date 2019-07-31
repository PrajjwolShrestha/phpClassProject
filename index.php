<?php
require('vendor/autoload.php');

use aitsydney\Product;

$products = new Product();
$product_result = $products -> getProducts();

//create twig loader
$loader = new \Twig\Loader\FilesystemLoader('templates');

//create twig environment
$twig = new \Twig\Environment($loader);

//load a twig template

$template = $twig -> load('home.twig');

//pass value to twig
echo $template -> render([
    'products' => $product_result,
    'title' => 'Hello shop'
]);


?>

