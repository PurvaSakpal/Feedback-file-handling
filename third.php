<?php
error_reporting(0);
$userName=$_SESSION['sid'];
if(isset($_POST['sub']))
{
    $file=$_FILES['proof']['tmp_name'];
    $fn=$_FILES['proof']['name'];
    $size = $_FILES['proof']['size'];
    $terms=$_POST['tc'];
    $ext=pathinfo($fn,PATHINFO_EXTENSION);
    $fname="proof.$ext";
    if(empty($terms))  //for checkbox
    {
        $termsE="please accept terms and conditions";
    }
    if(empty($file))//for file upload
    {
        $fileE="Please upload the file";
    }
    
    if($size > 10000000)//to check the file size
    {
        $fileE="file should be less than 10 MB";
    }
    if($ext =='pdf' || $ext =='docx')//to check the file type
    {
        if($termsE=="" && $fileE=="")
        {
            if(move_uploaded_file($file,"upload/$fname"))
            {
                
                $status=$_SESSION['status'];
                $name=$_SESSION['ename'];
                $rate=$_SESSION['ratings'];
                $preference=$_SESSION['pref'];
                $jobTitle=$_SESSION['jtitle'];
                $reviewHeadline=$_SESSION['revhead'];
                $pros=$_SESSION['pros'];
                $cons=$_SESSION['cons'];
                $adviceManagement=$_SESSION['adm'];
                $userName=$_SESSION['username'];
                file_put_contents("upload/details.txt","$status \n $name \n $rate \n $preference\n $jobTitle \n $reviewHeadline \n $pros \n $cons \n $adviceManagement");
                header("location:?con=welcome");
            }
            else {
                $fileS="Uploading Error";
            }
            }
    }
    else{
        $extE="Only pdf and docx file supported";
        }                
}
if(isset($_POST['prev']))
{
    header("location:?con=second");
}
?>
<form method="post" enctype="multipart/form-data">
<div class="form-group row mt-4">
    <label for="inputFile3" class="col-sm-2 col-form-label">Submit Proof</label>
    <div class="col-sm-10">
        <input type="file" class="form-control-file" id="inputFile3" name="proof">
    </div>
</div>
<div class="form-group has-error text-danger">
    <span class="help-block"><?php echo "$fileE"; ?></span>
    <span class="help-block"><?php echo "$extE"; ?></span>
    <span class="help-block"><?php echo "$fnameE"; ?></span>
</div>

<div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="invalidCheck2" name="tc">
      <label class="form-check-label" for="invalidCheck2">
        Agree to terms and conditions
      </label>
    </div>
</div>
<div class="form-group has-error text-danger">
    <span class="help-block"><?php echo "$termsE"; ?></span>
    <span class="help-block"><?php echo "$fileS"; ?></span>
</div>

<div class="form-group row m-2">
    <div class="col-sm-10 col-lg-10">
    <button type="submit" class="btn btn-success" name="prev">Prev</button>
        <button type="submit" class="btn btn-success" name="sub">Submit</button>
    </div>
</div>
</form>