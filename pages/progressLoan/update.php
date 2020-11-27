<?php
 $cName = $_POST['name'];
 $gName = $_POST['guardianName'];
 $loanDate = $_POST['date'];
 $mobileNo = $_POST['mobileNo'];
 $aMobileNo = $_POST['aMobileNo'];
 $cAddress = $_POST['address'];
 $loanAmount = $_POST['loanAmount'];
 $interest = $_POST['interest'];
 $paidInterest =$_POST['paidInterest'];
 $notes = $_POST['notes'];
 $loanID = $_POST['loanID'];

 $connectDB = mysqli_connect("localhost", "root", "", "loancarft");

 $updateValues = "UPDATE newloan SET cName = '$cName', guardianName = '$gName', loanDate = '$loanDate', mobileNo = '$mobileNo', aMobileNo = '$aMobileNo', cAddress = '$cAddress', loanAmount = '$loanAmount', interest = '$interest', paidInterest = '$paidInterest', notes = '$notes' WHERE loanID= '$loanID'";

 if(mysqli_query($connectDB, $updateValues)){
    header("Location: http://localhost/loanCraft/pages/progressLoan/"); 
    exit();
 }else{
     echo "Fail";
     exit();
 }

?>