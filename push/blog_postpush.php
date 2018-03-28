<?php
    include("../connect.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $Title = mysqli_real_escape_string($connection, $_POST['Title']);  
    $Content = mysqli_real_escape_string($connection, $_POST['Content']); 
    
    $sql = "INSERT INTO Blog_post (Date, Title, Content)
        VALUES (NOW(),'".$_POST["Title"]."','".$_POST["Content"]."')";
    $result = mysql_query($sql);
    
    if($result){
        header("location: ../admin_tools.php");
        exit;
    }else{
        header("location: ../new_model.php");
        $_SESSION['inserterror'] = "Insert unsuccessful. Please try again.<br>" . mysql_error($connection);
        exit;
    }
}
?>