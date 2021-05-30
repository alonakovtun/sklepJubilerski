<?php
    ob_start();
    //include header.php file
    include('header.php');
?>

<?php
    //DBController object
    $db = new DBController();

    //Product object
    $product = new Product($db);
    //include cart items if it is not empty
    count($product->getData('cart')) ? include('Template/_cart-template.php') : include('Template/notFound/_cart_notFound.php');


    //include new jewelry
    include('Template/_new-jewelry.php');
?>


<?php 
    //include footer.php file 
    include("footer.php")
?>