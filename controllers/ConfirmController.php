<?php
class ConfirmController
{
    public function Confirm()
    {
        $nompre = $_POST['nomPre'];
        $phone = $_POST['phone'];
        $adr = $_POST['adr'];
        $cart = new CartControllerCheck();
        $countBooks = $cart->booksCountInCartController();
        if ($countBooks > 0) {
            $book = new BooksController();
            $userCookie = $_COOKIE['ID_user'];
            $cartContent = $cart->booksInCartController($userCookie);
            $Books = [];
            foreach ($cartContent as $c) {
                $id = $c['ID_book'];
                $b = $book->getBookController($id);
                array_push($Books, $b);
            }
            $res = "";
            foreach($Books as $bo){
                $id = $bo['unique_id'];
                $qnt = $cart->getQntOfBookController($id,$userCookie);
                $res .= "<li>". $bo['book_titre']. " par ". $bo["book_editor"] ." <b>Quantité : ". $qnt ."</b></li>";
            }
            $TOTAL = $cart->getTotalPriceController();
            require_once "./config/mail.php";
            $mail->addAddress("Haminele98@gmail.com");
            $mail->Subject = 'Nouveau Commande Par ' . $nompre;
            $mail->Body    = '<h1>Commande Par ' . $nompre . '</h1><br>
            <ul>
            <li>Nom et Prénom : ' . $nompre . ' </li>
            <li>Numéro de Téléphone : ' . $phone . '</li>
            <li>Adresse : ' . $adr . '</li>
            <li>TOTAL : ' . $TOTAL . '.00DH</li>
            </ul>
            <br>
            <h2>Commandes</h2>
            <br>
            <ul>
                '. $res .'
            </ul>
            
            <br>';
            if ($mail->send()) {
                $cart->deleteAllCartController($userCookie);
                
                setcookie("success","Nous vous remercions de votre commande!!. Notre équipe vous contactera via Télephone pour confirmer votre commande",time() + 3);
                header("location:".base_url."?page=panier");
            }else{
                setcookie("success","Votre commande pas confirmé essaie une autre fois",time() + 3);
                header("location:".base_url."?page=panier");
            }
        }
    }
    // 
    public function Contact(){
        $nompre = $_POST['nomPre'];
        $email = $_POST['email'];
        $msg = $_POST['msg'];
        require_once './config/mail.php';
        $mail->addAddress("your_email");
        $mail->Subject = 'Message par un Visiteur';
        $mail->Body    = '<h1>Message Par ' . $nompre . '</h1><br>
        <a mailto="' . $email .'">'. $email .'</a>
        <p>'. $msg .'</p>';
            if ($mail->send()) {
                setcookie("success","Votre message a été envoyé avec success , Nous vous répondrons dans les plus brefs délais",time() + 3);
                header("location:".base_url."?page=contact");
                    
            }else{
                setcookie("success","Votre message N'a pas envoyé  essaie une autre fois",time() + 3);
                header("location:".base_url."?page=contact");
            }
    }
}
