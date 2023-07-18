<?php
require_once 'function.php';

// Save data when the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Fld_EmployeeID = $_POST['Fld_EmployeeID'];
    $Fld_FirstName = $_POST['Fld_FirstName'];
    $Fld_MiddleName = $_POST['Fld_MiddleName'];
    $Fld_LastName = $_POST['Fld_LastName'];
    $Fld_Gender = $_POST['Fld_Gender'];
    $Fld_Age = $_POST['Fld_Age'];
    $Fld_DateHired = $_POST['Fld_DateHired'];
    $Fld_Birthday = $_POST['Fld_Birthday'];
    $Fld_Address = $_POST['Fld_Address'];
    $Fld_ContactNumber = $_POST['Fld_ContactNumber'];
    $Fld_Position = $_POST['Fld_Position'];
    $Fld_JobDesc = $_POST['Fld_JobDesc'];
    $Fld_Status = $_POST['Fld_Status'];

    $success = createEmployee($Fld_EmployeeID, $Fld_FirstName, $Fld_MiddleName, $Fld_LastName, $Fld_Gender, $Fld_Age, $Fld_Birthday, $Fld_Address, $Fld_ContactNumber, $Fld_DateHired, $Fld_Position, $Fld_JobDesc, $Fld_JobDesc);

    if ($success) {
        echo "Data saved successfully.";
    } else {
        echo "Error saving data.";
    }
}
?>

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
    <link rel="stylesheet" href="../plugins/datedropper/datedropper.min.css">
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="../plugins/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="../plugins/summernote/dist/summernote-bs4.css">
    <script src="../src/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
 
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
                                <a href="#"><i class="ik ik-home"></i></a>
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
                        <button class="btn btn-primary btn-sm btn-block col-md-1 float-right" data-toggle="modal" type="button" data-target="#new_emp_btn"><span class="fa fa-plus"></span> Add Employee</button>

                    </div>

                    <div class="card-body">
                        <div class="#">
                            <table id="dt-responsive" class="table table-hover table-bordered nowrap data_table"> <!-- table-hover table-striped table-bordered nowrap -->
                                <thead>
                                    <tr>
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
                                            <td><?php echo $row['Fld_FirstName']; ?> <?php echo $row['Fld_MiddleName']; ?>. <?php echo $row['Fld_LastName']; ?></td>
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
    <!-- Add Employee -->
    <div class="modal fade full-window-modal" id="new_emp_btn" tabindex="-1" role="dialog" aria-labelledby="new_emp_btn" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="new_emp_btn">Update Employee List</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <!-- Put employee record here -->



                    <form class="forms-sample" method="POST">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Fld_FirstName">First Name</label>
                                    <input type="text" class="form-control" id="Fld_FirstName" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Fld_MiddleName">Middel Name</label>
                                    <input type="text" class="form-control" id="Fld_MiddleName" placeholder="Middle Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Fld_LastName">Last Name</label>
                                    <input type="text" class="form-control" id="Fld_LastName" placeholder="Last Name">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Fld_Birthday">Birth Date</label>
                                    <input id="dropper-animation" class="form-control" type="date" id="Fld_Birthday" placeholder="Birthday" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Fld_Gender">Gender</label>
                                    <select class="form-control" id="Fld_Gender">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Fld_Address">Address</label>
                                    <input class="form-control" type="text" id="Fld_Address" placeholder="Address" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Fld_ContactNumber">Contact Number</label>
                                    <input class="form-control" type="text" id="Fld_ContactNumber" placeholder="Contact Number" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Fld_EmployeeID">Employee ID</label>
                                    <input type="text" class="form-control" id="Fld_EmployeeID" placeholder="Employee ID">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Fld_DateHired">Date Hired</label>
                                    <input type="date" class="form-control" id="Fld_DateHired" placeholder="Date Hired">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Fld_Position">Position</label>
                                    <select class="form-control select2" id="Fld_Position">
                                        <?php
                                        include 'db-config.php';
                                        $users = $conn->query("SELECT * FROM tbl_position");
                                        $i = 1;
                                        while ($row = $users->fetch_assoc()) :
                                        ?>
                                            <option><?php echo $row['Fld_PositionName']; ?></option>
                                        <?php endwhile; ?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Fld_Status">Status</label>
                                    <select class="form-control select2" id="Fld_Status">
                                        <?php
                                        include 'db-config.php';
                                        $users = $conn->query("SELECT * FROM tbl_emp_status");
                                        $i = 1;
                                        while ($row = $users->fetch_assoc()) :
                                        ?>
                                            <option><?php echo $row['Fld_Status']; ?></option>
                                        <?php endwhile; ?>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jobdesc">Job Description</label>
                            <textarea class="form-control html-editor" rows="10" id="jobdesc"></textarea>
                        </div>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <!--  <div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
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
    </div> -->

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="../src/js/vendor/jquery-3.3.1.min.js"><\/script>')
    </script>
    <script src="../plugins/popper.js/dist/umd/popper.min.js"></script>
    <script src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="../plugins/screenfull/dist/screenfull.js"></script>
    <script src="../dist/js/theme.min.js"></script>
    <script src="../plugins/datedropper/datedropper.min.js"></script>
    <script src="../js/form-picker.js"></script>
    <script src="../plugins/select2/dist/js/select2.min.js"></script>
    <script src="../plugins/summernote/dist/summernote-bs4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#new_emp_btn').click(function() {
                uni_modal("New Employee", "manage-employee.php")
            })


        });
    </script>
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