<?php
include("../navigation.php");

//if (!isset($_SESSION['loggedIn']) || $_SESSION['admin']==1 ||$_SESSION['trainer']==1  ) {
 //   die;
 //   }

if (!isset($_SESSION['loggedIn'])  ) {
    header("location: ../forms/login.php");  
    exit;
    }
?>

<div class="container-fluid custom-margin-container">    
    <h2 class="custom-txt-center custom-margin-bottom-4">TERVETULOA ASIAKKAAN SIVULLE</h2>  

    <!--Row starts-->
    <div class="row mt-5"> 
        <div class="col-sm-2">
        </div>

        <div class="col-sm-8">  
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">                
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="text-success">
                            <h6 class="my-0"><script>showToday();</script></h6>
                            <small>VIIKKO <?php echo date("W");?></small>
                        </div>                   
                        </li>

                        <li class="list-group-item d-flex justify-content-between lh-condensed">                       
                        <div>
                            <h6 class="my-0 text-secondary">ASIAKAS: <span id="user_name" style="color:black;"></span></h6>
                        </div>                                                         
                        </li>

                        <li class="list-group-item d-flex justify-content-between lh-condensed">                       
                        <div>
                            <h6 class="my-0"><a href="client_page.php" class="text-danger">Minun aikatauluni</a></h6>
                            <small class="text-muted">Tarkista aikataulusi valitsemasi ajanjaksolla</small>
                        </div>                                                         
                        </li>

                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0"><a href="reservation.php" class="text-danger">Varaa aika</a></h6>
                            <small class="text-muted">Varaa ajka ohjaajalle tai ryhmäharjoitteluun</small>
                        </div>                    
                        </li>

                                           
                    </ul>               
                </div>
                
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-4 text-success">AJAN VARAUS OHJAAJALLE TAI RYHMÄHARJOITTELUUN</h4>
                    <form>
                        <!--Row starts-->
                        <div class="row">
                            <form class="form-inline justify-content-center mt-4"  method="get">
                            
                                <div class="form-group justify-content-center col-md-6 mb-4">
                                    <label class="mr-4">Alkaen</label>
                                    <input type="date" class="form-control mr-5" name="date_from" id="date_from">                   
                                </div>  
                            
                            
                                <div class="form-group justify-content-center col-md-6 mb-4">
                                    <label class="mr-4">Saakka</label>
                                    <input type="date" class="form-control mr-5" name="date_to" id="date_to">
                                </div>

                                <div class="form-group justify-content-center col-md-6 mb-4">
                                    <label class="mr-4">Liikuntalaji</label>
                                    <!--php starts-->
                                    <?php
                                    $titles = [];
                                    $query = "SELECT title,id FROM workout_titles ORDER BY title";
                                    $result = $connect->query($query);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $titles[$row['id']] = $row["title"];
                                        }
                                    }
                                    ?>
                                    <!--php ends-->

                                    <!--options start-->
                                    <select id="title" class=form-control name="title" value="<?php echo (isset($_GET['title'])) ? $_GET['title'] : "" ?>">
                                    <option value="">kaikki liikuntalajit</option>
                                    <?php
                                    foreach ($titles as $id => $title) {
                                    echo "<option value=\"$id\">$title</option>";
                                    }
                                    ?>
                                    </select>  
                                    <!--options end-->                                                   
                                </div>  
                            
                            
                                <div class="form-group justify-content-center col-md-6 mb-4">
                                    <label class="mr-4">Ohjaaja</label>
                                    <!--php starts-->
                                    <?php
                                    $titles = [];
                                    $query = "SELECT `name`,id FROM users WHERE trainer='1' ORDER BY `name`";
                                    $result = $connect->query($query);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $trainers[$row['id']] = $row["name"];
                                        }
                                    }
                                    ?>
                                    <!--php ends-->

                                    <!--options start-->
                                    <select id="trainer" class=form-control name="trainer" >
                                    <option value="">kaikki ohjaajat</option>
                                    <?php
                                    foreach ($trainers as $id => $trainer) {
                                        echo "<option value=\"$id\">$trainer</option>";
                                    }
                                    ?>
                                    </select>
                                    <!--options end-->
                                </div>
                            
                                <div class="form-group justify-content-center col-md-12 mb-4">
                                    <button type="submit" class="btn btn-danger btn-block mt-0" name="submit" id="find_available">Selaa aikatauluja</button>                                                           
                                </div>
                            
                            </form>
                        </div>
                        <!--Row ends-->
                    </form>               
                    <p></p>
                </div>
            </div>            
        </div>

        <div class="col-sm-2">
        </div>
    </div>
    <!--Row ends-->

    <!--Row starts-->
    <div class="row">
        <div class="col-sm-12">
            <!--Table starts-->
                <div class="mb-3">
                    <div class="container">       
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead id="head_table">
                                    <!--<tr>
                                        <th scope="col">Päivämäärä</th>
                                        <th scope="col">Ajankohta</th>
                                        <th scope="col">Liikuntalaji</th>
                                        <th scope="col">Ohjaaja</th>
                                        <th scope="col">Vapaat paikat</th>
                                        <th scope="col">Ajan varaus</th>                        
                                    </tr>-->
                                </thead>

                                <tbody id="workouts_available">
                                <tbody>
                            </table>           
                        </div>
                    </div>
                </div>
            <!--Table ends-->            
        </div>
    </div>
    <!--Row ends-->

    <div class="custom-space">
        <p></p>
    </div> 

</div>

<script type="text/javascript" src="workouts_available.js"></script>
<script type="text/javascript" src="make_reservation.js"></script>
<script type="text/javascript" src="../forms/user_name.js"></script>
<?php
include("../footer.php");
?>