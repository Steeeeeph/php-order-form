<?php

class Products
{
   var $name;
   var $price;
   var $image;

   function formatNumber($price)
   {
      return number_format($price, 2);
   }

   function __construct($name, $price, $image) 
   {
      $this->name = $name;
      $this->price = $price;
      $this->image = $image;
   }



}
