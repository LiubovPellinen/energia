<?php
include("../navigation.php");
include("login_handler.php");
//session_start();
//if (isset($_SESSION['loggedIn'])) {
//    header('Location: y_tili.php');
//  die();
//}

?>

<div class="container-fluid custom-margin-for-form"> 

    <!--Row stars-->
    <div class="row">
        <div class="col-lg-2">        
        </div>

        <div class="col-lg-8">
            <form class="custom-form" action="" method="post">
                <h2>KIRJAUDU</h2>

                <?php echo $accountNotExistErr; ?>
                <?php echo $namePwdErr; ?>
                <?php echo $verificationRequiredErr; ?>
                <?php echo $name_empty_err; ?>
                <?php echo $pass_empty_err; ?>

                <div class="form-group">
                    <label>Sähköposti</label>
                    <input type="text" class="form-control" name="user_email" id="user_email" />
                </div>

                <div class="form-group">
                    <label>Salasana</label>
                    <input type="password" class="form-control" name="user_password" id="user_password" />
                    <a href="reset_password.php" class="text-danger"> Unohditko salasana?</a>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="rememberme" id="rememberme" />
                    <label class="form-check-label" for="rememberme">Muista minut</label>
                </div>

                <p></p>

                <button type="submit" name="login" id="submit" class="btn btn-outline-danger btn-lg btn-block">Kirjaudu
                </button>
                <p></p>
            </form>
        </div>

        <div class="col-lg-2">        
        </div>
    </div>
    <!--Row ends-->   
</div>

<?php
include("../footer.php");
?>