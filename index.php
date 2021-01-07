<?php
// This line makes PHP behave in a more strict way
declare(strict_types=1);


// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html



// We are going to use session variables so we need to enable sessions
session_start();


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
// TODO provide some products (you may overwrite the example)
// TODO Add theme selector
// TODO Add a selector for the amount of persons
$products = [
   ['name' => 'Room deco - Small pack', 'price' => 8],
   ['name' => 'Room deco - Medium pack', 'price' => 10],
   ['name' => 'Room deco - Large pack', 'price' => 12],
   ['name' => 'Table deco - per person', 'price' => 3.5],
];

$totalValue = 0;

// if (isset($_POST['checkbox']){
//    $totalValue = isset($products[price]);
// }

// TODO order confirmation after submit
if (isset($_POST['submit'])) {
   $email = $_POST['email'];
   $street = $_POST['street'];
   $streetnumber = $_POST['streetnumber'];
   $city = $_POST['city'];
   $zipcode = $_POST['zipcode'];
   // email to host
   // $mailTo = "stephanie.vanbockhaven@hotmail.com"
   // $headers = "From: ".$mail;
   // $order = "You have received an e-mail from ".$name.".\n\n";

   // mail($mailTo,...);
   $confirmation = "Thanks for ordering, we'll send an e-mail with the link to the status of your order-shipping";
}
require 'form-view.php';