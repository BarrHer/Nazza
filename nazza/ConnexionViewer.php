<?php include ("header.php"); ?>

<div class="container mt-5 py-4 rounded shadow-lg">
  <form action="?ctrl=Adherant&mth=connexion" method="post">
    <div class="form-group">
      <label for="pseudologin">Pseudo</label>
      <input type="text" class="form-control" name="pseudologin" id="login" placeholder="Pseudo">
    </div>
    <div class="form-group">
      <label for="mdplogin">Mot de passe</label>
      <input type="password" class="form-control" name="mdplogin" id="mdplogin" placeholder="Mot de passe">
    </div>
    <div class="text-center">
      <button type="submit" name="btnConnexion" class="btn btn-primary px-5">Connexion</button>
    </div>
  </form>

</div>

<?php include ("footer.php"); ?>