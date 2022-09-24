<?php
require "vendor/autoload.php";

use GuzzleHttp\Client;

$client = new Client([
        'base_uri' => 'https://dummyjson.com/'
]);

$response = $client->get("products");
$code = $response->getStatusCode();
$body = $response->getBody();
$x = json_decode($body);

$products = $x->products;


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
    
    <title>Products List</title>
</head>
<body>

<!-- As a heading -->
<nav class="navbar bg-light">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Users</span>
  </div>
</nav>

<table class="table table-dark table-striped">
  <tr>
    <th>ID</th>
    <th>Title</th>
    <th>Description</th>
    <th>Price</th>
    <th>Brand</th>
    <th>Category</th>
    <th>Thumbnail</th>
  </tr>
  
<tbody>
    <?php
    foreach ($products as $product):
    ?>
    <tr>
      
        <td><?=$product->id;?></td>
        <td><?=$product->title;?></td>
        <td><?=$product->description;?></td>
        <td><?=$product->price;?></td>
        <td><?=$product->brand;?></td>
        <td><?=$product->category;?></td>
        <td><?="<img width=150x; height=150x; src=" . $product->thumbnail .">";?></td>
        
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</body>
</html>