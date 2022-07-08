<?php
$cart = new CartControllerCheck();
$count = $cart->booksCountInCartController();
?>
<nav class="navbar navbar-expand-lg">
          <div class="container">
            <a class="navbar-brand" href="<?php echo base_url ?>"
              ><i class="las la-book"></i> <span>Hamine</span></a
            >
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarNav"
              aria-controls="navbarNav"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="<?php base_url ?>?page=accueil"
                    >Accueil<span class="sr-only">(current)</span></a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php base_url ?>?page=collection">Collection</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php base_url ?>?page=propose">à propos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php base_url ?>?page=contact">contact</a>
                </li>
                <li class="nav-item cart-books">
                  <a href="<?php base_url ?>?page=panier">
                  <span class="linko">
                        <i class="las la-shopping-cart"></i
                    ><span id="cart_books"><?php echo $count ?></span>
                    </span>
                  </a>
                    

                </li>
               
              </ul>
            </div>
          </div>
        </nav>