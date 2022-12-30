<?php
include('connection.php');

IF(isset($_REQUEST['sign_up'])!='')
{
    if ($_REQUEST['first_name']=='' ||
        $_REQUEST['last_name']=='' ||
        $_REQUEST['phone_email']=='' ||
        $_REQUEST['password']=='' ||
        $_REQUEST['dob']=='' ||
        $_REQUEST['gender']=='')
    {
        echo "Please fill the empty field.";
    }
    else
    {
        $sql="insert into user values('".$_REQUEST['first_name']."','".$_REQUEST['last_name']."',
        '".$_REQUEST['phone_email']."','".$_REQUEST['password']."','".$_REQUEST['dob']."' ,'".$_REQUEST['gender']."')";
        // $res=mysqli_query($sql);
        // if(mysqli_query($sql)){
        //     echo "record Successfully inserted.";
        // }
        // else
        // {
        //     echo "There is some problem in inserting record";
        // }
    }
}
?>