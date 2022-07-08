<?php
$booksController = new BooksController();
$books = $booksController->getAllBooksController();
$cartController = new CartControllerCheck();

?>
<section id="books">
    <div class="books-main padding">
        <div class="container">
            <h3 class="text-center title-head">tous les livres</h3>
            <div class="row mt-5 justify-content-center books_dooom">
                <?php foreach ($books as $book) : ?>
                    <div class="col-lg-4 mt-4 mb-4 col-sm-12 mx-4">
                        <div class="book-me">
                            <div class="book">
                                <div class="book-img-books">
                                    <img src="./assets/images_books/<?php echo $book['book_image'] ?>" alt="">
                                    <div class="book-cart">
                                        <form method="post" class="formCart" >
                                          
                                            <?php if($cartController->bookCountInCartController($book['unique_id'],null) > 0): ?>
                                                <button class="add_to_cart" name="submit" type="submit" disabled>Déja au Panier
                                            </button>
                                            <?php else: ?>
                                                <input type="hidden" name="unique_id" value="<?php echo $book['unique_id'] ?>">
                                                <input type="hidden" name="book_price" value="<?php echo $book['book_price'] ?>">
                                                <button class="add_to_cart" name="submit" type="submit">
                                                Ajouter au Panier <i class="las la-cart-plus"></i>
                                            </button>
                                            <?php endif; ?>
                                           
                                        </form>
                                    </div>
                                </div>
                                <div class="book-info">
                                    <h5 class="name my-3"><?php echo $book['book_titre'] ?></h5>
                                    <h6 class="text-dark mb-1"><?php echo $book['book_editor'] ?></h6>
                                    <div class="price-and-pages mb-3">
                                        <p><span class="price"><?php echo $book['book_price'] ?>.00</span>DH</p>
                                        <p>Pages <span class="pages"><?php echo $book['book_pages'] ?></span></p>
                                    </div>
                                    <a class="button text-center" href="<?php base_url ?>?page=book&booidk=<?php echo $book['unique_id'] ?>">DÉTAIL</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
              
            </div>
        </div>
    </div>
</section>
<script src="./app/cart.js"></script>
