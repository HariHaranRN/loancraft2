<?php
 $loanID = $_POST['id'];

 $connectDB = mysqli_connect("localhost", "root", "", "loancarft");

 $updateValues = "UPDATE newloan SET isActive=true WHERE loanID= '$loanID'";

 if(mysqli_query($connectDB, $updateValues)){
    header("Location: http://localhost/loanCraft/pages/progressLoan/"); 
    exit();
 }else{
     echo "Fail";
     exit();
 }

?>