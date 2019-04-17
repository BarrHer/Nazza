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
            
            <?php foreach($vill as $key => $value){ ?>
                <option onClick="addMarkerA(<?php echo $value['longitude'].",".$value['latitude'];  ?>)"  value="$value['id_ville']"><?php echo $value['nom_ville']; ?></option></a> 
            <?php } ?>

            </select> 
        </div>
        <div class="form-group">
            <label for="inputAddress2">Arrivé</label>
            <!--<input type="text" class="form-control" id="inputAddress2" placeholder="">-->
            <select id="inputAddress2" name="inputAddress2" class="form-control" id="inputAddress2">
               <option value="0">--</option>

               <?php foreach($vill as $key => $value){ ?>
                    <option onClick="addMarkerB(<?php echo $value['longitude'].",".$value['latitude'];  ?>)" value="$vill[$key]['id_ville']"><?php echo $vill[$key]['nom_ville']; ?></option> 
                <?php } ?>

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
        
        <input type="submit" name="submit" value="Créer" class="btn btn-primary">8
        <!-- <input style="margin-left:80%" type="submit" id="apercu" name="submit" value="Voir trajet" class="btn btn-primary"> -->
    </form>
</div>

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
            var route = new ol.Feature();
            var coordinates = [[55.624038, -21.373731], [55.471843,-21.332838]];
            var geometry = new ol.geom.LineString(coordinates);
            geometry.transform('EPSG:4326', 'EPSG:3857'); //Transform to your map projection
            route.setGeometry(geometry);

            vectorLayer.getSource().addFeature(route);

    </script> 
    
<br><br><br><br>
<?php include ("footer.php"); ?>