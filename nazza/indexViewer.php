<?php include ("header.php"); ?>

<div class="container mt-5" style="width:1140;padding-right: 0px;padding-left: 0px;">

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4 border-0 rounded shadow-lg">
                <div class="card-body">
                    <div class="tab-content mt-2">
                        <div class="tab-pane fade show active text-center" id="tabone" role="tabpanel">
                            <h2>Basic Table</h2>
                            <p>The .table class adds basic styling (light padding and horizontal dividers) to a table:</p>            
                            <table class="table table-responsive-sm">
                                <thead>
                                <tr>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($adh as $key => $value) {
                                    echo "<tr> 
                                    <td>".$adh[$key]['prenom']."</td>
                                    <td>".$adh[$key]['nom']."</td>
                                    <td>".$adh[$key]['pseudo']."</td>
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
                            <p>Bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla</p>
                            <button type="button" class="btn btn-outline-danger pt-2">Danger</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ("footer.php"); ?>
