<?php include ("header.php"); ?>

<div class="container mt-5" style="width:1140;padding-right: 0px;padding-left: 0px;">

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4 border-0 rounded shadow-lg">
                <div class="card-body">
                    <div class="tab-content mt-2">
                        <div class="tab-pane fade show active text-center" id="tabone" role="tabpanel">
                        <h2>Derniers Trajets</h2>
                            <p>Trajets :</p>            
                            <table class="table table-responsive-sm">
                                <thead>
                                <tr>
                                    <th>Debut</th>
                                    <th>Fin</th>
                                    <th>Date</th>
                                    <th>Heure</th>
                                    <th>Places</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  foreach ($traj as $key => $value) {
                                    list($date, $heure) = explode(" ", $traj[$key]['dateTrajet']);
                                    list($yyyy, $mm, $dd) = explode("-", $date);
                                    echo "<tr> 
                                 
                                  <td>".$value['debut']['nom_ville']."</td>
                                  <td>".$value['fin']['nom_ville']."</td>
                                  <td>".$dd."/".$mm."/".$yyyy."</td>
                                  <td>".$heure."</td>
                                  <td>".$value['nb_places']."</td>
                                  </tr>";
                                }
                                // Remplacer pseudo par mail
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-4 card border-0 shadow-lg" style="height:95.5%">
                <div class="card-body">
                    <div class="tab-content mt-2">
                        <div class="tab-pane fade show active text-center" id="tabBackgroundOne" role="tabpanel">
                            <p>Site de covoiturage blablabla </p>
                            <button type="button" OnClick="window.location='?ctrl=Accueil&mth=trajet'" class="btn btn-outline-danger pt-2">Ajouter un trajet</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ("footer.php"); ?>