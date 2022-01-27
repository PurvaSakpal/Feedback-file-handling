<?php
error_reporting(0);
if(isset($_POST['next']))
{
$rate=$_POST['rat'];
$preference=$_POST['pref'];
$jobTitle=$_POST['jtitle'];
$reviewHeadline=$_POST['revhead'];
$pros=$_POST['pros'];
$cons=$_POST['cons'];
$adviceManagement=$_POST['adm'];
    if(empty($rate))   //to check ratings
    {
        $rateE="please give the ratings";
    }
    if(empty($preference))  //to check if preference is empty
    {
        $preferenceE="please choose any option";
    }
    if(empty($jobTitle))  //to check if job title is empty
    {
        $jobTitleE="please enter the field";
    }
    if(empty($reviewHeadline)) //to check if review headline is empty
    {
        $reviewHeadlineE="please enter the field";
    }
    if(empty($pros))   //to check if pros is empty
    {
        $prosE="please enter the field";
    }
    else
    {
        if(!preg_match("/^.{15,200}+$/",$pros))  //to check minimum 15 characters
        {
            $prosE="Minimum 15 characters required";
        
        }
    }
    if(empty($cons))  //to check if cons is empty
    {
        $consE="please enter the field";
    }
    else
    {
        if(!preg_match("/^.{15,200}+$/",$cons)) //to check minimum 15 characters
        {
            $consE="Minimum 15 characters required";
        
        }
    }
    if(empty($adviceManagement))  //to check if it is empty
    {
        $adviceManagementE="please enter the field";
    }
    else
    {
        if(!preg_match("/^.{15,200}+$/",$adviceManagement))  //to check minimum 15 characters
        {
            $adviceManagementE="Minimum 15 characters required";
        
        }
    }
            
    if($rateE=="" && $preferenceE=="" && $jobTitleE=="" && $reviewHeadlineE=="" && $prosE=="" && $consE=="" && $adviceManagementE=="")  //if no error 
    {
        session_start();
        $_SESSION['ratings']=$rate;
        $_SESSION['pref']=$preference;
        $_SESSION['jtitle']=$jobTitle;
        $_SESSION['revhead']=$reviewHeadline;
        $_SESSION['pros']=$pros;
        $_SESSION['cons']=$cons;
        $_SESSION['adm']=$adviceManagement;
        header("location:?con=third");
    }    
}
if(isset($_POST['prev']))
{
    header("location:?con=first");
}
?>
<!DOCTYPE html>
<html>

</html>
<form method="post">
<div class="form-group row mt-4">
    <Label class="col-sm-2 col-form-label">Rate Here</Label>
    <div class="col-sm-10">
            <ul>
                <li><i class="fas fa-star fa-fw"></i></li>
                <li><i class="fas fa-star fa-fw"></i></li>
                <li><i class="fas fa-star fa-fw"></i></li>
                <li><i class="fas fa-star fa-fw"></i></li>
                <li><i class="fas fa-star fa-fw"></i></li>
            </ul>
        <input type="hidden"  name="rat" id="ratings">
    </div>
</div>
<div class="form-group has-error text-danger">
    <span class="help-block"><?php echo $rateE; ?></span>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="inlineFormCustomSelect">Preference</label>
    <div class="col-sm-10">
    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="pref">
        <option selected disabled>Choose...</option>
        <option value="Full Time">Full Time</option>
        <option value="Part Time">Part Time</option>
        <option value="contract">Contract</option>
        <option value="intern">Intern</option>
    </select>
</div>
<div class="form-group has-error text-danger">
    <span class="help-block"><?php echo $preferenceE; ?></span>
</div>
</div>
<div class="form-group row">
    <label for="jtitle" class="col-sm-2 col-form-label">Job Title</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="jtitle" name="jtitle" placeholder="Job Title">
    </div>
</div>
<div class="form-group has-error text-danger">
    <span class="help-block"><?php echo $jobTitleE; ?></span>
</div>
<div class="form-group row">
    <label for="headline" class="col-sm-2 col-form-label">Review Headline</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="headline" name="revhead" placeholder="Review Headline">
    </div>
</div>
<div class="form-group has-error text-danger">
    <span class="help-block"><?php echo $reviewHeadlineE; ?></span>
</div>
<div class="form-group row">
  <label for="pros" class="col-sm-2 col-form-label">Pros</label>
  <div class="col-sm-10">
  <textarea class="form-control rounded-0" id="pros" rows="5" name="pros"></textarea>
</div>
</div>
<div class="form-group has-error text-danger">
    <span class="help-block"><?php echo $prosE; ?></span>
</div>
<div class="form-group row">
  <label for="cons" class="col-sm-2 col-form-label">Cons</label>
  <div class="col-sm-10">
  <textarea class="form-control rounded-0" id="cons" rows="5" name="cons"></textarea>
</div>
</div>
<div class="form-group has-error text-danger">
    <span class="help-block"><?php echo $consE; ?></span>
</div>
<div class="form-group row">
  <label for="AdM" class="col-sm-2 col-form-label">Advice Management</label>
  <div class="col-sm-10">
  <textarea class="form-control rounded-0" id="AdM" rows="5" name="adm"></textarea>
</div>
</div>
<div class="form-group has-error text-danger">
    <span class="help-block"><?php echo $adviceManagementE; ?></span>
</div>
<div class="form-group row m-2">
    <div class="col-sm-10 col-lg-10">
        <button type="submit" class="btn btn-primary" name="prev"> Prev</button>
        <button type="submit" class="btn btn-primary" name="next">Next</button> 
    </div>
</div>
</form>
<script>
    // ratings logic
    $(document).ready(function(){
        // mouse over colour change logic
        $("li").mouseover(function(){
            var current = $(this);
            $("li").each(function(index){
                // add class to change colour
                $(this).addClass("hovered-stars");
                if(index == current.index()){
                    return false;
                }
            });
        });
        // mouse left logic to change colour
        $("li").mouseleave(function(){
            // remove class of change colour
            $("li").removeClass("hovered-stars");
        });
        // click function to keep colour and get count of ratings
        $("li").click(function(){
            $("li").removeClass("clicked-stars"); 
            $(".hovered-stars").addClass("clicked-stars");
            $("#ratings").val($(".clicked-stars").length);
        });
    });
</script>