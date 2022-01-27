<?php
session_start();
$userName=$_SESSION['sid'];
if(empty($userName))
{
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <?php include('head.php'); ?>
    <style>
     li{
        display: inline-block;
        font-size:20px;
        color:#BBB;
        }
        .hovered-stars{
            color: blue;
        }
        .clicked-stars{
            color: yellow;
        }
    </style>
    <title>feedback form</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light">
        <a class="navbar-brand" href="#">Feedback</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="#">
            Logged In as : <?php echo $userName; ?></a>  
            </li>
            <li class="nav-item" id="logout">
            <a class="nav-link" href="logout.php">Logout</a>
            </li>
            </ul>
        </div>
    </nav>
    <div class="container">
            <?php
            switch(@$_GET['con']){
                case 'first': include("first.php");
                break;
                case 'second':include("second.php");
                break;
                case 'third':include("third.php");
                break;
                case 'welcome':include("welcome.php");
                break;
                default: include("first.php");
                } 
            ?>  
    </div>
        <?php include('script.php'); ?>
    </body>
</html>