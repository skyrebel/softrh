<?php
    require_once 'view/header.html.php'
?>

    <div class="container">
        <div class="row">
            <div class="col-12">
               <p><strong>Nom : </strong><?php echo $informatique['nom']; ?></p>
               <p><strong>Prénom : </strong><?php echo $informatique['prenom']; ?></p>
               <p><strong>Mail : </strong><?php echo $informatique['mail']; ?></p>
               <p><strong>Mot de passe : </strong><?php echo $informatique['mot de passe']; ?></p>
            </div>
        </div>
    </div>

<?php
    require_once 'view/footer.html.php';