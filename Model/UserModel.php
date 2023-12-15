<?php
require_once 'ConnexionParam.php';
class UserModel
{
    
    // Fonctions CRUD pour l'utilisateur GET

    public function getAllUsers()
    {
        static $dbb = null;
        
        try {
            if ($dbb == null) {
                $connection = ConnectionParam::EDB_DBTYPE.':host='.ConnectionParam::EDB_HOST.';dbname='.ConnectionParam::EDB_DBNAME.';charset=utf8';
                $dbb = new PDO($connection, ConnectionParam::EDB_USER, ConnectionParam::EDB_PASS);
                $dbb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }

            $stmt = $dbb->prepare("SELECT * FROM utilisateur");
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Erreur : '.$e->getMessage());
        }
    }


    public function getUserById($userId)
    {
        static $dbb = null;

        try {
            if ($dbb == null) {
                $connection = ConnectionParam::EDB_DBTYPE.':host='.ConnectionParam::EDB_HOST.';dbname='.ConnectionParam::EDB_DBNAME.';charset=utf8';
                $dbb = new PDO($connection, ConnectionParam::EDB_USER, ConnectionParam::EDB_PASS);
                $dbb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }

            $stmt = $dbb->prepare("SELECT * FROM utilisateur WHERE id = :id");
            $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Erreur : '.$e->getMessage());
        }
    }



    // Fonctions UPDATE pour l'utilisateur
    public function updateUser($userId, $nom, $prenom, $email)
    {
        static $dbb = null;

        try {
            if ($dbb == null) {
                $connection = ConnectionParam::EDB_DBTYPE.':host='.ConnectionParam::EDB_HOST.';dbname='.ConnectionParam::EDB_DBNAME.';charset=utf8';
                $dbb = new PDO($connection, ConnectionParam::EDB_USER, ConnectionParam::EDB_PASS);
                $dbb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }

            $stmt = $dbb->prepare("UPDATE utilisateur SET nom = :nom, prenom = :prenom, email = :email WHERE id = :id");
            $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
            $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            die('Erreur : '.$e->getMessage());
        }
    }
}