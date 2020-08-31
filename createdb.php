<?php
    $pdo = new PDO('mysql:host=localhost;port=3308','root',''); 
    $sql = "CREATE DATABASE IF NOT EXISTS `security` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
    $pdo->exec($sql);


    try{
        $pdo = new PDO('mysql:host=localhost;dbname=security;port=3308','root','',
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
        $sql = "CREATE TABLE IF NOT EXISTS `security`.`users` ( 
            `id` INT NOT NULL AUTO_INCREMENT , 
            `pseudo` VARCHAR(50) NOT NULL , 
            `mdp` VARCHAR(255) NOT NULL , 
            `dateCreation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
            
            PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    
        $pdo->exec($sql);

        $sql2 = "CREATE TABLE IF NOT EXISTS `security`.`message` ( 
            `id` INT NOT NULL AUTO_INCREMENT , 
            `author` VARCHAR(50) NOT NULL , 
            `message` VARCHAR(255) NOT NULL ,  
            `dateMessage` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
            PRIMARY KEY (`id`)) ENGINE = InnoDB;";
     
        $pdo->exec($sql2);
    
        echo 'Félicitations, la table users a bien été créée !';
    }
    
    catch (PDOException $e){
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
