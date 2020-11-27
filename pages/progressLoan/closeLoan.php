<?php
 $id = $_GET['id'];
 echo "
 <div class=\"modal-body\">
 <p class=\"text-dark\">Are you sure to close this Loan <b>'".$id."'</b>?</p>
 </div>
 <div class=\"modal-footer\">
 <form action = \"confirm.php\" method=\"post\" >
    <input type=\"text\" style=\"display:none\" name=\"id\" value='".$id."'>
     <button type=\"summit\" class=\"btn btn-danger\" >Confirm</button>
</form>
<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cancel</button>
 </div>
 ";

?>