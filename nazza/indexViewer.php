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
                                    <th></th>
                                    <th>Debut</th>
                                    <th>Fin</th>
                                    <th>Date</th>
                                    <th>Heure</th>
                                    <th>Places</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  foreach ($traj as $key => $value) {
                                    list($date, $heure) = explode(" ", $traj[$key]['dateTrajet']);
                                    list($yyyy, $mm, $dd) = explode("-", $date); ?><tr id='indextr'> 
                                
                                <td><?php $verif = 0; 
                                if (isset($proposeId)) {foreach ($proposeId as $k => $v) {
                                if ($v["id_trajet_Propose"] == $value['id_trajet']) { $verif = 1; ?><button type='button' onClick="window.location = '?ctrl=trajet&mth=delTraj&id=<?php echo $value['id_trajet']?>'" class='btn btn-outline-danger'>X</button><?php } } } ?></td>
                                    <td class='clickable-row' data-href='?ctrl=Accueil&mth=trajet'><?php echo $value['debut']['nom_ville'] ?></td>
                                    <td class='clickable-row' data-href='?ctrl=Accueil&mth=trajet'><?php echo $value['fin']['nom_ville'] ?></td>
                                    <td class='clickable-row' data-href='?ctrl=Accueil&mth=trajet'><?php echo $dd."/".$mm."/".$yyyy ?></td>
                                    <td class='clickable-row' data-href='?ctrl=Accueil&mth=trajet'><?php echo $heure ?></td>
                                    <td class='clickable-row' data-href='?ctrl=Accueil&mth=trajet'><?php echo $value['nb_places'] ?></td>
                                    <td><?php $test = 0; 
                                    if (isset($passageId) && !empty($passageId)) {
                                        foreach ($passageId as $k1 => $v1) {
                                            if ($v1["id_trajet_est_passage"] == $value['id_trajet'] && $test==0) { 
                                                $test = 1; 
                                            }
                                        }
                                if ($test == 1){ ?>
                                    <button type='button' onClick="window.location = '?ctrl=trajet&mth=delTrajPassage&id=<?php echo $value['id_trajet']?>'" class='btn btn-outline-info'>Annuler</button>
                                <?php } else{ ?>
                                    <button type='button' onClick="window.location = '?ctrl=trajet&mth=est_passage&id=<?php echo $value['id_trajet']?>'" class='btn btn-outline-danger' <?php if ($verif == 1) {  echo 'disabled'; }?>>Rejoindre</button>
                                <?php }
                                } else if (!empty($_SESSION)) { ?>
                                    <button type='button' onClick="window.location = '?ctrl=trajet&mth=est_passage&id=<?php echo $value['id_trajet']?>'" class='btn btn-outline-danger' <?php if ($verif == 1) {  echo 'disabled'; }?> >Rejoindre</button>
                                    
                                <?php } } ?>
                                    </td>
                                    </tr>
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
<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>

<?php include ("footer.php"); ?>
