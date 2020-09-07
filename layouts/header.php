<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pluks || E-chats</title>

    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/fontawesome-all.min.css"/>
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css" />
    <link rel="stylesheet" href="owl-carousel/owl.theme.css" />
    <link rel="stylesheet" href="aos-master/dist/aos.css">
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-toggleable-md double-nav navabr-light bg-light">
            <h4><a href="index.php" class="navabr-brand">Pluks</a></h4>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <?php
                        if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != '')
                        {
                    ?>
                            <li class="nav-item">
                                <a href="index.php" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php" class="nav-link">Friends</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php" class="nav-link">Chats</a>
                            </li>
                            <li class="nav-item">
                                <a href="profile.php" class="nav-link">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php" class="nav-link">Settings</a>
                            </li>
                            <li class="nav-item">
                                <a href="logout.php" class="nav-link">Logout</a>
                            </li>
                    <?php
                        }
                        else
                        {
                            ?>
                            <li class="nav-item">
                                <a href="index.php" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="signup.php" class="nav-link">Sign Up</a>
                            </li>
                            <li class="nav-item">
                                <a href="login.php" class="nav-link">Login</a>
                            </li>
                    <?php
                        }
                    ?>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input type="search" class="form-control mr-sm-2" placeholder="Search" aria-label="Search"/>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>