<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

clearstatcache();
// This files is mostly containing things for your view / html ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
          <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet"> 
   <link rel="stylesheet" href="style.css">
    <title>My little horsey</title>
</head>
<body>
<h1>My little horsey <br> <span>"All things you need for your horses" </span> </h1>
<div class="container">
   <h2>Place your order</h2>
   <?php // Navigation for when you need it ?>
   <?php /*
   <nav>
      <ul class="nav">
         <li class="nav-item">
               <a class="nav-link active" href="?food=1">Order food</a>
         </li>
         <li class="nav-item">
               <a class="nav-link" href="?food=0">Order drinks</a>
         </li>
      </ul>
   </nav>
   */ ?>
   <form method="post" >
      <p>* required field</p>
      <div class="alert alert-danger" role="alert">
         <?=  $emailErr;?>
      </div>
      <div class="form-row">
         <div class="form-group col-md-6">
               <label for="email">E-mail:</label> <span class="alertErr">* </span>
               <input type="text" id="email" name="email" class="form-control"/>
         </div>
         <div></div>
      </div>

      <fieldset>
         <legend>Address</legend>

         <div class="form-row">
               <div class="form-group col-md-6">
                  <label for="street">Street:</label> <span class="alertErr">* <?=  $streetErr;?></span>
                  <input type="text" name="street" id="street" class="form-control">
               </div>
               <div class="form-group col-md-6">
                  <label for="streetnumber">Street number:</label><span class="alertErr">* <?=  $streetnumberErr;?></span>
                  <input type="text" id="streetnumber" name="streetnumber" class="form-control">
               </div>
         </div>
         <div class="form-row">
               <div class="form-group col-md-6">
                  <label for="city">City:</label><span class="alertErr">* <?=  $cityErr;?></span>
                  <input type="text" id="city" name="city" class="form-control">
               </div>
               <div class="form-group col-md-6">
                  <label for="zipcode">Zipcode:</label><span class="alertErr">* <?=  $zipcodeErr;?></span>
                  <input type="number" id="zipcode" name="zipcode" class="form-control">
               </div>
         </div>
      </fieldset>

      <fieldset>
         <legend>Products</legend>
         <?php foreach ($products as $i => $product): ?>
               <label>
                  <input type="checkbox" value=<?= $i ?> name="products[<?= $i ?>]"/> 
                  <?= $product['name'] ?> - &euro; <?= number_format($product['price'], 2) ?>
               </label><br/>
         <?php endforeach; ?>

      </fieldset>
      <button type="submit" name="submit" class="btn btn-primary">Order!</button>
   </form>

   <footer> 
      You already ordered <strong>&euro; <?= $totalValue ?></strong> in horse-tastic material.
   </footer>
   <p>
      <?= "Your ordered items:<br>".implode("<br>",$basket)."<br><br>".$confirmation.$address.$error ?>
   </p>
   
</div>
<style>
    footer {
        text-align: center;
    }
</style>

</body>
</html>