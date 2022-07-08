<?php
if (isset($_COOKIE['ID_user'])) {
    require_once "../models/Book.php";
    require_once "./BooksController.php";
    require_once "../models/Cart.php";
    require_once "./CartControllerCheck.php";
    $user = $_COOKIE['ID_user'];
    $book = $_POST["unique_id"];
    $qntOpr = $_POST['qntOpr'];
    $uQnt = null;

    if (!empty($book) && !empty($qntOpr)) {
        require_once "../database/db.php";
        if ($qntOpr === "inc") {
     
            $Book = new BooksController();

            $amountOfBook = $Book->getAmountOfBookController($book);
           
            $cart = new CartControllerCheck();
            $Qnt = $cart->getQntOfBookController($book, $user);
            if($Qnt == $amountOfBook){
                echo $Qnt;
                exit;
            }
            $uQnt = db::connecte()->prepare("update cart set cart_quantity = cart_quantity + 1 where ID_user = :user and ID_book = :book");
        } else {
        
            $cart = new CartControllerCheck();
            $Qnt = $cart->getQntOfBookController($book, $user);
           
            if ($Qnt == 1) {
                echo "1";
                exit;
            }
            $uQnt = db::connecte()->prepare("update cart set cart_quantity = (cart_quantity - 1) where ID_user = :user and ID_book = :book");
        }
        $uQnt->bindParam(":user", $user);
        $uQnt->bindParam(":book", $book);
        if ($uQnt->execute()) {
          
            $cart = new CartControllerCheck();
            $Qnt = $cart->getQntOfBookController($book, $user);

            echo $Qnt;
        }
    }
}
