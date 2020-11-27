<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Current Loans</title>
    <link rel="icon" href="https://icons555.com/images/icons-red/image_icon_indian_rupee_pic_512x512.png" type="image/gif" sizes="16x16">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../../common/common.css">

    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript" language="JavaScript">
        function getIdValue(id) {
        $('#Info').load('getIdValue.php?id=' + id);
        }
        function hideEdit(id) {
            $('#showEditForm').load('getEditDetails.php?id=' + id);
            $('#cardShow').hide(200);
        }
        function showTable(){
            $('#showTable').hide();
            $('#cardShow').fadeIn(200);
        }
        function closeLoan(id){
            $('#closeLoan').load('closeLoan.php?id=' + id);
        }
    </script>
</head>

<body>    

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
               <h3 class="symbol"><b>₹</b></h3>
                <h3> Loan Craft</h3>
                <strong class="header-symbol">₹</strong>
            </div>
            <hr>
            <ul class="list-unstyled components">
                <li>
                    <a href="./../../" >
                        <i class="fas fa-tachometer-alt"></i>
                        Dash board
                    </a>
                </li>
                <li>
                    <a href="../newLoan/">
                        <i class="fas fa-plus"></i>
                        New Loans
                    </a>
                </li>
                <li class="active">
                    <a href="#">
                        <i class="fas fa-tasks"></i>
                        Current Loans
                    </a>
                </li>
                <li>
                    <a href="../payInterest/">
                        <i class="fas fa-gem"></i>
                        Pay Interest
                    </a>
                </li>
                <li>
                    <a href="../interestHistory/">
                        <i class="fas fa-history"></i>
                        Interest History
                    </a>
                </li>
                <li>
                    <a href="../closedLoan/">
                        <i class="fas fa-store-alt-slash"></i>
                        Closed Loans
                    </a>
                </li>
            </ul>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content" >

            <nav class="navbar navbar-expand-lg navbar-light ">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <h5>Demo User</h5>
                </div>
            </nav>
            <!-- Tabe -->
            <div class="card" id="cardShow">
                <div class="card-header bg-info">
                    <h3 class="text-light">Current Loans</h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table text-center">
                        <thead>
                          <tr class="text-info">
                            <th scope="col">#</th>
                            <th scope="col">Loan ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Interest</th>
                            <th scope="col">Pending Amount</th>
                            <th scope="col">Info</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Close</th>
                          </tr>
                        </thead>

                        <?php
                            $connectDB = mysqli_connect("localhost", "root", "", "loancarft");

                            $result = mysqli_query($connectDB,"SELECT * FROM newloan WHERE isActive = true ORDER BY sNo DESC");
                            $i = 0;
                            while($row = mysqli_fetch_array($result))
                            {
                                $i = $i + 1;
                                $loanDate=strtotime($row['loanDate']);
                                $loanYear=date("Y",$loanDate);
                                $today = date("Y");
                                $years = $today - $loanYear;
                                $pendingInterest = ($years * $row['interest']) - $row['paidInterest'];
                                echo "<tbody>";
                                echo "<tr>";
                                echo "<td>" . $i . "</td>";
                                echo "<td>" . $row['loanID'] . "</td>";
                                echo "<td>" . $row['cName'] . "</td>";
                                echo "<td>" . $row['loanDate'] . "</td>";
                                echo "<td> Rs." . $row['loanAmount'] . "</td>";
                                echo "<td> Rs." . $row['interest'] . "</td>";
                                echo "<td> Rs." . $pendingInterest . "</td>";
                                echo "<td><i type = \"button\"  class = \"fas fa-info-circle text-warning\" style = \"cursor:pointer\" data-toggle = \"modal\" data-target = \"#exampleModal\" onclick=\"getIdValue('".$row['loanID']."')\"> </i></td>";
                                echo "<td><i class = \"fas fa-edit text-primary\" id=\"edit\" onclick=\"hideEdit('".$row['loanID']."')\" style = \"cursor:pointer\"></td>";
                                echo "<td><i class = \"fas fa-ban text-danger\"   onclick=\"closeLoan('".$row['loanID']."')\" style = \"cursor:pointer\" data-toggle = \"modal\" data-target = \"#closeModal\" ></td>";
                                echo "</tbody>";
                            }
                        ?>
                      </table>
                   </div>
                    <!-- Information Box -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header bg-info text-light">
                                <h3 class="modal-title" id="exampleModalLabel">Details About the Loan</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="text-light">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <div id='Info'></div>
                            </div>
                            </div>
                        </div>
                    </div>

                    <!-- Account Closing Box -->
                    <div class="modal fade" id="closeModal" tabindex="-1" role="dialog" aria-labelledby="closeModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header bg-info text-light">
                                <h3 class="modal-title" id="closeModalLabel">Account Closer</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="text-light">&times;</span>
                                </button>
                            </div>
                            <div id="closeLoan"></div>
                            </div>
                        </div>
                    </div>
            </div>
             <div id="showEditForm"></div>
           </div>
    </div>


    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- Common Script-->
    <script type="text/javascript" src="../../common/common.js">

    </script>
</body>

</html>