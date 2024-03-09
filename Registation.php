<?php

$conn = new mysqli("localhost","root","","rabiul");
if (!$conn){
    echo "Not connected";
}

$error_fname = $error_lname = $error_email = $error_pass = "";

if (isset($_POST['Submit'])) {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $Email = $_POST['Email'];
    $password = $_POST['password'];
    $convert_pass = md5($password);

    if (empty($f_name)) {
        $error_fname = "Please fill up this field";
    }
    if (empty($l_name)) {
        $error_lname = "Please fill up this field";
    }
    if (empty($Email)) {
        $error_email = "Please fill up this field";
    }
    if (empty($password)) {
        $error_pass = "Please fill up this field";
    }
}
if (!empty($f_name) && !empty($l_name) && !empty($f_name) && !empty($Email) && !empty($password)){
  $sql = "INSERT INTO user_info (f_name,l_name,email,password) VALUES ('$f_name ','$l_name','$Email','$convert_pass') ";
   if($conn->query($sql) == TRUE){
       header("Location: http://localhost:/login page/Login.php?l_id");
   }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <form action="registation.php" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-4">
                </div>
                <div class="col-4 card mt-5">
                    <div class="card-body ">
                        <div class="div">
                            <label class="form-label ">First name</label>
                            <input type="text" name="f_name" class="form-control"
                            value="<?php echo isset($_POST['Submit']) ? $f_name : ''; ?>">
                                <?php if (isset($_POST['Submit'])) {
                                    echo '<span class="text-danger">' . $error_fname . '</span>';
                                } ?>
                        </div>
                        <div class="div">
                            <label class="form-label ">Last name</label>
                            <input type="text" name="l_name" class="form-control"
                                value="<?php echo isset($_POST['Submit']) ? $l_name : ''; ?>">
                            <?php if (isset($_POST['Submit'])) {
                                echo '<span class="text-danger">' . $error_lname . '</span>';
                            } ?>
                        </div>
                        <div class="div">
                            <label class="form-label ">Email address</label>
                            <input type="email" name="Email" class="form-control"
                                value="<?php echo isset($_POST['Submit']) ? $Email : ''; ?>">
                            <?php if (isset($_POST['Submit'])) {
                                echo '<span class="text-danger">' . $error_email . '</span>';
                            } ?>
                        </div>
                        <div class="div">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control"
                                value="<?php echo isset($_POST['Submit']) ? $password : ''; ?>">
                            <?php if (isset($_POST['Submit'])) {
                                echo '<span class="text-danger">' . $error_pass . '</span>';
                            } ?>
                        </div>
                        <div class="div">
                            <button name="Submit" class="btn btn-success mt-2">Submit</button>
                            <h6 class="mt-2">Don't have an account?<a href="./Login.php">Login</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                </div>
            </div>
        </div>
    </form>

</body>

</html>
