<?php
session_start();
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=security;port=3308','root','',
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
        //2- On récupère les données du formulaire

        $pseudo = $_SESSION['pseudo'];
        $message = $_POST['message'];
        var_dump($message);
    
    
     
       //$sth appartient à la classe PDOStatement
        $sth = $pdo->prepare("
            INSERT INTO Message(author,message)
            VALUES (:author, :message)
        ");
        
        $sth->execute(array(
                            ':author' => $pseudo,
                            ':message' => $message));
     
    }
         
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }
    
    //6- On redirige vers la page index.php après l'exécution du script
    header('location:chat.php');
?>