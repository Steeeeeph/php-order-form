<?php
// This line makes PHP behave in a more strict way
declare(strict_types=1);

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html
// We are going to use session variables so we need to enable sessions
session_start();

require 'classes/Products.php';

// Use this function when you need to need an overview of these variables
function whatIsHappening() {
   echo '<h2>$_GET</h2>';
   var_dump($_GET);
   echo '<h2>$_POST</h2>';
   var_dump($_POST);
   echo '<h2>$_COOKIE</h2>';
   var_dump($_COOKIE);
   echo '<h2>$_SESSION</h2>';
   var_dump($_SESSION);
}
// whatIsHappening();
// provide some products (you may overwrite the example)
// TODO form validation
// $products = [
//    ['name' => 'Grooming set', 'price' => 34.5, 'image' => "assets/Weaver-grooming-kit.jpeg"],
//    ['name' => 'Horse toy', 'price' => 20, 'image' => "assets/horsetoy_bigdees.jpeg"],
//    ['name' => 'Saddle', 'price' => 120, 'image' => "assets/saddle_decathlon.jpeg"],
//    ['name' => 'Whip', 'price' => 8.5, 'image' => "assets/horsewhip_decathlon.jpeg"],
// ];

$products[] = new Products("Grooming set", 34.5, "assets/Weaver-grooming-kit.jpeg");
$products[] = new Products("Saddle", 120, "assets/saddle_decathlon.jpeg");
$products[] = new Products("Whip", 8.5, "assets/horsewhip_decathlon.jpeg");
$products[] = new Products("Horse toy", 20, "assets/horsetoy_bigdees.jpeg");

echo "<pre>";
var_dump($products);
var_dump($products[0]->name);
echo "</pre>";

$totalValue = 0;
$confirmation = "";
$basket=[];
// TODO field validation
$emailErr = $streetErr = $streetnumberErr = $cityErr = $zipcodeErr = $oops = "";
$email = $street = $streetnumber = $city = $zipcode = "";

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
 }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["email"])) {
      $emailErr = "E-mail is required";
   } else {
      $email = test_input($_POST["email"]);
      // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      //    $emailErr = "Invalid email format";
      //  } SOLVED IN HTML
   }
   if (empty($_POST["street"])) {
      $streetErr = "Street is required";
   } else {
      $street = test_input($_POST["street"]);
   }
   if (empty($_POST["streetnumber"])) {
      $streetnumberErr = "Street number is required";
   } else {
      $streetnumber = test_input($_POST["streetnumber"]);
   }
   if (empty($_POST["city"])) {
      $cityErr = "City is required";
   } else {
      $city = test_input($_POST["city"]);
   }
   if (empty($_POST["zipcode"])) {
      $zipcodeErr = "Zipcode is required";
   } else {
      $zipcode = test_input($_POST["zipcode"]);
   }

}


// TODO show selected items
// TODO order confirmation after submit
if (isset($_POST['submit'])) {
   $email = $_POST['email'];
   $street = $_POST['street'];
   $streetnumber = $_POST['streetnumber'];
   $city = $_POST['city'];
   $zipcode = $_POST['zipcode'];

   if(!empty($_POST['products'])) {
      foreach($_POST['products'] as $value){
         $basket[] = $products[$value]['name'];
         // echo "<pre>";
         // print_r($basket);
         // echo "</pre>";
         switch ($products[$value]['name']) {
            case $products[0]['name']:
               $totalValue += $products[0]['price'];
               break;
            case $products[1]['name']:
               $totalValue += $products[1]['price'];
               break;
            case $products[2]['name']:
               $totalValue += $products[2]['price'];
               break;        
            case $products[3]['name']:
               $totalValue += $products[3]['price'];
               break;   
         }
      }
   }

   
   if(!empty($street) && !empty($streetnumber) && !empty($zipcode) && !empty($city)){ //, $streetnumber, $zipcode, $city
      $confirmation = "Thanks for ordering, we'll send an e-mail with the link to the status of your order-shipping.<br>"; 
      $address = "Shipping address: <br> $street $streetnumber <br> $zipcode $city";
   } else {
      $error= "ERROR";
   }

}
require 'form-view.php';

// ALERTBOX
/*
      $oops = "Oops!";


function alertDisplay ($input_value, $name_value){
   if (empty($_POST["$name_value"])) {
      $error_message = "$name_value is required";
   } else {
      $zipcode = test_input($_POST["zipcode"]);
   }
}
*/