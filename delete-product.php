<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$products = [
        'json' => ['id' => '3',
        'title' => 'POCO F3',
        'description' => 'The Xiaomi Poco F3 features a 6.67" display, 48 + 8 + 5MP back camera, 20MP front camera, and a 4520mAh battery capacity',
        'price' => '11530',
        'brand' => 'POCO',
        'category' => 'Smartphones',
        'thumbnail' => 'thumbnail.jpg'
	]
];


$response = $client->delete('https://dummyjson.com/products/1');
$code = $response->getStatusCode();
$body = $response->getBody();
$product = json_decode($body);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
</head>
<body>

 <!-- As a heading -->
 <nav class="navbar bg-light">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Delete Product</span>
  </div>
</nav>

<div class = "container"> 
        <table class="table table-dark table-striped">
                <thead>
                <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Thumbnail</th>
                </tr>
        </thead>
        <tbody>
                <tr>
                <th href="single-product.php"><?= $product->id ?></th>
                <td><?= $product->title?></td>
                <td><?= $product->description?></td>
                <td><?= $product->price?></td>
                <td><?= $product->brand?></td>
                <td><?= $product->category?></td>
                <td><img src="<?= $product->thumbnail?>"></td>
                </tr>
        </tbody>
</table>
</body>
</html>