<?php
require_once '../Model/UserModel.php';

// Create an instance of the UserModel class
$userModel = new UserModel();

// Call the getAllUsers method to get the list of users
$users = $userModel->getAllUsers();

echo "<h1>Liste des utilisateurs</h1>";

echo "<ul>";
foreach ($users as $user) {
    echo "<li>{$user['nom']} - <a href='index.php?action=show&id={$user['id']}'>Détails</a></li>";
}
echo "</ul>";

// Assuming you want to display details for the first user (you might need to adjust this based on your requirements)
if (!empty($users)) {
    $userDetails = $userModel->getUserById($users[0]['id']);

    echo "<ul>";
    echo "<h1>Détails de l'utilisateur</h1>";
    echo "<p><strong>Nom d'utilisateur:</strong> {$userDetails['nom']}</p>";
    echo "<p><strong>Email:</strong> {$userDetails['email']}</p>";
    echo "</ul>";
}
?>
