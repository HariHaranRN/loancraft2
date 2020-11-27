<?php
  $id = $_GET['id'];
  $connectDB = mysqli_connect("localhost", "root", "", "loancarft");

  $results = mysqli_query($connectDB,"SELECT * FROM newloan WHERE loanID='$id'");   
  while ($row = $results->fetch_assoc()) {
    echo "<p class=\"text-dark\"><b>Name : </b>" .$row['cName']. "</p>";
    echo "<p class=\"text-dark\"><b>Loan ID : </b>" .$row['loanID']. "</p>";
    echo "<p class=\"text-dark\"><b>Guadrian Name : </b>" .$row['guardianName']. "</p>";
    echo "<p class=\"text-dark\"><b>Date : </b>" .$row['loanDate']. "</p>";
    echo "<p class=\"text-dark\"><b>Amount : </b>" .$row['loanAmount']. "</p>";
    echo "<p class=\"text-dark\"><b>Interest : </b>" .$row['interest']. "</p>";
    echo "<p class=\"text-dark\"><b>Mobile No. : </b>" .$row['mobileNo']. "</p>";
    echo "<p class=\"text-dark\"><b>Alterbate Moblile : </b>" .$row['aMobileNo']. "</p>";
    echo "<p class=\"text-dark\"><b>Address : </b>" .$row['cAddress']. "</p>";
    echo "<p class=\"text-dark\"><b>Paid Interest : </b>" .$row['paidInterest']. "</p>";
    echo "<p class=\"text-dark\"><b>Notes : </b>" .$row['notes']. "</p>";
}
?>