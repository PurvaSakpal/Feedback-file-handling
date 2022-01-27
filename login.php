<?php
error_reporting(0);
$loginD=["uname"=>"test_user","password"=>"123456"];
$userNameE=$passwordE="";
if(isset($_POST['login']))
{
    $userName=$_POST['uname'];
    $password=$_POST['password'];
    if($userName==$loginD["uname"] && $password==$loginD["password"])
    {
        session_start();
        $_SESSION['sid']=$userName;
        header("location:feedback.php"); 
    }
    else{
        $userPassE="Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php'); ?>
<title>Login</title>
</head>
<body>
<div class="jumbotron col-sm-12">
    <h1 class="display-4">Login Panel</h1>
</div>
<div class="container">
    <form method="post">
    <div class="form-group has-error text-danger">
            <span class="help-block"><?php echo $userPassE; ?></span>
        </div>
        <div class="form-group row m-2">
            <label for="uname" class="col-sm-2 col-form-label-lg">Username</label>
            <div class="col-sm-10 col-md-10">
                <input type="text" class="form-control form-control-lg" id="uname" name="uname" placeholder="Username">
            </div>
        </div>
        <div class="form-group row m-2">
            <label for="password" class="col-sm-2 col-form-label-lg">Password</label>
            <div class="col-sm-10 col-md-10">
                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
            </div>
        </div>
        <div class="form-group row m-2">
            <div class="col-sm-10 col-md-10 col-lg-10">
                <button type="submit" class="btn btn-primary" name="login">Login</button>
            </div>
        </div>
    </form>
</div>
    <?php include('script.php'); ?>
</body>
</html>