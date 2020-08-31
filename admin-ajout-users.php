<?php
try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=security;port=3308',
        'root',
        '',
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pseudo = $_POST['pseudo'];
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    // $mdp = $_POST['mdp'];

    $sth = $pdo->prepare("
            INSERT INTO users(pseudo,mdp)
            VALUES (:pseudo, :mdp)
        ");

    $sth->execute(array(
        ':pseudo' => $pseudo,
        ':mdp' => $mdp
    ));

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

header('location:index.html');
?>