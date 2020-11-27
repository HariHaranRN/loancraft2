<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Pay Interest</title>
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
        function searchByID() {
        var id = $('#loanID').val();
        var test = $('#test').val();
        $('#bodyHandler').load('getLoanDetails.php?id=' + id + '&test='+ test);
        $('#searchBody').css("display", "none");
        }
        function payInterest(){
          var loanID = $('#loanID').val();
          var oldPaid = $('#paidInterest').val();
          var newPaid = $('#newPay').val();
          var total = parseInt(oldPaid) + parseInt(newPaid);
          $('#bodyHandler').load('payInterest.php?IA=' + total + '&loanID=' + loanID + '&newPay='+ newPaid);
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
                <li>
                    <a href="../progressLoan/">
                        <i class="fas fa-tasks"></i>
                        Current Loans
                    </a>
                </li>
                <li class="active">
                    <a href="#">
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
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light ">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <h5>Demo User</h5>
                </div>
            </nav>
                <div class="card">
                    <div class="card-header bg-info text-light">
                        <div class="card-title">
                            <h3>Pay Interest</h3>
                            <div class="form-inline align-items-center" style="float: right;">
                              <div class="form-group mb-2">
                                Enter Loan ID
                              </div>
                              <div class="form-group mx-sm-3 mb-2">
                                <input type="text" class="form-control" id="loanID" required>
                                <input type="text" class="form-control" id="test" style="display:none;" required>
                              </div>
                              <button class="btn mb-2" onclick="searchByID()">Search</button>
                
                          </div>
                        </div>
                    </div>
                    <div class="card-body" id="searchBody">
                      <div class="row text-center">
                        <div class="col-md-12">
                        <h1><i class="fas fa-search text-info payIcon"></i></h1>
                        </div>
                        <div class="col-md-12">
                          <p>Please, Enter your Loan ID and click 'Search' to get loan details.</p>
                        </div>
                      </div>
                    </div>
                    <div id="bodyHandler"></div>


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