<?php
    require_once 'view/header.html.php'
?>

    <div class="container">
        <div class="row">
            <div class="col-12">
               <p><strong>Utilisateur : </strong><?php echo $login['Utilisateur']; ?></p>
               <p><strong>Service : </strong><?php echo $login['Service']; ?></p>
               <p><strong>Mot de passe : </strong><?php echo $login['mot de passe']; ?></p>
            </div>
        </div>
    </div>

<?php
    require_once 'view/footer.html.php';