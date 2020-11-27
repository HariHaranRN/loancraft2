<?php
$IA =  isset($_GET['IA']) ? $_GET['IA'] : '';
$loanID = isset($_GET['loanID']) ? $_GET['loanID'] : '';
$newPay = isset($_GET['newPay']) ? $_GET['newPay'] : '';

$connectDB = mysqli_connect("localhost", "root", "", "loancarft");

$updateValues = "UPDATE newloan SET paidInterest='$IA' WHERE loanID= '$loanID'";
$addHistory = mysqli_query($connectDB,"INSERT INTO interesthistory(loanID, Amount) VALUES ('$loanID', '$newPay')");

if(mysqli_query($connectDB, $updateValues)){
    echo "
    <div class=\"card-body\" id=\"searchBody\">
    <div class=\"row text-center\">
      <div class=\"col-md-12\">
      <h1><i class=\"fas fa-check-circle text-success payIcon\"></i></h1>
      </div>
      <div class=\"col-md-12\">
        <h1>Interest Paid Succesfully.</h1>
      </div>
    </div>
  </div>
    ";
 }else{
     echo "
     <div class=\"card-body\" id=\"searchBody\">
    <div class=\"row text-center\">
      <div class=\"col-md-12\">
      <h1><i class=\"fas fa-sad-tear text-warning payIcon\"></i></h1>
      </div>
      <div class=\"col-md-12\">
        <h1>Something went wrong.</h1>
      </div>
    </div>
  </div>
     ";
     exit();
 }
?>