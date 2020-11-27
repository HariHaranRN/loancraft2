<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>New Loan</title>
    <link rel="icon" href="https://icons555.com/images/icons-red/image_icon_indian_rupee_pic_512x512.png" type="image/gif" sizes="16x16">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../../common/common.css">
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
            <ul class="list-unstyled components ">
                <li>
                    <a href="./../../" >
                        <i class="fas fa-tachometer-alt"></i>
                        Dash board
                    </a>
                </li>
                <li class="active">
                    <a href="#">
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
                <div class="card-header bg-info">
                 <h3 class="text-light">New Loan Details Form</h3> 
                </div>
                <div class="card-body">
                    <form action="add.php" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="col-md-4">
                                <label>Guardian Name</label> 
                                <input type="text" class="form-control" name="guardianName" required>
                            </div>
                            <div class="col-md-4">
                                <label>Date</label>
                                <input type="date" class="form-control" name="date" id="datePicker" required>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <label>Mobile No</label>
                                <input type="number" class="form-control" name="mobileNo" required>
                            </div>
                            <div class="col-md-6">
                                <label>Alternate Mobile No</label>
                                <input type="number" class="form-control" name="aMobileNo">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Loan Amount</label>
                                <input type="text" class="form-control" name="loanAmount" required>
                            </div>
                            <div class="col-md-4">
                                <label>Interest</label>
                                <input type="number" class="form-control" name="interest" required>
                            </div>
                            <div class="col-md-4">
                                <label>Initial Pay</label>
                                <input type="text" class="form-control" name="paidInterest">
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-12">
                                <label>Notes</label>
                                <textarea class="form-control" name="notes"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-success" style="width: 100%;" >Submit</button>
                            </div>
                            <div class="col-md-2">
                                <button type="reset" class="btn btn-mute">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
           </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- Common Script-->
    <script type="text/javascript" src="../../common/common.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>