<?php



function getlogin($nom, $pwd){
    global $pdo;
    $sql = 'SELECT id, utilisateur, service, humeur, has-voted from utilisateur where nom= :nom and password= :pwd';
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':nom', $nom, PDO::PARAM_STR);
    $sth->bindParam(':password', $pwd, PDO::PARAM_STR);
    $sth->execute();
    return $sth->fetch(PDO::FETCH_ASSOC);
}