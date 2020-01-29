<?php
    require_once 'view/header.html.php'
?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php

                    foreach( $production as $productions) {
                        ?>
                          <div>
                              <p><strong>Nom : </strong><?php echo $production['nom']; ?></p>
                              <p><strong>Prénom : </strong><?php echo $production['prénom']; ?></p>
                              <p><strong>Mail : </strong><?php echo $production['mail']; ?></p>
                              <p><strong>Mot de passe : </strong><?php echo $production['mot de passe']; ?></p>
                              <p><a href="/production/detail/<?php echo $production['id'] ?>">Voir la fiche</a></p>
                          </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>

<?php
    require_once 'view/footer.html.php';