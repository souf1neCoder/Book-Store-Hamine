<?php
if(isset($_GET['id-livre'])){
    if(isset($_COOKIE['ID_user'])){
        $id = $_GET['id-livre'];
        $user = $_COOKIE['ID_user'];
        $cart = new CartControllerCheck();
        if($cart->deleteCartController($id,$user)){
            header("location:".base_url."?page=panier");
        }
        
    }else{
        header("location:".base_url."?page=accueil");

    }
}
else{
    header("location:".base_url."?page=page-non-trouve");
    
}