<?php
$book_id = $_POST['unique_id'];
$book_price = $_POST['book_price'];
if (!empty($book_id)) {
    require_once "../database/db.php";
    // 
    $user_id = null;
    if (isset($_COOKIE['ID_user'])) {
        global $user_id;
        $user_id = $_COOKIE['ID_user'];
    } else {
        global $user_id;
        $user_id = uniqid("", true);
        setcookie("ID_user", $user_id, time() + (86400 * 30), "/");
    }
    $check = db::connecte()->prepare("SELECT count(ID_book) FROM cart WHERE ID_book = :book and ID_user = :user");
    $check->bindParam(":book",$book_id);
    $check->bindParam(":user",$user_id);
    $check->execute();
    $count = $check->fetchColumn();
    if ($count == 0) {

       


        $quantity = 1;
        $stmt = db::connecte()->prepare("insert into cart(ID_user,ID_book,cart_quantity,cart_price) values(:user,:book,:quantity,:price)");
        $stmt->bindParam(":user", $user_id);
        $stmt->bindParam(":book", $book_id);
        $stmt->bindParam(":price", $book_price);
        $stmt->bindParam(":quantity", $quantity, PDO::PARAM_INT);
        if ($stmt->execute()) {
            echo "done";
        } else {
            "failed";
        }
    } else {
        echo "Already Exist";
    }
} else {
    echo "something happen";
}
