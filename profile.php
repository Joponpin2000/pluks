<?php // profile.php

session_start();

require_once('config/DatabaseClass.php');

$database = new DatabaseClass();

$msg = "";

if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '')
{
    header('Location: login.php');
    exit;
}

$user_id = trim($_SESSION['user_id']);

$query = "SELECT * FROM profile WHERE user_id = :user_id";
$profile = $database->Read($query, ['user_id' => $user_id]);

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $details = trim($_POST['details']);


    if ($_FILES['image']['type'] != '' && $_FILES['image']['type'] != 'image/png' && $_FILES['image']['type'] != 'image/jpg' && $_FILES['image']['type'] != 'image/jpeg')
    {
        $msg = "Please select only png, jpg and jpeg formats.";
    }

    if ($msg == "")
    {
        if ($profile)
        {
            if ($_FILES['image']['name'] != '')
            {
                $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], "profile/" . $image);

                // Execute an update statement
                $sql = "UPDATE profile SET details = :details, image = :image WHERE user_id = :user_id ";
                $stmt = $db_connect->Update($sql, ['details' => $details, 'image' => $image, 'user_id' => $user_id]);

                // Close statement
                unset($stmt);
            }
            else
            {
                // Execute an update statement
                $sql = "UPDATE posts SET details = :details WHERE user_id = :user_id ";
                $stmt = $db_connect->Update($sql, ['details' => $details, 'user_id' => $user_id]);

                // Close statement
                unset($stmt);
            }
        }
        else
        {
            $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], "profile/" . $image);
            
            // Execute an insert statement
            $sql = "INSERT INTO profile (user_id, details, image) VALUES (:user_id, :details, :image)";
            $stmt = $database->Insert($sql, ['user_id' => $user_id, 'details' => $details, 'image' => $image]);

            // Close statement
            unset($stmt);
        }
    }
}


include_once('layouts/header.php');

?>

<section>
    <div class="container">
        <h3>Your Profile</h3>
        <?php
        if ($profile)
        {
        ?>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <img src="profile/<?php echo $profile[0]['image']; ?>" alt="">
                </div>
                <div class="col-sm-12 col-md-8 col-lg-8">
                    <p><?php echo $profile[0]['details']; ?></p>
                </div>
            </div>
        <?php
        }
        else
        {
        ?>
                <fieldset>
                    <legend>Enter your details / image</legend>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea name="details" rows="10" cols="10" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Image:</label>
                                    <span style="color: red"><?php $msg; ?></span>
                                    <input type="file" name="image" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-outline-success" value="Save Profile">
                    </form>
                </fieldset>
        <?php
        }
        ?>
        <!-- <a href="" class="btn btn-success">Save Profile</a> -->
    </div>
</section>