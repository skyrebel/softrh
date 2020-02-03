<?php
    require_once 'view/header.html.php'
?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php

                    foreach( $login as $logins) {
                        ?>
                          <div>
                              <p><strong>Utilisateur : </strong><?php echo $login['Utilisateur']; ?></p>
                              <p><strong>Service : </strong><?php echo $login['mail']; ?></p>
                              <p><strong>Mot de passe : </strong><?php echo $login['mot de passe']; ?></p>
                              <p><a href="/login/detail/<?php echo $login['id'] ?>">Voir la fiche</a></p>
                          </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>

<?php
    require_once 'view/footer.html.php';