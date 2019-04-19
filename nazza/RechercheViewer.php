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
    <?php  foreach ($traj as $key => $value) {
            list($date, $heure) = explode(" ", $traj[$key]['dateTrajet']);
            list($yyyy, $mm, $dd) = explode("-", $date); ?><tr id='indextr'> 
        
        <td><?php $verif = 0; 
        if (isset($proposeId)) {foreach ($proposeId as $k => $v) {
        if ($v["id_trajet_Propose"] == $value['id_trajet']) { $verif = 1; ?><button type='button' onClick="window.location = '?ctrl=trajet&mth=delTraj&id=<?php echo $value['id_trajet']?>&page=1'" class='btn btn-outline-danger'>X</button><?php } } } ?></td>
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
            <button type='button' onClick="window.location = '?ctrl=trajet&mth=delTrajPassage&id=<?php echo $value['id_trajet']?>&page=1'" class='btn btn-outline-info'>Annuler</button>
        <?php } else{ ?>
            <button type='button' onClick="window.location = '?ctrl=trajet&mth=est_passage&id=<?php echo $value['id_trajet']?>&page=1'" class='btn btn-outline-danger' <?php if ($verif == 1) {  echo 'disabled'; }?>>Rejoindre</button>
        <?php }
        } else if (!empty($_SESSION)) { ?>
            <button type='button' onClick="window.location = '?ctrl=trajet&mth=est_passage&id=<?php echo $value['id_trajet']?>&page=1'" class='btn btn-outline-danger' <?php if ($verif == 1) {  echo 'disabled'; }?> >Rejoindre</button>
            
        <?php } } ?>
    </tbody>
  </table>

</div>

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