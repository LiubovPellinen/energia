<?php
$error = [
    "date_error" => "", "time_error" => "", "workout_exist" => "",
    "add_error" => "", "add_success" => "", "empty_error" => "", "change_error" => "", "change_success" => ""
];


include("../navigation.php");
if (!isset($_SESSION['admin']) || $_SESSION['admin']!=1) {
    die;
    }
include("new_workout_handler.php");
if(isset($_GET["workout_id"]) && $_GET["workout_id"]<>"" ){
$workout_id = $connect->real_escape_string(strip_tags($_GET["workout_id"]));
$workout_id = filter_var($workout_id, FILTER_SANITIZE_STRING);
}
?>
<div class="container-fluid custom-margin-container">   

    <!--Row starts-->
    <div class="row">
        <div class="col-lg-2">
        </div>

        <div class="col-lg-8">
            <p></p>
            <form class="custom-form" action="new_change_workout.php?workout_id=<?php echo isset($workout_id) ? $workout_id : ''; ?>" method="post">

                <h2> <?php echo (isset($workout_id)) ? "MUOKAA TREENI" : "UUSI TREENI" ?></h2>

                <?php echo isset($error['workout_exist']) ? $error['workout_exist'] : ''; ?>
                <?php echo isset($error['add_success']) ? $error['add_success'] : ''; ?>
                <?php echo isset($error['add_error']) ? $error['add_error'] : ''; ?>
                <?php echo isset($error['empty_error']) ? $error['empty_error'] : ''; ?>
                <?php echo isset($error['change_success']) ? $error['change_success'] : ''; ?>
                <?php echo isset($error['change_error']) ? $error['change_error'] : ''; ?>

                <?php if (isset($workout_id)) { ?>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">ID</label>
                        <div class="col">
                            <input id="workout_id" type="number" class="form-control" name="workout_id" id="workout_id" value="<?php echo $workout_id ?>" readonly />
                        </div>
                    </div>
                <?php

                    $query_select = "SELECT `date`, `time`,free_slots, `status`,trainer_id,`name`, title_id,title FROM workouts_timetable 
                               LEFT JOIN workout_titles ON workouts_timetable.title_id=workout_titles.id 
                               LEFT JOIN users ON workouts_timetable.trainer_id=users.id
                               WHERE  workout_id='$workout_id'";
                    $result_select = $connect->query($query_select);
                    if (!$result_select) {
                        var_dump($query_insert);
                        var_dump($connect->error);
                        die;
                    } else {
                        $row = $result_select->fetch_assoc();
                        $date = $row['date'];
                        $time = $row['time'];
                        $title_id = $row['title_id'];
                        $workout_title = $row['title'];
                        $trainer_id = $row['trainer_id'];
                        $trainer = $row['name'];
                        $free_slots = $row['free_slots'];
                        $status = $row['status'];
                    }
                }

                ?>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Päivämäärä</label>
                    <div class="col">
                        <input type="date" class="form-control" name="date" id="date" value="<?php echo (isset($workout_id)) ? $date : "" ?>" />
                        <?php echo isset($error['date_error']) ? $error['date_error'] : ''; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Ajankohta</label>
                    <div class="col">
                        <input type="time" class="form-control" name="time" id="time" value="<?php echo (isset($workout_id)) ? $time : "" ?>" />
                        <?php echo isset($error['time_error']) ? $error['time_error'] : ''; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Liikuntalaji</label>
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
                    <div class="col">
                        <select id="title" class=form-control name="title">
                            <?php
                            foreach ($titles as $id => $title) {
                                $select = (isset($workout_id) && ($title == $workout_title)) ? "selected" : "";
                                echo "<option value=\"$id\" $select>$title</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Ohjaaja</label>
                    <div class="col">
                        <select id="trainer" class=form-control name="trainer" value="<?php echo (isset($workout_id)) ? $trainer : "" ?>">
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Vapaat paikat</label>
                    <div id= "free_max_slots" class="col">                        
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tila</label>
                    <div class="col">
                        <?php $select = isset($workout_id) ? $status : "" ?>
                        <select id="status" class=form-control name="status" value="<?php echo (isset($_GET['workout_id'])) ? $status : "" ?>">
                            <option value="Future" <?php echo (($select == "future") ? "selected" : "") ?>>Tuleva</option>
                            <option value="Done" <?php echo (($select == "done") ? "selected" : "") ?>>Päättynyt</option>
                            <option value="Canceled" <?php echo (($select == "canceled") ? "selected" : "") ?>>Peruutettu</option>
                        </select>
                    </div>
                </div>

                <button type="submit" name="submit" id="submit" class="btn btn-outline-danger btn-lg btn-block">
                    <?php echo (isset($workout_id)) ? "Muokaa" : "Lisää" ?>
                </button>

                <p></p>

            </form>            
        </div>

        <div class="col-lg-2">
        </div>
    </div>
    <!--Row ends-->

    <div class="custom-space">
        <p><br></p>
    </div>

</div>

<script type="text/javascript" src="trainer_select.js"></script>
<script type="text/javascript" src="free_slots_select.js"></script>
<?php

//$connect->close();

include("../footer.php");