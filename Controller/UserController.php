<?php

// Cette méthode permet de récupérer tous les utilisateurs
class UserController
{
    public function index()
    {
        // Afficher la liste de tous les utilisateurs
        $userModel = new UserModel();
        $users = $userModel->getAllUsers();
        $userView = new UserView();
        $userView->showAllUsers($users);

    }

    public function show($userId)
    {
        // Afficher les détails d'un utilisateur spécifique
        $userModel = new UserModel();
        $user = $userModel->getUserById($userId);
        // Ajoutez ici la logique pour afficher les détails de l'utilisateur dans la vue
    }

    // mofiier un utilisateur
    public function update($userId)
    {
        // Afficher les détails d'un utilisateur spécifique
        $userModel = new UserModel();
        $user = $userModel->getUserById($userId);
        // Ajoutez ici la logique pour afficher les détails de l'utilisateur dans la vue
    }

}
 

