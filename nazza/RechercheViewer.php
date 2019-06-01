<?php include ("header.php"); ?>

<div class="container mt-5 rounded shadow-lg" style="min-height:518px">
  <h2>Rechercher un trajet</h2>
  <input class="form-control" id="myInput" type="text" placeholder="Ex : Le Tampon..">
  <br>
  <table class="table table-responsive-sm text-center">
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
    <tbody id="myTable">
    <?php  if (!empty($traj)) {
    foreach ($traj as $key => $value) {
        list($date, $heure) = explode(" ", $value['dateTrajet']);
        list($yyyy, $mm, $dd) = explode("-", $date);?>
    <tr id='indextr'> 
    
    <td><?php $verif = 0; 
    if (isset($proposeId)) {foreach ($proposeId as $k => $v) {
    if ($v["id_trajet_Propose"] == $value['id_trajet']) { $verif = 1; ?><button type='button' onClick="window.location = '?ctrl=trajet&mth=delTraj&id=<?php echo $value['id_trajet']?>&page=1'" class='btn btn-outline-danger'>X</button><?php } } } ?></td>
        <td class='clickable-row' data-id="<?php echo $value['id_trajet'] ?>"><?php echo $value['debut']['nom_ville'] ?></td>
        <td class='clickable-row' data-id="<?php echo $value['id_trajet'] ?>"><?php echo $value['fin']['nom_ville'] ?></td>
        <td class='clickable-row' data-id="<?php echo $value['id_trajet'] ?>"><?php echo $dd."/".$mm."/".$yyyy ?></td>
        <td class='clickable-row' data-id="<?php echo $value['id_trajet'] ?>"><?php echo $heure ?></td>
        <td class='clickable-row' data-id="<?php echo $value['id_trajet'] ?>"><?php echo $value['nb_places'] ?></td>
        <td><?php $test = 0; 
        if (isset($passageId) && !empty($passageId)) {
            foreach ($passageId as $k1 => $v1) {
                if ($v1["id_trajet_est_passage"] == $value['id_trajet'] && $test==0) { 
                    $test = 1; 
                }
            }
    if ($test == 1){ ?>
        <button type='button' onClick="window.location = '?ctrl=trajet&mth=delTrajPassage&id=<?php echo $value['id_trajet']?>&page=1'" class='btn btn-outline-info'>Annuler</button>
    <?php } else if ($value['PlacesRestantes']['PlacesRestantes'] <= 0){ ?>
        <button type='button' class='btn btn-outline-secondary' disabled>Plein</button>
    <?php } else{ ?>
        <button type='button' onClick="window.location = '?ctrl=trajet&mth=est_passage&id=<?php echo $value['id_trajet']?>&page=1'" class='btn btn-outline-danger' <?php if ($verif == 1) {  echo 'disabled'; }?>>Rejoindre</button>
    <?php }
    } else if (!empty($_SESSION)) {
        if ($value['PlacesRestantes']['PlacesRestantes'] <= 0){ ?>
            <button type='button' class='btn btn-outline-secondary' disabled>Plein</button>
        <?php } else {  ?>
        <button type='button' onClick="window.location = '?ctrl=trajet&mth=est_passage&id=<?php echo $value['id_trajet']?>&page=1'" class='btn btn-outline-danger' <?php if ($verif == 1) {  echo 'disabled'; }?> >Rejoindre</button>
        
    <?php } } } } else {
        echo 'Pas de trajet disponible.';
    }?>
        </td>
        </tr>
    </tbody>
</table>

  <div class="modal fade" id="myModal"> 
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td>Proposé par :</td>
                    <td><?php echo $proposePar['pseudo'];?></td>
                </tr>
                <tr>
                    <td>Contact :</td>
                    <td><?php echo $proposePar['tel'];?><br>
                    <?php echo $proposePar['email'];?></td>
                </tr>
                <tr>
                    <td>Départ :</td>
                    <td><?php echo $villeDepart['nom_ville'];?></td>
                </tr>
                <tr>
                    <td>Arrivé :</td>
                    <td><?php echo $villeArrive['nom_ville'];?></td>
                </tr>
                <tr>
                    <td>Date :</td>
                    <td><?php list($date, $heure) = explode(" ", $infoTrajet['dateTrajet']);
                    list($yyyy, $mm, $dd) = explode("-", $date);  
                    echo $dd."/".$mm."/".$yyyy;?></td>
                </tr>
                <tr>
                    <td>Heure :</td>
                    <td><?php echo $heure;?></td>
                </tr>
                <tr>
                    <td>Nombre de places :</td>
                    <td><?php echo $infoTrajet['nb_places'];?></td>
                </tr>
                <tr>
                    <td>Nombre de places restantes :</td>
                    <td><?php echo $PlacesRestantes['PlacesRestantes'];?></td>
                </tr>
            </tbody>
        </table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <?php
            if (!empty($_SESSION)) {
                $test=0;
                if (isset($passageId) && !empty($passageId)) {
                    foreach ($passageId as $k1 => $v1) {
                        if ($v1["id_trajet_est_passage"] == $_GET['idTrajet'] && $test==0) { 
                            $test = 1; 
                        }
                    }
                if ($test == 1){ ?>
                    <button type='button' onClick="window.location = '?ctrl=trajet&mth=delTrajPassage&id=<?php echo $_GET['idTrajet']?>&page=1'" class='btn btn-outline-info'>Annuler</button>
                <?php }

                else if ($PlacesRestantes['PlacesRestantes'] <= 0){ ?>
                    <button type='button' class='btn btn-outline-secondary' disabled>Plein</button>
                <?php } else {
                    if (isset($proposeId)) {$verif2=0;
                        foreach ($proposeId as $k => $v) {
                            if ($v['id_trajet_Propose'] == $_GET['idTrajet']) {  $verif2=1; } ?>
            <?php } ?>
            <button type='button' onClick="window.location = '?ctrl=trajet&mth=est_passage&id=<?php echo $_GET['idTrajet']?>&page=1'" class='btn btn-outline-danger' <?php if ($verif2 == 1) {  echo 'disabled'; }?>>Rejoindre</button>
            <?php } } } }?>
            <button type="button" class="btn btn-danger" data-dismiss="modal" onClick="window.location = '?ctrl=Accueil&mth=recherche'">Close</button>
        </div>
        
        </div>
        </div>
    </div>
</div>

<?php if (!empty($_GET['idTrajet'])){ ?>
    <script>
    $("#myModal").modal();
    </script>
    
    <?php } ?>

<!--Script pour ouvrir le modal-->
<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        var id = $(this).data("id");
        //var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?idTrajet=' + id;
        window.location='?ctrl=Accueil&mth=recherche&idTrajet=' + id;
        //console.log($(this).data("id"));
        //window.history.pushState({ path: newurl }, '', newurl);
        $("#myModal").modal();
    });
});
</script>

<!--script pour la recherche-->
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<?php include ("footer.php"); ?>