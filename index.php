<?php
ob_start();
require_once "./config/autoload.php";
$home = new HomeController();
$page = "accueil";
$title = "Med Hamine";
$pages = ["collection","livre","confirmer-ma-commande","Page-non-trouve","panier","accueil","contact","sup-livre-de-panier","propose"];
if(isset($_GET['page'])){
    if(in_array($_GET['page'],$pages)){
        $page = $_GET['page'];
    }
    else{
        $page="Page-non-trouve";
    }
}
require_once './views/includes/header.php';
require_once './views/includes/nav.php';
$home->index($page);
require_once './views/includes/footer.php';
