<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Employee | ePMS</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="../favicon.ico" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="../plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../plugins/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="../plugins/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href="../plugins/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="../plugins/weather-icons/css/weather-icons.min.css">
    <link rel="stylesheet" href="../dist/css/theme.min.css">
    <script src="../src/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="wrapper">
        <header class="header-top" header-theme="dark">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <div class="top-menu d-flex align-items-center">
                        <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                        <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
                    </div>
                    <div class="top-menu d-flex align-items-center">
                        <!-- This line is for user profile -->

                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="../img/user.jpg" alt=""></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.html"><i class="ik ik-user dropdown-icon"></i>
                                    Profile</a>
                                <a class="dropdown-item" href="login.html"><i class="ik ik-power dropdown-icon"></i>
                                    Logout</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>
        <!-- NAVIGATION MENU vvv -->
        <div class="page-wrap">
            <div class="app-sidebar colored">
                <div class="sidebar-header">
                    <a class="header-brand" href="index.html">
                        <div class="logo-img">
                            <img src="../src/img/brand-white.svg" class="header-brand-img" alt="lavalite">
                        </div>
                        <span class="text">ePAYROLL</span>
                    </a>
                    <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                    <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                </div>

                <div class="sidebar-content">
                    <div class="nav-container">
                        <nav id="main-menu-navigation" class="navigation-main">
                           
                            <div class="nav-item">
                                <a href="../index.html"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                            </div>
                            <div class="nav-lavel">Employee Management</div>
                            <div class="nav-item active">
                                <a href="employee.php"><i class="ik ik-users"></i><span>Employee</span></a>
                            </div>
                            <div class="nav-lavel">Payroll Management</div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="main-content">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                                <div class="page-header-title">
                                    <i class="ik ik-users bg-blue"></i>
                                    <!-- NAVIGATION MENU ^^^^ -->
                                    <div class="d-inline">
                                        <h5>Emloyee</h5>
                                        <span>Make Employee Management Extremely Simple</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <nav class="breadcrumb-container" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="../index.html"><i class="ik ik-home"></i></a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Employee</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Put content here -->

                    <!-- Pusadasda -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header d-block">
                                    <h3>Employee List</h3>
                                </div>
                                <div class="card-body">
                                    <div class="dt-responsive" >
                                        <table id="data_table" class="table table-hover table-striped table-bordered nowrap">
                                            <thead>
                                                <tr style="text-align: center;">
                                                    <th>Employee ID</th>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Status</th>
                                                    <th class="nosort">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'db-config.php';
                                                $users = $conn->query("SELECT * FROM tbl_employee");
                                                $i = 1;
                                                while ($row = $users->fetch_assoc()) :
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['Fld_EmployeeID']; ?> </td>
                                                        <td><?php echo $row['Fld_FirstName']; ?> <?php echo $row['Fld_MiddleName']; ?> <?php echo $row['Fld_LastName']; ?></td>
                                                        <td><?php echo $row['Fld_Position']; ?></td>
                                                        <td><?php echo $row['Fld_Status']; ?></td>
                                                        <td>
                                                            <div class="table-actions" style="text-align: center;">
                                                                <a href="emp-file.php?id=<?php echo $row['Fld_RecID']; ?>" style="color: blue;"><i class="ik ik-folder-minus"></i></a>
                                                                <a href="edit.php?id=<?php echo $row['Fld_RecID']; ?>" style="color: green;"><i class="ik ik-edit-2"></i></a>
                                                                <a href="delete.php?id=<?php echo $row['Fld_RecID']; ?>" style="color: red;"><i class="ik ik-trash-2"></i></a>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <footer class="footer">
                <div class="w-100 clearfix">
                    <span class="text-center text-sm-left d-md-inline-block">Copyright © 2018 ThemeKit v2.0. All Rights
                        Reserved.</span>
                    <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Crafted with <i class="fa fa-heart text-danger"></i> by <a href="http://lavalite.org/" class="text-dark" target="_blank">Lavalite</a></span>
                </div>
            </footer>
        </div>
    </div>




    <div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="quick-search">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 ml-auto mr-auto">
                                <div class="input-wrap">
                                    <input type="text" id="quick-search" class="form-control" placeholder="Search..." />
                                    <i class="ik ik-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="../src/js/vendor/jquery-3.3.1.min.js"><\/script>')
    </script>
    <script src="../plugins/popper.js/dist/umd/popper.min.js"></script>
    <script src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="../plugins/screenfull/dist/screenfull.js"></script>
    <script src="../dist/js/theme.min.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b, o, i, l, e, r) {
            b.GoogleAnalyticsObject = l;
            b[l] || (b[l] =
                function() {
                    (b[l].q = b[l].q || []).push(arguments)
                });
            b[l].l = +new Date;
            e = o.createElement(i);
            r = o.getElementsByTagName(i)[0];
            e.src = 'https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e, r)
        }(window, document, 'script', 'ga'));
        ga('create', 'UA-XXXXX-X', 'auto');
        ga('send', 'pageview');
    </script>
</body>

</html>