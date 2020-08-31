
<!-- ----- FORMULAIRE D'AJOUT DE NOUVEAUX UTILISATEURS ----- -->

<h1>Ajouter un utilisateur :</h1>

<form action="admin-ajout-users.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="case col-md-6">
            <label for="name" class="case-pseudo">Pseudo :</label>
            <input type="text" name="pseudo" class="champs champs-pseudo" required />
        </div>
        <div class="case col-md-6">
            <label for="motdepasse" class="case-motdepasse">Mot de passe :</label>
            <input type="password" name="mdp" class="champs champs-motdepasse" required />
            <label for="motdepasse" class="case-motdepasse"></label>
        </div>
    </div>

    <div class="row bouton-ajouter-utilisateur">
        <input class="inputSubmit" type="submit" value="Ajouter" />
    </div>
</form>

