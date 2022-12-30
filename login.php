<?php
//include('connection.php');

//IF(isset($_REQUEST['login'])!='')
//{
  //  if($_REQUEST)
//}
?>

<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['user']))
{
    header("location: welcome.php");
    exit;
}
require_once "connection.php";

$phone_email = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['phone_email'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter Phone Number + password";
    }
    else{
        $username = trim($_POST['phone_email']);
        $password = trim($_POST['password']);
    }
if(empty($err))
{
    $sql = "SELECT id, phone_email, password FROM users WHERE phone_email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_phone_email);
    $param_phone_email = $phone_email;
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $phone_email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: welcome.php");       
                        }
                    }
                }
    }
}    
}
?>