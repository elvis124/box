<?php

$con = mysqli_connect("localhost","root","","mb");



require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';


/// IP address code starts /////
function getRealUserIp(){
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }

    return $ipaddress;
 }
/// IP address code Ends /////


// items function Starts ///
function random_numbers(){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
  
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
  
    return $randomString;

}


$n =5;
function getNumber($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
  
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
  
    return $randomString;

}
  


function getPro(){

global $db;


$get_products = "select * from products order by 1 DESC LIMIT 0,20";

$run_products = mysqli_query($db,$get_products);

while($row_products=mysqli_fetch_array($run_products)){

$pro_id = $row_products['product_id'];

$pro_title = $row_products['product_title'];

$pro_price = $row_products['product_price'];

$pro_img1 = $row_products['product_img1'];

$pro_label = $row_products['product_label'];

$manufacturer_id = $row_products['manufacturer_id'];

$get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";

$run_manufacturer = mysqli_query($db,$get_manufacturer);

$row_manufacturer = mysqli_fetch_array($run_manufacturer);

$manufacturer_name = $row_manufacturer['manufacturer_title'];

$pro_psp_price = $row_products['product_psp_price'];

$pro_url = $row_products['product_url'];

if($pro_label == "Sale" or $pro_label == "Gift"){

$product_price = "<del> sh$pro_price </del>";

$product_psp_price = "| sh$pro_psp_price";

}
else{

$product_psp_price = "";

$product_price = "sh$pro_price";

}


if($pro_label == ""){


}
else{

$product_label = "

<a class='label sale' href='#' style='color:black;'>

<div class='thelabel' style='background-color:red'>$pro_label</div>

<div class='label-background'> </div>

</a>

";

}


echo "

<div class='col-md-4 col-sm-6 single' >

<div class='product' >

<a href='$pro_url' >

<img src='admin_area/product_images/$pro_img1' class='img-responsive' >

</a>

<div class='text' >




<p class='buttons' >

<a href='$pro_url' class='btn btn-default' style='background-color:white;'>View details</a>

<a href='$pro_url' class='btn btn-primary' style='background-color:red'>

<i class='fa fa-shopping-cart' style='color:orange'></i>Add to cart

</a>


</p>
<p style='background-color:grey'>
<h5><a href='$pro_url' style='color:black' >$pro_title</a></h5>
<p class='price' style='color:black'> $product_price $product_psp_price </p></p>
</div>

$product_label


</div>

</div>

";

}

}

// getPro function Ends //


/// getProducts Function Starts ///

?>