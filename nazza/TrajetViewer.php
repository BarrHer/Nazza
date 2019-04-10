<?php include ("header.php"); ?>

<div class="container mt-5 py-4 rounded shadow-lg">
    <h3 class="text-center mb-5">Ajouter un nouveau trajet</h3>
    <form action="?ctrl=trajet&mth=add" method="post">
        <!--<div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
            </div>
        </div>-->
        <div class="form-group">
            <label for="inputAddress">Départ</label>
            <select id="inputAddress" name="inputAddress" class="form-control" id="inputAddress">
                <option value="0">--</option>
                <option value="1">Saint-Joseph</option>
                <option value="2">Saint-Pierre</option>
            </select> 
        </div>
        <div class="form-group">
            <label for="inputAddress2">Arrivé</label>
            <!--<input type="text" class="form-control" id="inputAddress2" placeholder="">-->
            <select id="inputAddress2" name="inputAddress2" class="form-control" id="inputAddress2">
                <option value="0">--</option>
                <option value="1">Saint-Joseph</option>
                <option value="2">Saint-Pierre</option>
            </select> 
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="NbPlace">Nombres de passagers</label>
                <input id="NbPlace" name="NbPlace" type="text" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-4">
                <label for="trajetHeure">Heure</label>
                <input id="trajetHeure" name="trajetHeure" type="time" value="00:00:00" step="1" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="trajetDate">Date</label>
                <input id="trajetDate" name="trajetDate" type="date" value="1980-08-26" class="form-control">
            </div>
        </div>
        <!--<div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
            </div>
        </div>-->
        
        <input type="submit" name="submit" value="Créer" class="btn btn-primary">54
    </form>
</div>

<?php include ("footer.php"); ?>