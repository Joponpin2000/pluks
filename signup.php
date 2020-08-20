<?php

require_once('config/DatabaseClass.php');
require_once('config/signupclass.php');

$err = $msg = "";
$firstname = $lastname = $email = $username = $password = $confirm_password = "";

if ($_SERVER["REQUEST_METHOD"] =="POST")
{
    $signup = new SignupClass();
    
    $signup->validateConfirmPassword($_POST['confirm_password']);
    $signup->validatePassword($_POST['password']);
    $signup->validateUsername($_POST['username']);
    $signup->validateEmail($_POST['email']);
    $signup->validateLastname($_POST['lastname']);
    $signup->validateFirstname($_POST['firstname']);

    $firstname = $signup->firstname;
    $lastname = $signup->lastname;
    $email = $signup->email;
    $username = $signup->username;
    $password = $signup->password;
    $confirm_password = $signup->confirm_password;
    
    if ($signup->err)
        $err = $signup->err;
    else
    {
        $signup->Name();
        $signup->CheckUsername();
        if ($signup->err)
            $err = $signup->err;
        else
            $msg = $signup->msg;
    }
}

?>

<?php
    include_once('layouts/header.php');
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-6" style="margin: auto;">
            <?php
                if ($err) {
            ?>
                    <div class="alert alert-danger"><?php echo $err; ?></div>
            <?php
                }
                if ($msg) {
            ?>
                    <div class="alert alert-success"><?php echo $msg; ?></div>
            <?php
                }
            ?>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <input type="text" class="form-control" value="<?php echo $firstname; ?>" name="firstname"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <input type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $email; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" name="password" value="<?php echo $password; ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="text" class="form-control" name="confirm_password" value="<?php echo $confirm_password; ?>"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Signup"/>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
    include_once('layouts/footer.php');
?>