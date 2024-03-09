<?php
session_start();
$conn = new mysqli("localhost","root","","rabiul");
if (!$conn){
    echo "Not connected";
}
 $error_email = $error_pass = "";
if (isset($_POST['submit'])){
    $email = $_POST['Email'];
    $pass = $_POST['password'];
    $convert_pass = md5($pass);
    if (empty($email)) {
        $error_email = "Please fill up this field";
    }
    if (empty($pass)) {
        $error_pass = "Please fill up this field";
    }

    if (!empty($email) && !empty($pass)){
        $sql = "SELECT * FROM user_info WHERE email = '$email' AND password = '$convert_pass'";
       $query = $conn->query($sql);
       $_SESSION['KEY'] = "Congratulation!";
        if ($query->num_rows > 0){
            header("location: http://localhost:/Login page/dashboard.php?id");
        }else {
            echo "Sorry please give me valid email or passwored";
        }
       
    }
 

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
        <form action="Login.php" method= "POST">
            <div class="container">
                <div class="row">
                <div class="col-4">
               </div>
               <div class="col-4 card mt-5" >
                <div class="card-body ">
                    <div class="div">
                        <label  class="form-label ">Email address</label>
                        <input type="Email" name="Email" class="form-control" value="<?php echo isset($_POST['submit']) ? $email : ''; ?>">
                            <?php if (isset($_POST['submit'])) {
                                    echo '<span class="text-danger">' . $error_email . '</span>';
                                } ?>
                    </div>
                    <div class="div"> 
                            <label  class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" >
                            <?php if (isset($_POST['submit'])) {
                                    echo '<span class="text-danger">' . $error_pass . '</span>';
                                } ?>
                    </div>
               
                  <button name="submit" class="btn btn-success mt-2">Login</button>
                  
                  <h6 class="mt-2">Don't have an acoount?<a href="./Registation.php">Register</a></h6>
                </div>
               </div>
               <div class="col-4">
               </div>
                </div>
            </div>
        </form>

</body>
</html>