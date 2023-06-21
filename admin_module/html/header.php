<head>
    <link rel="stylesheet" href="style.css">
</head>


<body>
<header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon -->
                        <b class="logo-icon" >
                            <img src="../assets/images/satyamev-jayate.png" alt="homepage" style="margin-left:20px;" class="dark-logo" height="60" width="150"/>
                            <!-- Light Logo icon -->
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        
                    </a>
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- <ul class="navbar-nav float-start me-auto">
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                                href="javascript:void(0)"><i class="mdi mdi-magnify me-1"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                            </form>
                        </li>
                    </ul> -->
                    <ul class="navbar-nav float-start me-auto">
                    <b class="logo-icon">
                            <img src="../assets/images/images.png" alt="homepage" class="dark-logo" width="55" height="70" style="margin:5PX ;"/>
                            <!-- Light Logo icon -->
                            <!-- <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" /> -->
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->&nbsp;
                            <img src="../assets/images/header_gpd.png" style="margin-top:30px;" alt="homepage" class="dark-logo" height="20" width="350" />
                            <!-- Light Logo text -->
                            
                        </span>
                    </ul>
                    <ul class="navbar-nav float-end">
                        <li class="nav-item dropdown">
                            <button class="logout" onclick="logout()" title="Logout"><img src="../assets/images/logout.jpg" alt="user" width="40px" /> </button>
                        </li>
                    </ul>
                </div>
            </nav>
        </header><hr>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="index.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="pages-profile.php" aria-expanded="false"><i
                                    class="mdi mdi-account-network"></i><span class="hide-menu">Profile</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="feedback.php" aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                    class="hide-menu">Feedbacks</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="complaint.php" aria-expanded="false"><i class="mdi mdi-face"></i><span
                                    class="hide-menu">Complaints</span></a></li>
                    </ul>

                </nav>
            </div>
        </aside>

        <script>
        function logout(){
            alert("logout sucess");
            <?php $_SESSION['logout'] = 'Yes'; ?>
            window.location.href = "logout.php";
            // $.ajax({
            //     url: "login.php",
            //     data: { logout: $lg}
            // });
        }
    </script>

</body>