<?php
error_reporting(0);
$userName=$_SESSION['sid'];
if(isset($_POST['next']))
{
$status=$_POST['status'];
$name=$_POST['name'];
    if(empty($status))
    {
        $statusE="Please enter the field";  
    }
    if(empty($name))
    {
        $nameE="please enter the field";
    }
    if($statusE=="" && $nameE=="")
    {
        session_start();
        $_SESSION['status']=$status;
        $_SESSION['ename']=$name;
        header("location:?con=second");
    }
}
?>
<form method="post" enctype="multipart/form-data">
<div class="form-group row mt-4">
                <legend class="col-form-label col-sm-2 pt-0">Are you a current or former Employee?</legend>
                <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="current">
                    <label class="form-check-label" for="gridRadios1">Current</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="former">
                    <label class="form-check-label" for="gridRadios2">Former</label>
                </div>
                </div>
</div>
<div class="form-group has-error text-danger">
    <span class="help-block"><?php echo $statusE; ?></span>
</div>
<div class="form-group row">
                <label for="forname" class="col-sm-2 col-form-label">Employer's Name</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="forname" name="name" placeholder="Full Name">
                </div>
</div>
<div class="form-group has-error text-danger">
    <span class="help-block"><?php echo $nameE; ?></span>
</div>
<div class="form-group row m-2">
                <div class="col-sm-10 col-lg-10">
                <button type="submit" class="btn btn-primary" name="next">
                Next</button>
                </div>
</div>
</form>