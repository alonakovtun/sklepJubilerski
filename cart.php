<?php
    ob_start();
    //include header.php file
    include('header.php');
?>

<?php 
    //include product
    include('Template/_cart-template.php');

    //include new jewelry
    include('Template/_new-jewelry.php');
?>


<?php 
    //include footer.php file 
    include("footer.php")
?>