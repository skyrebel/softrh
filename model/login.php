<?php



function getlogin($email, $pwd){
    global $pdo;
    $sql = 'SELECT id from utilisateur where email= :email and password = password(:pwd)';
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':email', $email, PDO::PARAM_STR);
    $sth->bindParam(':pwd', $pwd, PDO::PARAM_STR);
    $sth->execute();
    return $sth->fetch(PDO::FETCH_ASSOC);
}