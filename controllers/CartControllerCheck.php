<?php
class CartControllerCheck{
    public function bookCountInCartController($id,$user){
        if(isset($_COOKIE['ID_user'])){
        $user = $_COOKIE['ID_user'];
        $bCount = Cart::bookCountInCart($id,$user);
        return $bCount;
        }
        return 0;
    }
    public function booksCountInCartController(){
        if(isset($_COOKIE['ID_user'])){

            $user =  $_COOKIE['ID_user'];
            $bCount = Cart::booksCountInCart($user);
            return $bCount;
        }
        return 0;
    }
    public function booksInCartController($user){
        if($user){

            $bCount = Cart::booksInCart($user);
            return $bCount;
        }
     
    }
    public function getQntOfBookController($id,$user){
        $bCount = Cart::getQntOfBook($id,$user);
        return $bCount;
    }
     public function getTotalPriceController(){
        if(isset($_COOKIE['ID_user'])){

            $user =  $_COOKIE['ID_user'];
    
            $bCount = Cart::getTotalPrice($user);
            return $bCount;
        }
    }
    public function deleteCartController($id,$user){
        return Cart::deleteCart($id,$user);
    }
    public function deleteAllCartController($user){
        return Cart::deleteAllCart($user);
    }
 
   
}