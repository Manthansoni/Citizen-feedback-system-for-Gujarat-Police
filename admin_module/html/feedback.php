<?php
error_reporting(E_ALL ^ E_NOTICE);  
    include ("connection.php");
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
    <title>Flexy Admin Lite Template by WrapPixel</title>
    <!-- <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" /> -->
    <!-- Favicon icon -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo-icon.png"> -->
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    
    

 

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

        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h1 class="mb-0 fw-bold">Feedbacks</h1>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- <div class="card-body">
                            <table>
                                <tr>
                                <td>
                                <label class="col-sm-12">Select Area&nbsp;&nbsp;&nbsp;</label>
                                </td>
                                <td>

                                    <div class="col-sm-2">        
                                        <select class="form-select shadow-none" style="width: 150px; margin-right:50px">
                                            <option value="Select Date">Select Date</option>
                                            <option>London</option>
                                            <option>India</option>
                                            <option>Usa</option>
                                            <option>Canada</option>
                                            <option>Thailand</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                <label class="col-sm-12">Select City&nbsp;&nbsp;&nbsp;</label>
                                </td>
                                <td>
                                    <div class="col-sm-2">
                                        
                                        <select class="form-select shadow-none" style="width: 150px; margin-right:50px">
                                            <option value="Select Date">Select Date</option>
                                            <option>London</option>
                                            <option>India</option>
                                            <option>Usa</option>
                                            <option>Canada</option>
                                            <option>Thailand</option>
                                        </select>
                                    </div>
                                </td>
                                
                                </tr>
                            </table> 
                                    
                            </div> -->
                            <div class="table-responsive">
                                <table class="table table-striped" id="ft" name="ft">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sr. No.</th>
                                            <th scope="col">Area</th>
                                            <th scope="col">City</th>
                                            <th scope="col">Indian Citizen</th>
                                            <th scope="col">How did you came to the police station?</th>
                                            <th scope="col">After how much time you were heard in police station?</th>
                                            <th scope="col">Behaviour of Officers?</th>
                                            <th scope="col">Feedback</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php
                                                $qry2 = "SELECT * FROM feedback ";
					                            $q2 = mysqli_query($con, $qry2);
                                                $i=1;
					                            while ($fetch = mysqli_fetch_assoc($q2)) {
                                                    $fid=$fetch['fID'];
                                                    $qry3 = "UPDATE `feedback` SET `status`=1 where `fID`='$fid'";
					                                $q3 = mysqli_query($con, $qry3);
                                                    
                                                    
                                                    echo "<tr>";
                                                    echo "<td>" .$i. "</td>";
						                            echo "<td>" . $fetch['area'] .  "</td>";
                                                    echo "<td>" . $fetch['city'] .  "</td>";
                                                    echo "<td>" . $fetch['indian'] .  "</td>";
                                                    echo "<td>" . $fetch['ques1'] .  "</td>";
                                                    echo "<td>" . $fetch['ques2'] .  "</td>";
                                                    echo "<td>" . $fetch['ques3'] .  "</td>";
                                                    echo "<td>" . $fetch['ques4'] .  "</td>";
                                                    $i++;
                                                    echo "</tr>";
					                            }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <input type="button" id="btnExport" value="Export" style="width:100px ;"/>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">
        $("body").on("click", "#btnExport", function () {
            html2canvas($('#ft')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("feedback-details.pdf");
                }
            });
        });
    </script>
    <!-- <script>
    $(document).ready(function() {
        $('table#').DataTable({
            dom: 'Bfrtip',
            paging: true,
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            buttons: [
                'pageLength', 'copy',

                {
                    extend: 'csvHtml5',
                    title: 'student_report'
                },

                {
                    extend: 'excelHtml5',
                    title: 'student_report'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'student_report'
                }, 'print'
            ],
            order : [[0,'asc']],
            responsive: true
        });
        $('#myTable1,#myTable2').show();
    });
</script>  -->

    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../dist/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.js"></script>
</body>

</html>