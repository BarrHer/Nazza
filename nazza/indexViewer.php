<?php include ("header.php"); ?>

<div class="container mt-5" style="width:1140;padding-right: 0px;padding-left: 0px;">
<?php var_dump($adh[0]);
?>
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
                                <?php for ($i=0; $i<$adh[$i].length;$i++){
                                    echo "<tr> 
                                    <td> $value['nom'] </td> 
                                    <td> $value['prenom'] </td> 
                                    <td> $value['pseudo'] </td> 
                                    </tr>";
                                    $i++;
                                }
                                
                                ?>
                                <tr>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>john@example.com</td>
                                </tr>
                                <tr>
                                    <td>Mary</td>
                                    <td>Moe</td>
                                    <td>mary@example.com</td>
                                </tr>
                                <tr>
                                    <td>July</td>
                                    <td>Dooley</td>
                                    <td>july@example.com</td>
                                </tr>
                                <tr>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>john@example.com</td>
                                </tr>
                                <tr>
                                    <td>Mary</td>
                                    <td>Moe</td>
                                    <td>mary@example.com</td>
                                </tr>
                                <tr>
                                    <td>July</td>
                                    <td>Dooley</td>
                                    <td>july@example.com</td>
                                </tr>
                                <tr>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>john@example.com</td>
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
