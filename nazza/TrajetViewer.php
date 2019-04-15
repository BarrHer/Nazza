<?php include ("header.php");?>
z
<div class="container mt-5 py-4 rounded shadow-lg">
    <h3 class="text-center mb-5">Ajouter un nouveau trajet</h3>
    <form action="?ctrl=trajet&mth=add" method="post">
        <div class="form-group">
            <label for="inputAddress">Départ</label>
            <select id="inputAddress" name="inputAddress" class="form-control" onchange="verif(1);">
            <option value="0">--</option>
            <?php foreach ($villes as $key => $value) {
                echo '<option value="'.$value['id_ville'].'">'.$value['nom_ville'].'</option>';
            } ?>  
            </select> 
        </div>
        <div class="form-group">
            <label for="inputAddress2">Arrivé</label>
            <select id="inputAddress2" name="inputAddress2" class="form-control" onchange="verif(2);">
                <option value="0">--</option>
                <?php foreach ($villes as $key => $value) {
                echo '<option value="'.$value['id_ville'].'">'.$value['nom_ville'].'</option>';
            } ?>  
            </select> 
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="NbPlace">Nombres de passagers</label>
                <input id="NbPlace" name="NbPlace" type="text" class="form-control">
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

        <input type="submit" name="submit" value="Créer" class="btn btn-primary">
    </form>
</div>

<script>
var ladate=new Date();
var date = ladate.toISOString().split('T')[0];
var heure = ladate.toTimeString().split(' ')[0];
//document.getElementById('trajetHeure').value = heure;
//$("#trajetDate").val(date);
$("#trajetHeure").val(heure);
$(document).ready(function() {
    $("#trajetDate").attr({
       "min" : date,
       "value" : date
    });
});

function verif(input){
    var ville1 = document.getElementById('inputAddress').value;
    var ville2 = document.getElementById('inputAddress2').value;
    if (input == 1){
        if (ville1 != 0){
        ville1 = document.getElementById('inputAddress');
        document.getElementById('inputAddress2').value = 1;
        }
        else {
            document.getElementById('inputAddress2').value = 0;
        }
    }
    else {
        if (ville2 != 0){
        ville2 = document.getElementById('inputAddress2');
        document.getElementById('inputAddress').value = 1;
        }
        else {
            document.getElementById('inputAddress').value = 0;
        }
    }
    
}



</script>

<?php include ("footer.php"); ?>