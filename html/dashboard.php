<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title> Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        var cnt;
        var uA = [];
        var uB = [];

        $(document).ready(function() {

            // FETCHING DATA FROM JSON FILE (DynamoDB)
            $.getJSON("https://ogqyobkeo2.execute-api.us-east-1.amazonaws.com/dev/demoFunction?TableName=tenant_info",
                function(data) {
                    var student = '';
                    var cols = data['Items'];
                    var usr = data['Count'];
                    document.getElementById('usr').innerText = usr;
                    //inserting user count into 'Active USer' field
                });
        });
    </script>
    <?php
    include_once('Head.php')
    ?>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <?php include_once('Topnavbar.php'); ?>
    <?php include_once('Leftmenu.php') ?>

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                    <br>
                    <section id="statistics-card">
                        <div class="row">
                            <div class="col-xl-6 col-md-10 col-sm-8">
                                <div class="card">
                                    <div class="card-header d-flex align-items-start pb-0">
                                        <canvas id="pie-chart" width="200" height="75"></canvas><br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-10 col-sm-8">
                                <div class="card">
                                    <div class="card-header d-flex align-items-start pb-0">
                                        <canvas id="bar-chart-horizontal" width="200" height="82"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 col-sm-6">
                                <div class="card">
                                    <div class="card-header d-flex align-items-start pb-0">
                                        <div>
                                            <h2 class="text-bold-700 mb-0">17%</h2>
                                            <p>Database Usage</p>
                                        </div>
                                        <div class="avatar bg-rgba-primary p-50 m-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-cpu text-primary font-medium-5"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header d-flex align-items-start pb-0">
                                        <div>
                                            <h2 class="text-bold-700 mb-0">4.69 MB</h2>
                                            <p>Memory Usage</p>
                                        </div>
                                        <div class="avatar bg-rgba-success p-50 m-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-server text-success font-medium-5"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header d-flex align-items-start pb-0">
                                        <div>
                                            <h2 class="text-bold-700 mb-0">0.2%</h2>
                                            <p>Downtime Ratio</p>
                                        </div>
                                        <div class="avatar bg-rgba-danger p-50 m-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-activity text-danger font-medium-5"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header d-flex align-items-start pb-0">
                                        <div>
                                            <h2 class="text-bold-700 mb-0" id="usr"></h2>
                                            <p class="mb-0">Active Users</p>
                                        </div>
                                        <div class="avatar bg-rgba-success p-50">
                                            <div class="avatar-content">
                                                <i class="feather icon-user-check text-success font-medium-5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div id="line-area-chart-6"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header d-flex align-items-start pb-0">
                                        <div>
                                            <h2 class="text-bold-700 mb-0">248</h2>
                                            <p class="mb-0">Total requests</p>
                                        </div>
                                        <div class="avatar bg-rgba-success p-50">
                                            <div class="avatar-content">
                                                <i class="feather icon-monitor text-primary font-medium-5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div id="line-area-chart-6"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header d-flex align-items-start pb-0">
                                        <div>
                                            <h2 class="text-bold-700 mb-0">52</h2>
                                            <p class="mb-0">User pools requests</p>
                                        </div>
                                        <div class="avatar bg-rgba-success p-50">
                                            <div class="avatar-content">
                                                <i class="feather icon-users text-primary font-medium-5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div id="line-area-chart-6"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header d-flex align-items-start pb-0">
                                        <div>
                                            <h2 class="text-bold- mb-0">2%</h2>
                                            <p class="mb-0">Site Traffic</p>
                                        </div>
                                        <div class="avatar bg-rgba-primary p-50">
                                            <div class="avatar-content">
                                                <i class="feather icon-monitor text-primary font-medium-5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div id="line-area-chart-5"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header d-flex align-items-start pb-0">
                                        <div>
                                            <h2 class="text-bold-700 mb-0">0</h2>
                                            <p>Issues Found</p>
                                        </div>
                                        <div class="avatar bg-rgba-warning p-50 m-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-alert-octagon text-warning font-medium-5"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </section>
                </section>
                <!-- Dashboard Analytics end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <?php include_once('Footer.php'); ?>
</body>
<!-- END: Body-->

<!-- BEGIN: Script-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
    var cnt;

    // Generating Pie-Chart Graph from data
    new Chart(document.getElementById("pie-chart"), {
        type: 'pie',
        data: {
            labels: ["Tenant-A", "Tenant-B", "Admin"],
            datasets: [{
                label: "Count",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#c45850"],
                data: [5, 4, 1]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Tenant Details'
            }
        }
    });

    // Generating bar-chart Graph from data
    new Chart(document.getElementById("bar-chart-horizontal"), {
        type: 'horizontalBar',
        data: {
            labels: ["Developer", "Finance", "Sales", "Production"],
            datasets: [{
                label: "Counts (In-person)",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#c45850"],
                data: [3, 2, 1, 4]
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Total User per department'
            }
        }
    });
</script>
<!-- END: Script-->


</html>