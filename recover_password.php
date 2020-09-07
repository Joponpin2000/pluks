<?php

session_start();

require_once('config/DatabaseClass.php');
require_once('config/functions.php');

$database = new DatabaseClass();

$err = $msg = "";
$username = "";

if ($_SERVER["REQUEST_METHOD"] =="POST")
{
    if (empty(trim($_POST['username'])))
    {
        $err = "Please enter username.";
    }
    else
    {
        $username = trim($_POST['username']);
    }
    
    $statement = "SELECT * FROM users WHERE username = :username";
    $user = $database->Read($statement, ['username' => $username]);

    // Check if username exists and corressponds with password
    if(isset($user[0]))
    {
        $fetch_user_id = $user[0]['username'];
        $email_id = $user[0]['id'];
        $password = $user[0]['id'];

        if ($username == $fetch_user_id) {
            $to = $email_id;
            $subject = 'Password';
            $txt = "Your password is : $password.";
            $headers = "From: $site_email" . "\r\n" . "CC: idowuayanfeoluwa@gmail.com";
            if (mail($to, $subject, $txt, $headers))
            {
                $msg .= "Password has been sent to your email!";
                $msg .= "<a href='login.php'>Proceed to login</a>";
            }
        }
        else
        {
            $err = "Invalid Username";
        }
    }
    else
    {
        $err = "Invalid Username";
    }
}
?>
<?php
    include_once('layouts/header.php');
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-6" style="margin: 80px auto;">
            <?php
                if ($err)
                {
            ?>
                    <div class="alert alert-danger"><?php echo $err; ?></div>
            <?php
                }
                if ($msg)
                {
            ?>
                    <div class="alert alert-success"><?php echo $msg; ?></div>
            <?php
                }
            ?>
                <h3>Recover Password</h3>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>"/>
                    </div>
                    <div class="form-group">
                        <div class="pull-left">
                            <input type="submit" class="btn btn-outline-success my-2 my-sm-0"  value="Recover Password"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
    include_once('layouts/footer.php');
?>