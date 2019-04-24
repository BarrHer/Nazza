<?php include ("header.php");?>

<div class="container mt-5 py-4 rounded shadow-lg">
    <h3 class="text-center mb-5">Ajouter un nouveau trajet</h3>
    <form action="?ctrl=trajet&mth=add" method="post">
        <div class="form-group">
            <label for="inputAddress">Départ</label>
            <select id="inputAddress" name="inputAddress" class="form-control" onchange="verif(1);">
            <option value="0">--</option>
            <?php foreach ($villes as $key => $value) {
                echo '<option value="'.$value['id_ville'].'" onClick="addMarkerA('.$value['longitude'].','.$value['latitude'].')" >'.$value['nom_ville'].'</option>';
                } ?> 
            </select> 
        </div>
        <div class="form-group">
            <label for="inputAddress2">Arrivé</label>
            <select id="inputAddress2" name="inputAddress2" class="form-control" onchange="verif(2);">
                <option value="0">--</option>
                <?php foreach ($villes as $key => $value) {
                echo '<option value="'.$value['id_ville'].'" onClick="addMarkerB('.$value['longitude'].','.$value['latitude'].')" >'.$value['nom_ville'].'</option>';
                } ?>  
            </select> 
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="NbPlace">Nombres de passagers</label>
                <input id="NbPlace" name="NbPlace" type="number" class="form-control" min='1' max='7'>
            </div>
            <div class="form-group col-md-4">
                <label for="trajetHeure">Heure</label>
                <input id="trajetHeure" name="trajetHeure" type="time" step="1" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="trajetDate">Date</label>
                <input id="trajetDate" name="trajetDate" type="date" class="form-control">
            </div>
        </div>

        <input type="submit" name="submit" value="Créer" class="btn btn-primary">12
    </form>
</div>

<!-- function pour select option -->
<script src="js/verif.js"></script>


<!-- Map -->

<link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
<link rel="stylesheet" type="text/css" href="css/mapTraj.css">
<script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>

<div id="map" class="map container mt-3 "></div>

<script type="text/javascript"  src="js/map.js" ></script>
    

<?php include ("footer.php"); ?>