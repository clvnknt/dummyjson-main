<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);
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
    <title>Search Product</title>
</head>
<body>
        <!-- As a heading -->
 <nav class="navbar bg-light">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Search Product</span>
  </div>
</nav>

<div class="container text-center mt-5">
        <form action="search-product.php" method="POST">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search a product" name="search_product">
                <button class="btn btn-outline-secondary" type="submit" id="search">Search<i class="fas fa-search"></i</button>
            </div>
        </form>
                </div>  
        </body>
</html>

<?php

if (isset($_POST['search_product'])){

    $search_product = $_POST['search_product'];
    $response = $client->get('https://dummyjson.com/products/search?q='. $search_product);
    $code = $response->getStatusCode();
    $body = $response->getBody();
    $search_product = json_decode($body, true);
?>

<html>
  <body>
        <!-- As a heading -->
 <nav class="navbar bg-light">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Results</span>
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
        <?php
        foreach ($search_product['products'] as $product){
        ?>
          <tr>
                <th href="single-product.php"><?= $product['id'];?></th>
                <td><?= $product['title'];?></td>
                <td><?= $product['description'];?></td>
                <td><?= $product['price'];?></td>
                <td><?= $product['brand'];?></td>
                <td><?= $product['category'];?></td>
                <td><img src="<?= $product['thumbnail'];?>" class="img-responsive" height="200px"></td>
          </tr>
     <?php
     }
}
?>
        </tbody>
        </table>
   </body>
</html>