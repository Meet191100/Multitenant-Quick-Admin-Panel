<?php

?>
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="dashboard.php">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">DASHBOARD</h2>
                </a></li>
             <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li> 
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header"><span></span></li>

            <?php  ?>
            <li class=" nav-item"><a href="#"><i class="feather icon-user-check text-success font-medium-5"></i><span class="menu-title" data-i18n="User Management">User Management</span></a>
                <ul class="menu-content">
                    <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'Create-User-list.php' ? 'active' : ''; ?>">
                        <a href="user-View.php"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Creation of Users">Users List</span></a>
                    </li>
                    <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'Client-Manager.php' ? 'active' : ''; ?>">
                        <a href="tenantwise_users.php"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Roles and Responsibilities">Deparmentwise Users</span></a>
                    </li>
                    <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'Create-User-list.php' ? 'active' : ''; ?>">
                        <a href="Create-Client.php"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Creation of Users">Create User</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-monitor text-primary font-medium-5"></i><span class="menu-title" data-i18n="User Management">Task Management</span></a>
                <ul class="menu-content">
                    <!-- <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'Create-User-list.php' ? 'active' : ''; ?>">
                        <a href="user-View.php"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Creation of Users">Task List</span></a>
                    </li> -->
                    <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'Create-User-list.php' ? 'active' : ''; ?>">
                        <a href="tasks.php"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Creation of Users">Tasks</span></a>
                    </li>
                    <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'Client-Manager.php' ? 'active' : ''; ?>">
                        <a href="task-list.php"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Roles and Responsibilities">Check Task Status</span></a>
                    </li>
                    <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'Client-Manager.php' ? 'active' : ''; ?>">
                        <a href="assign_task.php"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Roles and Responsibilities">Assign Task</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-bar-chart text-danger font-medium-5"></i><span class="menu-title" data-i18n="User Management">Monitoring</span></a>
                <ul class="menu-content">
                    <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'Client-Manager.php' ? 'active' : ''; ?>">
                        <a href="https://cloudwatch.amazonaws.com/dashboard.html?dashboard=SGP-2021&context=eyJSIjoidXMtZWFzdC0xIiwiRCI6ImN3LWRiLTEwODA0OTM2NjkyNSIsIlUiOiJ1cy1lYXN0LTFfV0F1ZzBjQ2lUIiwiQyI6ImtibzlsbG02Mmh2dDYxdWoxcTMyc2hnYTciLCJJIjoidXMtZWFzdC0xOjMwNWU1MTMyLTIzZWEtNDIyZC05M2QwLTI0MTU2ZmMwYTE5NSIsIk0iOiJQdWJsaWMifQ=="><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Roles and Responsibilities">Statistics</span></a>
                    </li>
                </ul>
            </li>
            <?php  ?>
            <!-- <?php  ?>
                <li class=" nav-item"><a href="Raw-Material.php"><i class="feather icon-check-circle"></i><span
                            class="menu-title" data-i18n="User Management">Purchase</span></a>
                    <ul class="menu-content">
                        <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'Raw-Material.php' ? 'active' : ''; ?>">
                            <a href="Raw-Material.php"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Creation of Users">Raw Material</span></a>
                        </li>
                    </ul>
                </li>
            <?php  ?>
            <?php  ?>
            <li class=" nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'Preprocess.php' ? 'active' : ''; ?>"><a
                        href="../../4836112/html/Pre-Process.php"><i class="feather fa-database"></i><span
                            class="menu-title" data-i18n="Account setting">Preprocess</span></a></li><?php  ?>

            <?php  ?>
            <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'Soack.php' ? 'active' : ''; ?>"><a
                        href="Soack.php"><i class="feather icon-box"></i><span class="menu-item"
                                                                               data-i18n="Creation of Users">Soaking</span></a>
                </li><?php ?>
            <?php  ?>
            <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'Packing.php' ? 'active' : ''; ?>"><a
                        href="Packing.php"><i class="feather icon-check-square"></i><span class="menu-item"
                                                                                          data-i18n="Creation of Users">Packing</span></a>
                </li><?php  ?>
            <?php  ?>
            <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'Re-Packing.php' ? 'active' : ''; ?>"><a
                        href="Re-Packing.php"><i class="feather icon-check-square"></i><span class="menu-item"
                                                                                             data-i18n="Creation of Users">Re-Packing</span></a>
                </li><?php  ?>
            <?php   ?>
            <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'Report.php' ? 'active' : ''; ?>"><a
                            href="Report.php"><i class="feather icon-file-text"></i><span class="menu-item"
                                                                                          data-i18n="Creation of Users">Report</span></a>
                </li><?php  ?>
            <?php  ?>
            <li class=" nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'General-Setting.php' ? 'active' : ''; ?>">
                    <a href="General-Setting.php"><i class="feather icon-settings"></i><span
                            class="menu-title" data-i18n="Account setting">Account Setting</span></a></li><?php  ?> -->

        </ul>
    </div>
</div>