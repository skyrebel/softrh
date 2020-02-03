<?php
    require_once 'view/header.html.php'
?>

    <div class="container">
        <div class="row">
            <div class="col-12">
               <p><strong>Nom : </strong><?php echo $production['nom']; ?></p>
               <p><strong>Prénom : </strong><?php echo $production['prenom']; ?></p>
               <p><strong>Mail : </strong><?php echo $production['mail']; ?></p>
               <p><strong>Mot de passe : </strong><?php echo $production['mot de passe']; ?></p>
            </div>
        </div>
    </div>

<?php
    require_once 'view/footer.html.php';