<?php include ("header.php"); ?>

<div class="container mt-5 rounded shadow-lg" style="min-height:518px">
  <h2>Filterable Table</h2>
  <p>Type something in the input field to search the table for first names, last names or emails:</p>  
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-bordered table-responsive-sm">
    <thead>
      <tr>
        <th>Debut</th>
        <th>Fin</th>
        <th>Date</th>
        <th>Heure</th>
        <th>Places</th>
        <th></th>
      </tr>
    </thead>
    <tbody id="myTable">
      <?php
      
        foreach ($traj as $key => $value) {
          list($date, $heure) = explode(" ", $traj[$key]['dateTrajet']);
          list($yyyy, $mm, $dd) = explode("-", $date);
       echo "<tr> 
       
        <td>".$value['debut']['nom_ville']."</td>
        <td>".$value['fin']['nom_ville']."</td>
        <td>".$dd."/".$mm."/".$yyyy."</td>
        <td>".$heure."</td>
        <td>".$value['nb_places']."</td>
        <td class='text-center'><button type='button' class='btn btn-outline-danger'>Rejoindre</button></td>
        </tr>";
       }

     ?>
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