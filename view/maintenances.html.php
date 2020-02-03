<?php
    require_once 'view/header.html.php'
?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php

                    foreach( $maintenance as $maintenances) {
                        ?>
                          <div>
                              <p><strong>Nom : </strong><?php echo $maintenance['nom']; ?></p>
                              <p><strong>Prénom : </strong><?php echo $maintenance['prénom']; ?></p>
                              <p><strong>Mail : </strong><?php echo $maintenance['mail']; ?></p>
                              <p><strong>Mot de passe : </strong><?php echo $maintenance['mot de passe']; ?></p>
                              <p><a href="/maintenance/detail/<?php echo $maintenance['id'] ?>">Voir la fiche</a></p>
                          </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>

<?php
    require_once 'view/footer.html.php';