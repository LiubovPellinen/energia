<?php
include("../navigation.php");
include('./reg_handler.php');

//if (isset($_SESSION['error'])) {
//  echo "<div class='error'>Error: " . $_SESSION['error']. "</div>";
//  unset($_SESSION['error']);
//}
?>

<div class="container-fluid custom-margin-for-form">    

    <!--Row starts-->
    <div class="row">
        <div class="col-lg-2">        
        </div>

        <div class="col-lg-8">            
            <form class="custom-form" action="" method="post">
          
                <h2>LUO TILI</h2>

                <?php echo $success_msg; ?>
                <?php echo $email_exist; ?>
                <?php echo $name_exist; ?>
                <?php echo $email_verify_err; ?>
                <?php echo $email_verify_success; ?>

                <div class="form-group">
                    <label>Nimi</label>
                    <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Etunimi Sukunumi"/>
                    <div class="valid-feedback">Oikein.</div>
                    <div class="invalid-feedback">Täytä tämä kenttä.</div>
                    <?php echo $fNameEmptyErr; ?>
                    <?php echo $f_NameErr; ?>
                </div>


                <div class="form-group">
                    <label>Sähköposti</label>
                    <input type="email" class="form-control" name="user_email" id="user_email" />

                    <?php echo $_emailErr; ?>
                    <?php echo $emailEmptyErr; ?>
                </div>

                <div class="form-group">
                    <label>Salasana</label>
                    <input type="password" class="form-control" name="user_password" id="user_password" placeholder=""/>

                    <?php echo $_passwordErr; ?>
                    <?php echo $passwordEmptyErr; ?>
                </div>

                <div class="form-group">
                    <label>Vahvista salasana</label>
                    <input type="password" class="form-control" name="user_password_2" id="user_password_2" placeholder=""/>

                    <?php echo $password_2_EmptyErr; ?>
                    <?php echo $passwords_notequal; ?>                    
                </div>

                <button type="submit" name="submit" id="submit" class="btn btn-outline-danger btn-lg btn-block">Luo tili
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