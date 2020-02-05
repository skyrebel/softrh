<?php



function getlogin($nom, $pwd){
    global $pdo;
    $sql = 'SELECT id, utilisateur, service, password, from utilisateur where Nom= :Nom and password= :pwd';
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':Nom', $nom, PDO::PARAM_STR);
    $sth->bindParam(':Mot-de-passe', $pwd, PDO::PARAM_STR);
    $sth->execute();
    return $sth->fetch(PDO::FETCH_ASSOC);
}