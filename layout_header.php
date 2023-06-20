<?php



$_SESSION['cart']=isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

?>
<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title><?php echo isset($page_title) ? $page_title : "SKLEP"; ?></title>
 

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
   

    <link rel="stylesheet" href="libs/css/custom.css" />
 
</head>
<body>
 
    <?php include 'navigation.php'; ?>
 

    <div class="container">
        <div class="row">
 
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo isset($page_title) ? $page_title : "SKLEP"; ?></h1>
            </div>
        </div>