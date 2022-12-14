<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo"><a href="">
                        <?php if ($_SESSION['user_role'] == 0) { ?>
                            <span>User Dashboard</span>
                        <?php } ?>
                        <?php if ($_SESSION['user_role'] == 1) { ?>
                            <span>Admin Dashboard</span>
                        <?php } ?>
                        <?php if ($_SESSION['user_role'] == 2) { ?>
                            <span>Doctor Dashboard</span>
                        <?php } ?>
                        <?php if ($_SESSION['user_role'] == 3) { ?>
                            <span>Medicine Company</span>
                        <?php } ?>


                    </a>

                </div>
                <li class="label">Main</li>
                <!-- <li>
                    <a class="sidebar-sub-toggle"><i class="ti-home"></i> Dashboard
                        <span class="badge badge-primary"></span>
                        <span class="sidebar-collapse-icon ti-angle-down"></span>
                    </a>
                    <ul>
                        <li><a href="index.html">Dashboard 1</a></li>
                    </ul>
                </li> -->

                <?php if ($_SESSION['user_role'] == 1) { ?>

                    <li>
                        <a class="sidebar-sub-toggle"><i class="ti-home2"></i> Manage Doctor
                            <span class="badge badge-primary"></span>
                            <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="add_doctor.php"> Add Doctor</a></li>
                            <li><a href="doctor_list.php">Manage Doctor</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"><i class="ti-home2"></i> Manage Pharmaceutical
                            <span class="badge badge-primary"></span>
                            <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="add_pharmaceutical.php"> Add Pharmaceutical</a></li>
                            <li><a href="pharmaceutical_list.php">Manage Pharmaceutical</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"><i class="ti-home2"></i> Manage Blog
                            <span class="badge badge-primary"></span>
                            <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="add_blog.php"> Add Blog</a></li>
                            <li><a href="manage_blog.php">Manage Blog</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"><i class="ti-home2"></i>Report
                            <span class="badge badge-primary"></span>
                            <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="monthly_patient.php"> Monthly Patient </a></li>
                            <li><a href="monthly_earn.php">Monthly Earn</a></li>
                        </ul>
                    </li>
                 
                <?php } ?>

                </li>
                <?php if ($_SESSION['user_role'] == 2) { ?>
                    <li>
                        <a class="sidebar-sub-toggle"><i class="ti-home2"></i> Manage Profile
                            <span class="badge badge-primary"></span>
                            <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="doc_profile.php"> Profile</a></li>
                            <li><a href="update_profile.php">Update Profile</a></li>
                            <li><a href="change_pass.php">Change Password</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"><i class="ti-home3"></i> Manage Schedule
                            <span class="badge badge-primary"></span>
                            <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="set_schedule.php"> Manage Schedule</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"><i class="ti-home3"></i> Manage Appointment List
                            <span class="badge badge-primary"></span>
                            <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="patient_appointment.php"> Appointment List</a></li>
                        </ul>
                    </li>
                    <!-- <li>
                        <a class="" href="set_schedule.php"><i class="ti-home3"></i> Manage Schedule</a>
                    </li> -->

                <?php } ?>


                <?php if ($_SESSION['user_role'] == 3) { ?>
                    <li><a class="sidebar-sub-toggle"><i class="ti-target"></i> Medicine Company <span class="sidebar-collapse-icon ti-angle-down"></span></a>

                        <ul>
                            <li><a href="add_medicine.php">Add Medicine</a></li>
                            <li><a href="medicine_list.php">Medicine List</a></li>

                        </ul>
                    </li>
                <?php } ?>

                <li><a href="../sign_out.php"> <i class=" ti-power-off"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</div>