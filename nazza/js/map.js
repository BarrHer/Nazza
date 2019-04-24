
        $Long = 55.536384;
        $Lat = -21.115141;
        
        var map = new ol.Map({
            renderer: 'canvas',
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
