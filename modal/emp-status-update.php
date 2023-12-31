<!-- Change Status Modal HTML -->
<div class="modal fade" id="empstatusupdate_modal<?php echo $row['Fld_RecID']?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="function.php">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Employee Status</h4>
                        
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>

                    <div class="modal-body">
                       
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="Fld_Status">Employee Status</label>
                                <input type="hidden" name="Fld_RecID" value="<?php echo $row['Fld_RecID']?>"/>
            
                                <select class="form-control" name="Fld_Status" value="<?php echo $row['Fld_Status']?>">
                                    <?php
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
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button name="UpdateStatusEmployee" class="btn btn-info"  >Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


     <!-- Add Employee -->
 <div class="modal fade full-window-modal" id="empupdate_modal<?php echo $row['Fld_RecID']?>" aria-hidden="true">
        <div class="modal-dialog">
            <form class="function.php" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Employee Record</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <!-- Put employee record here -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Fld_FirstName">First Name</label>
                                    <input type="hidden" name="Fld_RecID" value="<?php echo $row['Fld_RecID']?>"/>
							
                                    <input type="text" class="form-control form-control-uppercase" name="Fld_FirstName" value="<?php echo $row['Fld_FirstName']?>" placeholder="First Name" required="required"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Fld_MiddleName">Middel Name</label>
                                    <input type="text" class="form-control form-control-uppercase" name="Fld_MiddleName" value="<?php echo $row['Fld_MiddleName']?>" placeholder="Middle Name" required="required"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Fld_LastName">Last Name</label>
                                    <input type="text" class="form-control form-control-uppercase" name="Fld_LastName" value="<?php echo $row['Fld_LastName']?>" placeholder="Last Name" required="required"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Fld_Birthday">Birth Date</label>
                                    <input id="dropper-animation" class="form-control" type="date" name="Fld_Birthday" value="<?php echo $row['Fld_Birthday']?>" placeholder="Birthday" required="required"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Fld_Gender">Gender</label>
                                    <select class="form-control" name="Fld_Gender">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Fld_Address">Address</label>
                                    <input class="form-control form-control-uppercase" type="text" name="Fld_Address" value="<?php echo $row['Fld_Address']?>" placeholder="Address" required="required"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Fld_ContactNumber">Contact Number</label>
                                    <input class="form-control form-control-uppercase" type="text" name="Fld_ContactNumber" value="<?php echo $row['Fld_ContactNumber']?>" placeholder="Contact Number" required="required"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Fld_EmployeeID">Employee ID</label>
                                    <input type="text" class="form-control form-control-uppercase" name="Fld_EmployeeID" value="<?php echo $row['Fld_EmployeeID']?>" placeholder="Employee ID" required="required"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Fld_DateHired">Date Hired</label>
                                    <input type="date" class="form-control" name="Fld_DateHired" value="<?php echo $row['Fld_DateHired']?>" placeholder="Date Hired" required="required"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Fld_Position">Position</label>
                                    <select class="form-control" name="Fld_Position" required="required">
                                        <?php

                                        $users = $conn->query("SELECT * FROM tbl_position");
                                        $i = 1;
                                        while ($row = $users->fetch_assoc()) :
                                        ?>
                                            <option class="form-control form-control-uppercase"></option>
                                        <?php endwhile; ?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Fld_Status">Status</label>
                                    <select class="form-control select2" name="Fld_Status" required="required">
                                        <?php

                                        $users = $conn->query("SELECT * FROM tbl_emp_status");
                                        $i = 1;
                                        while ($row = $users->fetch_assoc()) :
                                        ?>
                                            <option class="form-control form-control-uppercase"></option>
                                        <?php endwhile; ?>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Fld_JobDesc">Job Description</label>
                            <textarea class="form-control html-editor" rows="10" name="Fld_JobDesc"value="<?php echo $row['Fld_JobDesc']?>" ></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" name="UpdateEmployee">Save changes</button>
                    </div>
                </div>
            </form>
        </div>

    </div>