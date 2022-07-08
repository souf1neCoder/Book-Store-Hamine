<?php 
class Cart{
    public static function bookCountInCart($id,$user){
        $check = db::connecte()->prepare("SELECT count(ID_book) FROM cart WHERE ID_book = :book and ID_user = :user");
        $check->bindParam(":user",$user);
        $check->bindParam(":book",$id);

        $check->execute();
        return $check->fetchColumn();
    }
    public static function booksCountInCart($user){
        $check = db::connecte()->prepare("SELECT count(ID_book) FROM cart where ID_user = :user");
        $check->bindParam(":user",$user);
        $check->execute();
        return $check->fetchColumn();
    }
    public static function booksInCart($user){
        $check = db::connecte()->prepare("SELECT * FROM cart  where ID_user = :user");
        $check->bindParam(":user",$user);
        $check->execute();
        return $check->fetchAll();
    }
    
    public static function getQntOfBook($id,$user){
        $qnt = db::connecte()->prepare("SELECT cart_quantity FROM cart where ID_book = :book and ID_user = :user");
        $qnt->bindParam(":user",$user);
        $qnt->bindParam(":book",$id);
        $qnt->execute();
        return $qnt->fetchColumn();
    }
    public static function  getTotalPrice($user){
        $total = db::connecte()->prepare("select sum(cart_quantity*cart_price) from cart where ID_user = :user");
        $total->bindParam(":user",$user);
        $total->execute();
        return $total->fetchColumn();

    }
    public static function deleteCart($id,$user){
        $del = db::connecte()->prepare("delete FROM cart where ID_book = :book and ID_user = :user");
        $del->bindParam(":user",$user);
        $del->bindParam(":book",$id);
        if($del->execute()){
            return true;
        }
        
    }
    public static function deleteAllCart($user){
        $del = db::connecte()->prepare("delete FROM cart where ID_user = :user");
        $del->bindParam(":user",$user);
       
        if($del->execute()){
            return true;
        }
        
    }
   

}