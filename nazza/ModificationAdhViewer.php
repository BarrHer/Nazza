<?php include ("header.php"); ?>

<div class="container mt-5 py-4 rounded shadow-lg">
    <form action="?ctrl=Adherant&mth=modification" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
            </div>
            <div class="form-group col-md-6">
                <label for="prenom">Prenom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom">
            </div>
        </div>
        <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="mdp">Mot de passe</label>
                <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe">
            </div>
            <div class="form-group col-md-6">
                <label for="cmdp">Confirmation mot de passe</label>
                <input type="password" class="form-control" id="cmdp" name="cmdp" placeholder="Mot de passe">
            </div>
            </div>
        <button type="submit" name="btnModification" class="btn btn-primary">S'inscrire</button>
    </form>
<!-- Ajouter un modal de confirmation de modification -->
</div>

<?php include ("footer.php"); ?>