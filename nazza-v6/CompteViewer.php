<?php include ("header.php"); ?>

<div class="container mt-5 py-4 rounded shadow-lg">
    <div class="text-center px-5">
    <?php if (isset($_SESSION) && !empty($_SESSION)) { ?>
        <button type="submit" class="btn btn-primary mb-3 btn-block" onClick="window.location = '?ctrl=Adherant&mth=deconnexion'" >Deconnexion</button>
        <br>
        <button type="submit" class="btn btn-primary mb-3 btn-block" onClick="window.location = '?ctrl=Adherant&mth=modification'" >Modification</button>
    <?php } else { ?>
        <button type="submit" class="btn btn-primary mb-3 btn-block" onClick="window.location = '?ctrl=Adherant&mth=connexion'" >Se connecter</button>
        <br>
        <button type="submit" class="btn btn-primary btn-block" onClick="window.location = '?ctrl=Adherant&mth=inscription'">Créer un compte</button>
        <?php } ?>
    </div>

</div>

<?php include ("footer.php"); ?>