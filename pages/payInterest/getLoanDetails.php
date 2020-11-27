<?php
$loanID =  isset($_GET['id']) ? $_GET['id'] : '';
$test =  isset($_GET['test']) ? $_GET['test'] : '';
$connectDB = mysqli_connect("localhost", "root", "", "loancarft");
if($test == $loanID){
  echo "
  <div class=\"card-body\" id=\"searchBody\">
  <div class=\"row text-center\">
    <div class=\"col-md-12\">
    <h2><i class=\"far fa-meh-blank text-info payIcon\"></i></h2>
    </div>
    <div class=\"col-md-12\">
      <h1>You must enter the loan ID.</h1>
    </div>
  </div>
</div>
  ";
}
else{

$results = mysqli_query($connectDB,"SELECT * FROM newloan WHERE loanID='$loanID'");
if($results){
while ($row = $results->fetch_assoc()) {
    $loanDate=strtotime($row['loanDate']);
    $loanYear=date("Y",$loanDate);
    $today = date("Y");
    $years = $today - $loanYear;
    $pendingInterest = ($years * $row['interest']) - $row['paidInterest'];
echo "
<div class=\"card-body\" >
<div class=\"row\">
  <div class=\"col-md-6\">
    <form>
      <div class=\"form-group row\">
        <label class=\"col-md-2  col-form-label\">Loan ID</label>
        <div class=\"col-md-10\">
          <input type=\"text\" class=\"form-control\" value='".$row['loanID']."' disabled>
        </div>
      </div>
      <div class=\"form-group row\">
        <label class=\"col-md-2  col-form-label\" >Name</label>
        <div class=\"col-md-10\">
          <input type=\"text\" class=\"form-control\" value='".$row['cName']."' disabled>
        </div>
      </div>
      <div class=\"form-group row\">
        <label class=\"col-md-2  col-form-label\">Parent Name</label>
        <div class=\"col-md-10\">
          <input type=\"text\" class=\"form-control\" value='".$row['guardianName']."' disabled>
        </div>
      </div>
      <div class=\"form-group row\">
        <label class=\"col-md-2  col-form-label\">Mobile</label>
        <div class=\"col-md-10\">
          <input type=\"text\" class=\"form-control\" value='".$row['mobileNo']."' disabled>
        </div>
      </div>
      <div class=\"form-group row\">
        <label class=\"col-md-2  col-form-label\">Amount</label>
        <div class=\"col-md-10\">
          <input type=\"text\" class=\"form-control\" value='".$row['loanAmount']."' disabled>
        </div>
      </div>
      <div class=\"form-group row\">
        <label class=\"col-md-2  col-form-label\">Interest</label>
        <div class=\"col-md-10\">
          <input type=\"text\" class=\"form-control\" value='".$row['interest']."' disabled>
        </div>
      </div>
      </form>
    </div>
    <div class=\"col-md-5\">
      <div class=\"card text-center\">
        <div class=\"card-body\">
          <h4>Pending Amount(₹)</h4><br>
          <h5 class=\"text-success\"><b>Rs.$pendingInterest</b></h5>
        </div>
      </div>
      <div>
      <div style = \"display:none\">
    <input type=\"text\" id=\"paidInterest\" value='".$row['paidInterest']."'>
    <input type=\"text\" id=\"loanID\" value='".$row['loanID']."'>
    </div>
          <br>
        <label>Enter Amount</label>
        <br>
        <input type=\"number\" id=\"newPay\" class=\"form-control\">
        <br>
        <button type=\"button\" class=\"btn btn-info\" style=\"width: 100%;\" onclick=\"payInterest()\" >Pay ₹</button>
      </div>
    </div>
  </div>
</div>

";
} 
} else {
  echo "Fail";
}
}
?>