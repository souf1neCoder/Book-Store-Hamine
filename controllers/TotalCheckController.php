<?php
        require_once "../database/db.php";

require_once "../models/Cart.php";
require_once "./CartControllerCheck.php";
$cart = new CartControllerCheck();
$TOTAL = $cart->getTotalPriceController();
echo $TOTAL;
