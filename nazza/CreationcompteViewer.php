<?php include ("header.php"); ?>
<script src="https://www.google.com/recaptcha/api.js?render=6LddXZ0UAAAAAOIXqmuC2Mb0kGivSXjD8yElgPhf"></script>
<script>

function subm() {
    grecaptcha.ready(function() {
        grecaptcha.execute('6LddXZ0UAAAAAOIXqmuC2Mb0kGivSXjD8yElgPhf', {action: 'homepage'})
        .then(function(token) {
            // Verify the token on the server.
            console.log(token)
            document.getElementById('captcha').value = token;
            console.log("dd");
            document.getElementById("formInscription").submit(); 
        });
    });     
}
</script>
<div class="container mt-5 py-4 rounded shadow-lg">
    <form action="?ctrl=Adherant&mth=inscription" method="post" id="formInscription">
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
            <input type="hidden" name="token" value="" id="captcha">
            <input type="hidden" name="btnInscription" value="1">
        <button type="button" name="a" class="btn btn-primary" onclick="subm()">S'inscrire</button>
    </form><?php if (isset($msg)) { echo $msg;} ?>
<!-- Ajouter un modal de confirmation d'inscription -->
</div>

<?php include ("footer.php"); ?>