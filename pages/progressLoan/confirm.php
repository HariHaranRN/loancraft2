<?php
 $loanID = $_POST['id'];

 $connectDB = mysqli_connect("localhost", "root", "", "loancarft");

 $updateValues = "UPDATE newloan SET isActive=false WHERE loanID= '$loanID'";

 if(mysqli_query($connectDB, $updateValues)){
    header("Location: http://localhost/loanCraft/pages/closedLoan/"); 
    exit();
 }else{
     echo "Fail";
     exit();
 }

?>