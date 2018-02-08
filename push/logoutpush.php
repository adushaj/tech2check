<?php
    include("../connect.php");
    
    session_unset();
    
    header("location: ../index.php");
?>