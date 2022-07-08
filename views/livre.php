<?php
if (isset($_GET['id-livre'])) {

    $id = $_GET['id-livre'];
    $Book = new BooksController();
    $book = $Book->getBookController($id);
} else {
    header("location:" . base_url . "?page=page-non-trouve");
    exit;
}
$cartController = new CartControllerCheck();
?>

<main class="main">
    <section class="livre section mt-5">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-4">

                    <div class="book-img-books">
                        <img src="./assets/images_books/<?php echo $book['book_image'] ?>" alt="">
                        <div class="book-cart">
                            <form method="post" class="formCart">

                                <?php if ($cartController->bookCountInCartController($book['unique_id'], null) > 0) : ?>
                                    <button class="add_to_cart" name="submit" type="submit" disabled>Déja au Panier
                                    </button>
                                <?php else : ?>
                                    <input type="hidden" name="unique_id" value="<?php echo $book['unique_id'] ?>">
                                    <input type="hidden" name="book_price" value="<?php echo $book['book_price'] ?>">
                                    <button class="add_to_cart" name="submit" type="submit">
                                        Ajouter au Panier <i class="las la-cart-plus"></i>
                                    </button>
                                <?php endif; ?>
                                    
                            </form>
                        </div>
                    </div>
                    <div class="box_mini_infos my-3">
                        <h4>Language : <span><?php echo $book['book_lang'] ?></span></h4>
                        <h4>Date de Sortie : <span><?php echo $book['book_released'] ?></span></h4>
                        <h4>Couverture de Livre : <span><?php echo $book['book_cover'] ?></span></h4>
                        <h4>Pages : <span><?php echo $book['book_pages'] ?></span></h4>
                       
                        
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="infos pl-4">
            <h3 class="title-head mb-3"><?php echo $book['book_titre'] ?></h3>
                        <h5 class="mb-3"><?php echo $book['book_editor'] ?></h5>
                        <strong><?php echo $book['book_price'] ?>.00</span>DH</strong>
                        <p class="my-3"><?php echo $book['book_description'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="./app/cart.js"></script>

</main>