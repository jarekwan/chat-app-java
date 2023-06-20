<?php

session_start();
 

session_destroy();
 

$page_title="Dziekuje!";
 

include_once 'layout_header.php';

echo "<div class='col-md-12'>";
 

    echo "<div class='alert alert-success'>";
        echo "<strong>Twoje zamówienie zostało złozone! dziekujemy za twoja zaplate</strong> kiedys moze ci przyslemy produkt, jestesmy tylko posrednikiem.Dziekuje!";
    echo "</div>";

        echo "<div class=my-5'>mozesz sie wylogowac</div>";
    
		echo "<a href='wylog.php' class='btn btn-danger ml-3'>LOG OUT</a>";
 
echo "</div>";
 

include_once 'layout_footer.php';

?>