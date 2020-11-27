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
    $results = mysqli_query($connectDB,"SELECT * FROM interesthistory WHERE loanID='$loanID'");
    $i = 0;
    echo "
    <div class=\"card-body\">
    <table class=\"table text-center\">
        <thead>
            <tr>
            <th scope=\"col\">#</th>
            <th scope=\"col\">Date of Paid</th>
            <th>Time</th>
            <th scope=\"col\">Amount</th>
            </tr>
        </thead>
        
        <tbody>
    ";
    while ($row = $results->fetch_assoc()) {
        $i = $i + 1;
    echo "
                <tr>
                    <td>$i</td>
                    <td>".$row['paidDate']."</td>
                    <td>".$row['paidTime']."</td>
                    <td>".$row['Amount']."</td>
                </tr>
    ";
    }
    echo "
    
    </tbody>
    </table>
    </div>
    ";
}
?>