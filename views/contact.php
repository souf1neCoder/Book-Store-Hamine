<?php
if(isset($_POST['contact'])){
    if(!empty($_POST['nomPre'] and !empty($_POST['email']) and !empty($_POST['msg']))){
        $confirm = new ConfirmController();
        $confirm->Contact();
    }
}
?>
<main class="main">
    <section class="contact_section">
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
            <div class="jumbotron mt-5">
                <h3 class="text-center title-head">Contactez Nous</h3>
                <div class="row justify-content-center mt-5">
                    <div class="col-lg-8  col-md-10">
                        <form class="form_contact text-center" method="post">
                            <div class="form-group">
                                <label for="nompre">Nom et Prénom</label>
                                <input class="form-control" type="text" id="nompre" required name="nomPre">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input  class="form-control" type="email" id="email" required name="email">
                            </div>
                            <div class="form-group">
                                <label for="msg">Message</label>
                                <textarea  class="form-control" required name="msg" id="msg" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn_confirm_final" name="contact">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>