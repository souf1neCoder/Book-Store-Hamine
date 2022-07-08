<?php 
class Book{
    public static function getBooks(){
        $books = db::connecte()->prepare("select * from books  order by IDbook desc limit 4");
        $books->execute();
        $res = $books->fetchAll();
        return $res;
    }
    public static function getAllBooks(){
        $books = db::connecte()->prepare("select * from books  order by IDbook desc");
        $books->execute();
        $res = $books->fetchAll();
        return $res;
    }
    public static function getBook($id){
        $book = db::connecte()->prepare("select * from books  where unique_id = ?");
        // $book->bindParam(":idbook",$id);
        $book->execute([$id]);
        $res = $book->fetch();
        return $res;
    }
    public static function getAmountOfBook($id){
        $book = db::connecte()->prepare("select book_amount from books  where unique_id = ?");
        $book->execute([$id]);
        return $book->fetchColumn();
    }
}