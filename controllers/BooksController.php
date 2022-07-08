<?php
class BooksController{
    public function getBooksController(){
        $books = Book::getBooks();
        return $books;
    }
    public function getAllBooksController(){
        $books = Book::getAllBooks();
        return $books;
    }
    public function getBookController($id){
        $book = Book::getBook($id);
        return $book;
    }
    public function getAmountOfBookController($id){
        $book = Book::getAmountOfBook($id);
        return $book;
    }
}