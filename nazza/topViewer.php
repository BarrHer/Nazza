<?php include ("header.php"); ?>

<div class="container mt-5" style="width:1140;padding-right: 0px;padding-left: 0px;">

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4 border-0 rounded shadow-lg">
                <div class="card-body">
                    <div class="tab-content mt-2">
                        <div class="tab-pane fade show active text-center" id="tabone" role="tabpanel">
                        <h2>Top Trajets</h2>
                            <p>Trajets :</p>            
                            <table class="table table-responsive-sm">
                                <thead>
                                <tr>
                                    <th>Debut</th>
                                    <th>Fin</th>
                                    <th>Nombre de trajets</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  if (!empty($traj)) {
                                    foreach ($traj as $key => $value) {
                                ?>
                                <tr> 
                                
                                    <td><?php echo $value['debut']['nom_ville'] ?></td>
                                    <td><?php echo $value['fin']['nom_ville'] ?></td>
                                    <td><?php echo $value['nbTrajet'] ?></td>
                                </tr>
                                <?php } } ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include ("footer.php"); ?>
