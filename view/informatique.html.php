<?php
    require_once 'view/header.html.php'
?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php

                    foreach( $informatique as $informatiques) {
                        ?>
                          <div>
                              <p><strong>Nom : </strong><?php echo $informatique['nom']; ?></p>
                              <p><strong>Prénom : </strong><?php echo $informatique['prénom']; ?></p>
                              <p><strong>Mail : </strong><?php echo $informatique['mail']; ?></p>
                              <p><strong>Mot de passe : </strong><?php echo $informatique['mot de passe']; ?></p>
                              <p><a href="/informatique/detail/<?php echo $informatique['id'] ?>">Voir la fiche</a></p>
                          </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>

<?php
    require_once 'view/footer.html.php';