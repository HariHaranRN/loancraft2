<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dashboard</title>
    <link rel="icon" href="https://icons555.com/images/icons-red/image_icon_indian_rupee_pic_512x512.png" type="image/gif" sizes="16x16">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="common/common.css">
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

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
                <li class="active">
                    <a href="#" >
                        <i class="fas fa-tachometer-alt"></i>
                        Dash board
                    </a>
                </li>
                <li>
                    <a href="pages/newLoan/">
                        <i class="fas fa-plus"></i>
                        New Loans
                    </a>
                </li>
                <li>
                    <a href="pages/progressLoan/">
                        <i class="fas fa-tasks"></i>
                        Current Loans
                    </a>
                </li>
                <li>
                    <a href="pages/payInterest/">
                        <i class="fas fa-gem"></i>
                        Pay Interest
                    </a>
                </li>
                <li>
                    <a href="pages/interestHistory/">
                        <i class="fas fa-history"></i>
                        Interest History
                    </a>
                </li>
                <li>
                    <a href="pages/closedLoan/">
                        <i class="fas fa-store-alt-slash"></i>
                        Closed Loans
                    </a>
                </li>
            </ul>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light ">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <h5>Demo User</h5>
                </div>
            </nav>
            <?php 
             $connectDB = mysqli_connect("localhost", "root", "", "loancarft");

             $resultActive = mysqli_query($connectDB,"SELECT * FROM newloan WHERE isActive = true ");
             $resultInActive = mysqli_query($connectDB,"SELECT * FROM newloan WHERE isActive = false ");
             $resultInAll = mysqli_query($connectDB,"SELECT * FROM newloan");
             $totalProgress = 0;
             $totalClosed = 0;
             $totalPending = 0;
             $totalLoanAmount = 0;
             $totalLoan = 0;
             while($row1 = mysqli_fetch_array($resultActive)){
                $totalProgress = $totalProgress + 1;
             }
             while($row2 = mysqli_fetch_array($resultInActive)){
                $totalClosed = $totalClosed + 1;
            }
            while($row3 = mysqli_fetch_array($resultInAll)){
                $loanDate=strtotime($row3['loanDate']);
                $loanYear=date("Y",$loanDate);
                $today = date("Y");
                $years = $today - $loanYear;
                $pendingInterest = ($years * $row3['interest']) - $row3['paidInterest'];
                $totalPending = $totalPending + $pendingInterest;
                $totalLoanAmount = $totalLoanAmount + $row3['loanAmount'];
            }
            $totalLoan = $totalProgress + $totalClosed;
             echo "
            <div class=\"row\">
                <div class=\"col-md-4\"> 
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <div class=\"row dashboardRow\">
                                <div class=\"col-md-6\">
                                    <i class=\"fas fa-spinner progressIcon text-success\"></i>
                                </div>
                                <div class=\"col-md-6 \">
                                    <h2 class=\"text-right text-success\">".$totalProgress."</h2>
                                </div>
                            </div>
                            <hr>
                            <h4 class=\"text-center dashboardTitle\">Total Progress Loan</h4>
                        </div>
                    </div>
                  </div>
                  <div class=\"col-md-4\"> 
                    <div class=\"card card-position\">
                        <div class=\"card-body\">
                            <div class=\"row dashboardRow\">
                                <div class=\"col-md-6\">
                                    <i class=\"fas fa-smile-beam progressIcon text-warning\"></i>
                                </div>
                                <div class=\"col-md-6 \">
                                    <h2 class=\"text-right text-warning\">".$totalClosed."</h2>
                                </div>
                            </div>
                            <hr>
                            <h4 class=\"text-center dashboardTitle\">Total Closed Loan</h4>
                        </div>
                    </div>
                  </div>
                  <div class=\"col-md-4\"> 
                    <div class=\"card card-position\">
                        <div class=\"card-body\">
                            <div class=\"row dashboardRow\">
                                <div class=\"col-md-6\">
                                    <i class=\"fas fa-balance-scale text-primary progressIcon\"></i>
                                </div>
                                <div class=\"col-md-6 \">
                                    <h2 class=\"text-right text-primary\">".$totalLoan."</h2>
                                </div>
                            </div>
                            <hr>
                            <h4 class=\"text-center dashboardTitle\">Total Given Loans</h4>
                        </div>
                    </div>
                  </div>
            </div>
            <br>
            <div class=\"row\">
                <div class=\"col-md-1\"></div>
                <div class=\"col-md-5\"> 
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <div class=\"row dashboardRow\">
                                <div class=\"col-md-6\">
                                    <i class=\"fas fa-coins progressIcon text-danger\"></i>
                                </div>
                                <div class=\"col-md-6 \">
                                    <h2 class=\"text-right text-danger\">Rs.".$totalPending."</h2>
                                </div>
                            </div>
                            <hr>
                            <h4 class=\"text-center dashboardTitle\">Pending Interest</h4>
                        </div>
                    </div>
                  </div>
                  <div class=\"col-md-5\"> 
                    <div class=\"card card-position\">
                        <div class=\"card-body\">
                            <div class=\"row dashboardRow\">
                                <div class=\"col-md-6\">
                                    <i class=\"fas fa-gem progressIcon text-success\"></i>
                                </div>
                                <div class=\"col-md-6 \">
                                    <h2 class=\"text-right text-success\">Rs.".$totalLoanAmount."</h2>
                                </div>
                            </div>
                            <hr>
                            <h4 class=\"text-center dashboardTitle\">Total Loan</h4>
                        </div>
                    </div>
                  </div>
            </div> ";
            ?>
           </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- Common Script-->
    <script type="text/javascript" src="common/common.js">

    </script>
</body>

</html>