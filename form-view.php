<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

clearstatcache();
*/
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
   <div id="banner">
      <h1>My little horsey </h1>
      <h2>"All things you need for your horses" </h2> 
   </div>

<div class="container">
   <h3>Place your order</h3>
   <?php // Navigation for when you need it ?>
   <nav>
      <ul class="nav">
         <li class="nav-item">
               <a class="nav-link active" href="?material=1">Order materials</a>
         </li>
         <li class="nav-item">
               <a class="nav-link" href="?horses=0">Order horses</a>
         </li>
      </ul>
   </nav>

   <form method="post" >
   <!-- //TODO insert required field box -->
      <div class= <?="$alert_box"?> role="alert">
      <p>* required field</p>
         <?=  $emailErr;?>
      </div>
      <div class="form-row">
         <div class="form-group col-md-6">
               <label for="email">E-mail:</label> <span class="alertErr">* </span>
               <input type="email" id="email" name="email" class="form-control" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : (isset($_SESSION["email"]) ? $_SESSION("email"):'') ; ?>" placeholder="name@example.com" required/>  <!-- (isset($_SESSION["email"]) ? $_SESSION("email"):'') -->
         </div>
         <div></div>
      </div>

      <fieldset>
         <legend>Address</legend>

         <div class="form-row">
               <div class="form-group col-md-6">
                  <label for="street">Street:</label> <span class="alertErr">* <?=  $streetErr;?></span>
                  <input type="text" name="street" id="street" class="form-control" value="<?php echo isset($_POST["street"]) ? $_POST["street"] : (isset($_SESSION["street"]) ? $_SESSION("street"):''); ?>" required>
               </div>
               <div class="form-group col-md-6">
                  <label for="streetnumber">Street number:</label><span class="alertErr">* <?=  $streetnumberErr;?></span>
                  <input type="text" id="streetnumber" name="streetnumber" class="form-control" value="<?php echo isset($_POST["streetnumber"]) ? $_POST["streetnumber"] : (isset($_SESSION["streetnumber"]) ? $_SESSION("streetnumber"):''); ?>" required>
               </div>
         </div>
         <div class="form-row">
               <div class="form-group col-md-6">
                  <label for="city">City:</label><span class="alertErr">* <?=  $cityErr;?></span>
                  <input type="text" id="city" name="city" class="form-control" value="<?php echo isset($_POST["city"]) ? $_POST["city"] : (isset($_SESSION["city"]) ? $_SESSION("city"):''); ?>" required>
               </div>
               <div class="form-group col-md-6">
                  <label for="zipcode">Zipcode:</label><span class="alertErr">* <?=  $zipcodeErr;?></span>
                  <input type="text" id="zipcode" name="zipcode" pattern="[0-9]{4}" size = "4" class="form-control" value="<?php echo isset($_POST["zipcode"]) ? $_POST["zipcode"] : (isset($_SESSION["zipcode"]) ? $_SESSION("zipcode"):''); ?>" required>
               </div>
         </div>
      </fieldset>

      <fieldset>
         <legend>Products</legend>
         <div class="form-row">
            <?php foreach ($products as $i=>$product):?> 
                  <label class="form-group col-md-6-lg-3 mr-auto">
                     <img src=<?="{$product->image}"?> alt=""> <br>
                     <input type="checkbox" value="<?= $i?>" name="products[<?= $i?>]"/> 
                     <?= $product->name ?> - &euro; <?= $product->formatNumber($product->price); ?>
                  </label><br/>
            <?php endforeach; ?>
         </div>

      </fieldset>
      <button type="submit" name="submit" class="btn btn-primary">Order!</button>
   </form>
<!-- //TODO insert ORDER INFO-->
   <footer> 
      You already ordered <strong>&euro; <?= $totalValue ?></strong> in horse-tastic material.
   </footer>
   <p>
      <?= "Your ordered items:<br>".implode("<br>",$basket)."<br><br>".$confirmation.$address ?> <!-- // Bert-session: foreach with list items -->
   </p>
   
</div>
<style>
    footer {
        text-align: center;
    }
</style>

</body>
</html>