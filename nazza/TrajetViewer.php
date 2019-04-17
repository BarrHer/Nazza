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
        if (ville1 != 1){
        document.getElementById('inputAddress2').value = 1;
        }
        else {
            document.getElementById('inputAddress2').value = 0;
        }
    }
    else {
        if (ville2 != 1){
        document.getElementById('inputAddress').value = 1;
        }
        else {
            document.getElementById('inputAddress').value = 0;
        }
    }
    
}

</script>

<!-- Map -->


<link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
    <style>
      .map {
        height: 500px;
        width: 50%;
        padding-left:0px;
        padding-right:0px;
      }
    </style>

<script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>

<div id="map" class="map container mt-3 "></div>
    <script type="text/javascript">
    $Long = 55.536384;
    $Lat = -21.115141;
    
      var map = new ol.Map({
        target: 'map',
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM()
          })
        ],
        view: new ol.View({
          center: ol.proj.fromLonLat([$Long,$Lat]),
          zoom: 10
        })
      });
    

    function addMarkerA(LongA, LatA){
        var markerA = new ol.Feature({
            geometry: new ol.geom.Point(
                ol.proj.fromLonLat([LongA,LatA])
            ),
        });
        var vectorSourceA = new ol.source.Vector({
            features: [markerA]
        });
        var markerVectorLayerA = new ol.layer.Vector({
            source: vectorSourceA,
        });
        map.addLayer(markerVectorLayerA);

        markerA.setStyle(new ol.style.Style({
            image: new ol.style.Icon(({
                crossOrigin: 'anonymous',
                src: 'image/a.png',
                scale: 0.40
            }))
        }));
    }

    function addMarkerB(LongB, LatB){

        var markerB = new ol.Feature({
            geometry: new ol.geom.Point(
                ol.proj.fromLonLat([LongB, LatB])
            ),
        });

        var vectorSourceB = new ol.source.Vector({
            features: [markerB],
        });
        var markerVectorLayerB = new ol.layer.Vector({
            source: vectorSourceB,
        });
        
        map.addLayer(markerVectorLayerB);

        markerB.setStyle(new ol.style.Style({
            image: new ol.style.Icon(({
                crossOrigin: 'anonymous',
                src: 'image/b.png',
                
                scale: 0.40
            }))
        }));
    }

</script> 
<br><br><br><br>
<?php include ("footer.php"); ?>