<?php include ("header.php");?>

<div class="container mt-5 py-4 rounded shadow-lg">
    <form action="?ctrl=Adherant&mth=modification" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value=<?php echo $data['nom']?>>
            </div>
            <div class="form-group col-md-6">
                <label for="prenom">Prenom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom" value=<?php echo $data['prenom']?>>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="pseudo">Pseudo</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo" value=<?php echo $data['pseudo']?>>
            </div>
            <div class="form-group col-md-6">
                <label for="numtel">Numéro de Téléphone</label>
                <input type="text" class="form-control" id="numtel" name="numtel" placeholder="0692 12 34 56" pattern=".{10,10}" value=<?php echo $data['tel']?>>
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value=<?php echo $data['email']?>>
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
        <button type="submit" name="btnModification" class="btn btn-primary">Modifier</button>
    </form>
<!-- Ajouter un modal de confirmation de modification -->
</div>

<?php include ("footer.php"); ?>