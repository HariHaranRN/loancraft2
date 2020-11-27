<?php
  $id = $_GET['id'];
  $connectDB = mysqli_connect("localhost", "root", "", "loancarft");

  $results = mysqli_query($connectDB,"SELECT * FROM newloan WHERE loanID='$id'");   
  while ($row = $results->fetch_assoc()) {
   echo " 
   <div class=\"card\" id=\"showTable\">
   <div class=\"card-header bg-info\">
    <h3 class=\"text-light\">Edit Loan - '".$row['loanID']."'</h3> 
   </div>
   <div class=\"card-body\">
       <form action=\"update.php\" method=\"post\">
       <input type=\"text\" class=\"form-control\" name=\"loanID\" value='".$row['loanID']."' style = \"display:none\">
           <div class=\"row\">
               <div class=\"col-md-4\">
                   <label>Name</label>
                   <input type=\"text\" class=\"form-control\" name=\"name\" value='".$row['cName']."' required>
               </div>
               <div class=\"col-md-4\">
                   <label>Guardian Name</label> 
                   <input type=\"text\" class=\"form-control\" name=\"guardianName\" value='".$row['guardianName']."' required>
               </div>
               <div class=\"col-md-4\">
                   <label>Date</label>
                   <input type=\"date\" class=\"form-control\" name=\"date\" id=\"datePicker\" value='".$row['loanDate']."' required>
               </div>
           </div>
           <div class=\"row\"> 
               <div class=\"col-md-6\">
                   <label>Mobile No</label>
                   <input type=\"number\" class=\"form-control\" name=\"mobileNo\" value='".$row['mobileNo']."' required>
               </div>
               <div class=\"col-md-6\">
                   <label>Alternate Mobile No</label>
                   <input type=\"number\" class=\"form-control\" name=\"aMobileNo\" value='".$row['aMobileNo']."'>
               </div>
           </div>
           <div class=\"row\">
               <div class=\"col-md-12\">
                   <label>Address</label>
                   <input type=\"text\" class=\"form-control\" name=\"address\" value='".$row['cAddress']."' required>
               </div>
           </div>
           <div class=\"row\">
               <div class=\"col-md-4\">
                   <label>Loan Amount</label>
                   <input type=\"text\" class=\"form-control\" name=\"loanAmount\" value='".$row['loanAmount']."' required>
               </div>
               <div class=\"col-md-4\">
                   <label>Interest</label>
                   <input type=\"number\" class=\"form-control\" name=\"interest\" value='".$row['interest']."' required>
               </div>
               <div class=\"col-md-4\">
                   <label>Initial Pay</label>
                   <input type=\"text\" class=\"form-control\" name=\"paidInterest\" value='".$row['paidInterest']."'>
               </div>
           </div>
           <div class=\"row\"> 
               <div class=\"col-md-12\">
                   <label>Notes</label>
                   <textarea class=\"form-control\" name=\"notes\" >".$row['notes']."</textarea>
               </div>
           </div>
           <br>
           <div class=\"row\">
               <div class=\"col-md-5\"></div>
               <div class=\"col-md-2\">
                   <button type=\"submit\" class=\"btn btn-success\" style=\"width: 100%;\" >Update Changes</button>
               </div>
               <div class=\"col-md-2\">
                   <button type=\"reset\" class=\"btn btn-mute\" id=\"hideForm\" onclick = \"showTable()\">Cancel</button>
               </div>
           </div>
           <div>
          
       </div>
       </form>
   </div>
 </div>
</div>
   ";
}
?>