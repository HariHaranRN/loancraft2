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

 $random = rand();
 $loanID = "LID".$random;

 $connectDB = mysqli_connect("localhost", "root", "", "loancarft");
 
 if($loanID != null ){
 $addValues = "INSERT INTO newloan(cName, loanID, guardianName, loanDate, mobileNo, aMobileNo, cAddress, loanAmount, interest, paidInterest, notes) VALUES ('$cName', '$loanID', '$gName', '$loanDate', '$mobileNo', '$aMobileNo', '$cAddress', '$loanAmount', '$interest', '$paidInterest', '$notes')";
 $addHistory = mysqli_query($connectDB,"INSERT INTO interesthistory(loanID, Amount) VALUES ('$loanID', '$paidInterest')");
 }

 if(mysqli_query($connectDB, $addValues)){
    header("Location: http://localhost/loanCraft/pages/progressLoan/"); 
    exit();
 }else{
     echo "Fail";
 }

?>