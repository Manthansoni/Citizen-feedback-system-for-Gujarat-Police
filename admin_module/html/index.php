<?php 
    session_start();

    if(!isset($_SESSION['loginSuccess'])){
        header("Location:login.php");
    }

    include ("connection.php");

        $qry2 = "SELECT count(`fID`) FROM feedback where `status`=0";
        $q2 = mysqli_query($con, $qry2);
        $f = mysqli_fetch_assoc($q2);
        // var_dump($f);
        // exit;
        $fcount = $f['count(`fID`)'];

        $qry3 = "SELECT count(`cID`) FROM complaint where `status`=0";
        $q3 = mysqli_query($con, $qry3);
        $c = mysqli_fetch_assoc($q3);
        // var_dump($f);
        // exit;
        $ccount = $c['count(`cID`)'];

        if($ccount != 0 && $ccount != 0){
            echo "<script> alert('Hello sir, you have total {$fcount} feedbacks and {$ccount} complaints unread'); </script>";
            $_SESSION['unread']="yes";
        }
        
    
        $qry = "SELECT `area`,count(`refNo`) FROM feedback group by `area`";
        $q = mysqli_query($con, $qry);
        $area=[];
        $feedcount = [];
        while($f = mysqli_fetch_assoc($q)){
            $area[] = $f['area'];    
            $feedcount[] = $f['count(`refNo`)'];
        }
        // var_dump($area);
        // print_r($feedcount);
        // exit();
    
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Flexy lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Flexy admin lite design, Flexy admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Flexy Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Admin of Gujarat Police Department</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo-icon.png">
    <!-- Custom CSS -->
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
       <?php require 'header.php' ;?>

      
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h1 class="mb-0 fw-bold">Dashboard</h1>
                        <!-- <h3 class="mb-0" style="font-size: 15px; font-weight:1;">Sabarmati Police Station</h3> -->
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Feedbacks</h4>
                                        
                                    </div>
                                    <!-- <div class="ms-auto d-flex no-block align-items-center">
                                        <ul class="list-inline dl d-flex align-items-center m-r-15 m-b-0">
                                            <li class="list-inline-item d-flex align-items-center text-info"><i
                                                    class="fa fa-circle font-10 me-1"></i> General
                                            </li>
                                            <li class="list-inline-item d-flex align-items-center text-primary"><i
                                                    class="fa fa-circle font-10 me-1"></i> Cyber
                                            </li>
                                        </ul>
                                    </div> -->
                                </div>
                                <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
                                <!-- <div class="amp-pxl mt-4" style="height: 350px;">
                                   
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Weekly Stats</h4>
                                <h6 class="card-subtitle">Average Crime</h6>
                                <div class="mt-5 pb-3 d-flex align-items-center">
                                    <span class="btn btn-primary btn-circle d-flex align-items-center">
                                        <i class="m-r-10 mdi mdi-chart-areaspline fs-4"></i>
                                    </span>
                                    <div class="ms-3">
                                        <h5 class="mb-0 fw-bold">Top Reviews</h5>
                                        <span class="text-muted fs-6">Positive</span>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="badge bg-light text-muted">+47%</span>
                                    </div>
                                </div>
                                <div class="py-3 d-flex align-items-center">
                                    <span class="btn btn-warning btn-circle d-flex align-items-center">
                                        <i class="mdi mdi-star-circle fs-4"></i>
                                    </span>
                                    <div class="ms-3">
                                        <h5 class="mb-0 fw-bold">Best Area</h5>
                                        <span class="text-muted fs-6">Satellite</span>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="badge bg-light text-muted">+71%</span>
                                    </div>
                                </div>
                                <div class="py-3 d-flex align-items-center">
                                    <span class="btn btn-success btn-circle d-flex align-items-center">
                                        <i class="m-r-10 mdi mdi-debug-step-out fs-4 text-white"></i>
                                    </span>
                                    <div class="ms-3">
                                        <h5 class="mb-0 fw-bold">Most Active Area</h5>
                                        <span class="text-muted fs-6">Shastrinagar</span>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="badge bg-light text-muted">+57%</span>
                                    </div>
                                </div>
                                <div class="py-3 d-flex align-items-center">
                                    <span class="btn btn-info btn-circle d-flex align-items-center">
                                        <i class="m-r-10 mdi mdi-seat-individual-suite fs-4 text-white"></i>
                                    </span>
                                    <div class="ms-3">
                                        <h5 class="mb-0 fw-bold">Top Crime</h5>
                                        <span class="text-muted fs-6">Accident</span>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="badge bg-light text-muted">+75%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex">
                                    <div>
                                        <h4 class="card-title">Top Reviews</h4>
                                        <h5 class="card-subtitle">Overview Latest Reviews</h5>
                                    </div>
                                    <div class="ms-auto">
                                        <div class="dl">
                                            <select class="form-select shadow-none">
                                                <option value="0" selected>Weekly</option>
                                                <option value="1">Daily</option>
                                                <option value="2">Monthly</option>
                                                <option value="3">Yearly</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- title -->
                                <div class="table-responsive">
                                    <table class="table mb-0 table-hover align-middle text-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Reviews</th>
                                                <th class="border-top-0">Date</th>
                                                <th class="border-top-0">Pin Code</th>
                                                <th class="border-top-0">Location</th>
                                                <th class="border-top-0">Timing</th>
                                                <th class="border-top-0">Refrence Number</th>
                                                <th class="border-top-0">Rating</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="">
                                                            <h4 class="m-b-0 font-16">Great Service</h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>01 - 09</td>
                                                <td>380005</td>
                                                <td>
                                                    <label class="badge bg-danger">Kabir Chowk</label>
                                                </td>
                                                <td>10:00 PM</td>
                                                <td>RF001</td>
                                                <td>
                                                    <h5 class="m-b-0">😊</h5>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="">
                                                            <h4 class="m-b-0 font-16">Fast Solve</h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>28 - 08</td>
                                                <td>320008</td>
                                                <td>
                                                    <label class="badge bg-info">Maninagar</label>
                                                </td>
                                                <td>12:36 PM</td>
                                                <td>RF012</td>
                                                <td>
                                                    <h5 class="m-b-0">😊</h5>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="">
                                                            <h4 class="m-b-0 font-16">Bad Behaviour</h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>22 - 08</td>
                                                <td>380002</td>
                                                <td>
                                                    <label class="badge bg-success">N C Market</label>
                                                </td>
                                                <td>08:10 AM</td>
                                                <td>RF011</td>
                                                <td>
                                                    <h5 class="m-b-0">😡</h5>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="">
                                                            <h4 class="m-b-0 font-16">No Respond</h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>18 - 08</td>
                                                <td>380013</td>
                                                <td>
                                                    <label class="badge bg-purple">Naranpura Vistar</label>
                                                </td>
                                                <td>01:11 PM</td>
                                                <td>RF101</td>
                                                <td>
                                                    <h5 class="m-b-0">😡</h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        var xValues = <?php echo json_encode($area); ?>;
        var yValues = <?php echo json_encode($feedcount); ?>;
        var barColors = ["red", "green","blue","orange"];

        new Chart("myChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            }]
        },
        options: {
            legend: {display: false},
            title: {
            display: true,
            text: "Feedbacks for Gujarat Police"
            }
        }
        });
    </script>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/waves.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <script src="../dist/js/custom.js"></script>
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>