<?php include ("header.php");
//var_dump($traj); 
?>

<div class="container mt-5 rounded shadow-lg" style="min-height:518px">
  <h2>Search a Traject</h2>
  <p>The traject of your life :</p>  
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-bordered table-responsive-sm">
    <thead>
      <tr>
        <th>Debut</th>
        <th>Fin</th>
        <th>Date & Heure</th>
        <th>Places</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <?php
        foreach ($traj as $key => $value) {
       echo "<tr> 
       
        <td>".$traj[$key]['debut']."</td>
        <td>".$traj[$key]['fin']."</td>
        <td>".$traj[$key]['date']."</td>
        <td>".$traj[$key]['nb_places']."</td>
        </tr>";
       }
        // Remplacer pseudo par mail
     ?>
    </tbody>
  </table>
  
  <p>Note that we start the search in tbody, to prevent filtering the table headers.</p>
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