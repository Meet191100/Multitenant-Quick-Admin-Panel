<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title>Task Management</title>
    <?php include_once('Head.php'); ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <?php include_once('topbar2.php'); ?>
    <?php include_once('leftbar2.php'); ?>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- page users view start -->
                <section class="page-users-view">
                    <div class="row">
                        <!-- account start -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title d-flex" style="color:#7367f0">Task List</div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Table  -->
                                        <div class="col-12 col-sm-9 col-md-10 col-lg-10 table-responsive mx-auto">
                                            <table id='table' class="table table-bordered table-hover w-auto mx-auto">
                                                <!-- HEADING FORMATION -->
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Name</th>
                                                        <th>Task</th>
                                                        <th>Status</th>
                                                    </tr>
                                                <tbody>
                                                </tbody>
                                                </thead>
                                                <script src="https://code.jquery.com/jquery-3.5.1.js">
                                                </script>
                                                <script>
                                                    $(document).ready(function() {

                                                        // FETCHING DATA FROM JSON FILE 
                                                        $.getJSON("https://ogqyobkeo2.execute-api.us-east-1.amazonaws.com/dev/demoFunction?TableName=tenant_tasks",
                                                            function(data) {
                                                                var student = '';
                                                                var cols = data['Items'];
                                                                // ITERATING THROUGH OBJECTS 
                                                                $.each(cols, function(key, value) {

                                                                    //CONSTRUCTION OF ROWS HAVING 
                                                                    // DATA FROM JSON OBJECT 
                                                                    if (value.tenant_id == 'us-east-1_lj3qh5enJ') {


                                                                        student += '<tbody><tr>';
                                                                        student += '<td>' +
                                                                            value.tenant_id + '</td>';

                                                                        student += '<td>' +
                                                                            value.Name + '</td>';

                                                                        student += '<td>' +
                                                                            value.Task + '</td>';

                                                                        student += '<td>' +
                                                                            value.Status + '</td>';
                                                                    }
                                                                });

                                                                //INSERTING ROWS INTO TABLE 
                                                                $('#table').append(student);
                                                            });
                                                    });
                                                </script>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- account end -->
                        </div>
                    </div>
                </section>

                <!-- page users view end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <?php include_once('Footer.php'); ?>

</body>
<!-- END: Body-->

</html>