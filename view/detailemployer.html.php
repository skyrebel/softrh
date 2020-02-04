<?php
    require_once 'view/header.html.php'
?>

    <div class="container">
        <div class="row">
            <div class="col-12">
               <p><strong>Prénom : </strong><?php echo $employer['prenom']; ?></p>
               <p><strong>Mot de passe : </strong><?php echo $employer['mot de passe']; ?></p>
            </div>
        </div>
    </div>

<?php
    require_once 'view/footer.html.php';