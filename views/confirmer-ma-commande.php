<?php
if(isset($_POST['confirmer'])){
    if(!empty($_POST['nomPre'] and !empty($_POST['phone']) and !empty($_POST['adr']))){
        $confirm = new ConfirmController();
        $confirm->Confirm();
    }
}
?>
<main class="main">
    <section class="confirm_section">
        <div class="container">
            <div class="jumbotron mt-5">
                <h3 class="text-center title-head">Confirmer Ma Commande</h3>
                <div class="row justify-content-center mt-5">
                    <div class="col-lg-8  col-md-10">
                        <form class="form_confirm text-center" method="post">
                            <div class="form-group">
                                <label for="nompre">Nom et Prénom</label>
                                <input class="form-control" type="text" id="nompre" required name="nomPre">
                            </div>
                            <div class="form-group">
                                <label for="phone">Numéro de Téléphone</label>
                                <input  class="form-control" type="text" id="phone" required name="phone">
                            </div>
                            <div class="form-group">
                                <label for="adr">Adresse</label>
                                <input  class="form-control" type="text" id="adr" required name="adr">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn_confirm_final" name="confirmer">Confirmer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>