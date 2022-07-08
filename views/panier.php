<?php
$cartContent = [];
$cart = new CartControllerCheck();
$book = new BooksController();
if(isset($_COOKIE['ID_user'])){
    $userCookie = $_COOKIE['ID_user'];
    $cartContent = $cart->booksInCartController($userCookie);
}

$countBooks = $cart->booksCountInCartController();
$TOTAL = $cart->getTotalPriceController();
$Books = [];


// echo $countBooks;
// 
foreach($cartContent as $c){
$id = $c['ID_book'];
$b = $book->getBookController($id);

array_push($Books,$b);

}


?>
<main class="main">
<section id="cart_section">
    <div class="cart-main mt-5">
        <div class="container">
        <div class="alert_space">

            <?php
             if(isset($_COOKIE['success'])){
                echo '<div class="alert text-center alert-success alert-dismissible fade show" role="alert">
                ' . $_COOKIE['success'] .'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            }
             ?>
        </div>
            <h3 class="text-left title-head mb-4">Mon Panier (<?php echo $countBooks ?> Livres)</h3>
            <div class="row mt-4">
                
                <div class="col-lg-8">
                    <?php if($countBooks == 0): ?>
                        <h4 class="text-center mt-5 text-dark">Votre Panier Est Vide</h4>
                    <?php else: ?>
                    <?php foreach($Books as $oneBook): ?>
                    <div class="cart-books">
                        <div class="cart-book my-2">
                            <div class="cart-item">
                                <div class="cart-item-info d-flex align-items-center">

                                    <img class="mr-auto" src="assets\images_books\<?php echo $oneBook["book_image"] ?>" alt="livre couverture">
                                        <div class="pl-3">
                                            <h4 class="mb-2 font-weight-bold"><?php echo $oneBook['book_titre'] ?> <span>par <?php echo $oneBook['book_editor'] ?></span></h4>
                                            <h5 class="mb-2"><?php echo $oneBook['book_price'] ?>.00DH</h5>
                                            <a  href="<?php echo base_url ?>?page=sup-livre-de-panier&id-livre=<?php echo $oneBook['unique_id'] ?>" class="remove_item">Supprimer</a>
                                        </div>
                                </div>
                               

                                <div class="mr-3">
                                <form class="qntCtr">
                                      <input type="hidden" name="unique_id" value="<?php echo $oneBook['unique_id'] ?>">
                                      <input type="hidden" name="qntOpr" value="inc">
                                      <button type="submit" class="c-amount-id incQnt">
                                        <i class="fas fa-chevron-up "></i>
                                    </button>
                                </form>
                                <p class="item_amount text-center"><?php echo $cart->getQntOfBookController($oneBook['unique_id'],$userCookie) ?></p>
                                <form class="qntCtr">
                                      <input type="hidden" name="unique_id" value="<?php echo $oneBook['unique_id'] ?>">
                                      <input type="hidden" name="qntOpr" value="dec">
                                      <button type="submit" class="c-amount-id incQnt">
                                        <i class="fas fa-chevron-down "></i>
                                    </button>
                                </form>
                                  

                                </div>
                            </div>
                        </div>
                        <!--  -->

                    </div>
            <?php endforeach; ?>
            <?php endif; ?>

                </div>

               
                <div class="col-lg-4">
                    <div class="box_commandes">
                        <h4 class="title-head">Ordres</h4>
                        <div class="my_hr my-2"></div>
                        <h5 class="text-head-sm"><?php echo $countBooks ?> Livres</h5>
                        <div class="my_hr my-2"></div>

                        <div class="total_content d-flex justify-content-between mb-3">
                            <b>Total</b>
                            <b><span class="total"><?php echo $TOTAL > 0 ? $TOTAL : 0 ?></span>.00 DH</b>
                        </div>
                        <?php if($countBooks > 0): ?>
                        <a href="<?php echo base_url ?>?page=confirmer-ma-commande" class="btn_confirm">confirmer ma commande</a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="app/quantity.js"></script>
</main>
