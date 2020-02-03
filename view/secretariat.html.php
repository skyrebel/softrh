<?php
    require_once 'view/header.html.php'
?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php

                    foreach( $secretariat as $secretariats) {
                        ?>
                          <div>
                              <p><strong>Nom : </strong><?php echo $secretariat['nom']; ?></p>
                              <p><strong>Prénom : </strong><?php echo $secretariat['prénom']; ?></p>
                              <p><strong>Mail : </strong><?php echo $secretariat['mail']; ?></p>
                              <p><strong>Mot de passe : </strong><?php echo $secretariat['mot de passe']; ?></p>
                              <p><a href="/secretariat/detail/<?php echo $secretariat['id'] ?>">Voir la fiche</a></p>
                          </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>

<?php
    require_once 'view/footer.html.php';