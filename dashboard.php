<?php
session_start();
echo $_SESSION['KEY'];
session_unset();
session_destroy();
$conn = new mysqli("localhost","root","","rabiul");
if (!$conn){
    echo "Not connected";
}
$sql = "SELECT * FROM usre_info";
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        button{
            margin: 10px 0 0 10px;
            border:none;
            padding:8px;
           background:transparent;
            
        }
        a{
            background:cayn;
            font-size:20px;
            border:1px solid red;
            border-radius:5px;

        }
    </style>
</head>
<body>
    
        <button name="submit"><a href="destroy.php">Logout</a></button>

</body>
</html>