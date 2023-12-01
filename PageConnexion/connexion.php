<?php

/**
 * Fichier : 
 * Auteur : 
 * Description : Constantes de connexion à la base
 */

/*
 * @brief Connection constants
 */
class ConnectionParam
{
    const EDB_DBTYPE = "mysql";
    const EDB_DBNAME = "dbname";
    const EDB_HOST = "localhost";
    const EDB_PORT = "3306";
    const EDB_USER = "dbuser";
    const EDB_PASS = "SuperPWD";
}


// Inclure la classe ConnectionParam
//include 'page.html';

// Récupération des données du formulaire
$username = $_POST['username'];
$password = $_POST['password'];

// Connexion à la base de données en utilisant les constantes de la classe
try {
    $db = new PDO(
        ConnectionParam::EDB_DBTYPE . ":host=" . ConnectionParam::EDB_HOST . ";port=" . ConnectionParam::EDB_PORT . ";dbname=" . ConnectionParam::EDB_DBNAME,
        ConnectionParam::EDB_USER,
        ConnectionParam::EDB_PASS
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Requête SQL pour vérifier les informations d'identification
$query = "SELECT * FROM utilisateurs WHERE nom_utilisateur = :username AND mot_de_passe = :password";
$stmt = $db->prepare($query);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);
$stmt->execute();

// Vérification des informations d'identification
if ($stmt->rowCount() > 0) {
    // Utilisateur authentifié, rediriger vers la page d'accueil par exemple
    header("Location: page.html");
} else {
    // Mauvaises informations d'identification, rediriger vers la page de connexion avec un message d'erreur
    header("Location: login.php?error=1");
}

// Fermer la connexion à la base de données
$db = null;
?>
