<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title>Task Management</title>
    <?php include_once('Head.php'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <?php include_once('Topnavbar.php'); ?>
    <?php include_once('Leftmenu.php'); ?>
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
                                    <div class="card-title d-flex" style="color:#7367f0">Tasks</div>
                                </div>
                                <div class="card-body">
                                    <div class="row mx-auto justify-content-center text-center">

                                        <div class="col-12 col-sm-9 col-md-12 col-lg-12 table-responsive ">
                                            <table id='table' class="table table-bordered table-hover w-auto mx-auto">
                                                <!-- tenant table-->
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Name</th>
                                                        <th>Task</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                <tbody>
                                                </tbody>
                                                </thead>
                                                <script src="https://code.jquery.com/jquery-3.5.1.js">
                                                </script>
                                                <script src="sweetalert2.all.min.js"></script>
                                                <script>
                                                    // function to fetch data from DynamoDB table                                              
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
                                                                    student += '<tbody><tr>';
                                                                    student += '<td>' +
                                                                        value.tenant_id + '</td>';

                                                                    student += '<td>' +
                                                                        value.Name + '</td>';

                                                                    student += '<td>' +
                                                                        value.Task + '</td>';

                                                                    student += '<td>' +
                                                                        value.Status + '</td>';
                                                                    student += '<td class="product-action"><button class="btn btn-primary waves-effect waves-light updatebtn" id="updatebtn">Update Task</button>   <button class="btn btn-success waves-effect waves-light updateSts">Update Status</button>   <button class="btn btn-danger waves-effect waves-light deleteSts">Delete Task</button></td></tr>';
                                                                });

                                                                //INSERTING ROWS INTO TABLE 
                                                                $('#table').append(student);
                                                            });

                                                    });


                                                    // UPDATE button function
                                                    $(document).on('click', '.updatebtn', function() {

                                                        let tr = $(this).closest('tr');
                                                        let a = tr.find('td:eq(0)').text();
                                                        let b = tr.find('td:eq(1)').text();
                                                        let c = tr.find('td:eq(2)').text();
                                                        let d = tr.find('td:eq(3)').text();

                                                        if (d == "Running" || d == "Just Assigned" || d == "running" || d == "justassigned") {
                                                            swal("Ooops.. User is busy. You cannot Assign task to this user!", {
                                                                icon: "warning",
                                                            });

                                                        } else {
                                                            swal("Write task here:", {
                                                                content: "input",
                                                            }).then((value) => {
                                                                //swal(`You typed: ${value}`);
                                                                if (value) {
                                                                    $.ajax({
                                                                        // AJAX 'POST' req to API Gateway endpoint
                                                                        url: 'https://ykhzn55vn4.execute-api.us-east-1.amazonaws.com/s1',
                                                                        type: 'POST',
                                                                        data: JSON.stringify({
                                                                            "TableName": "tenant_tasks",
                                                                            "Item": {
                                                                                "tenant_id": a,
                                                                                "Name": b,
                                                                                "Task": value,
                                                                                "Status": "Just Assigned"
                                                                            },

                                                                        }),
                                                                        success: function(data) {
                                                                            // alert("Updated successfully");
                                                                            swal("Your task has been Updated", {
                                                                                icon: "success",
                                                                            });
                                                                            setTimeout(function() {
                                                                                location.reload();
                                                                            }, 1500);

                                                                        },
                                                                        error: function(xhr, ajaxOptions, thrownError) {
                                                                            alert("Error");
                                                                        }
                                                                    });
                                                                } else {
                                                                    swal("Task is required!", {
                                                                        icon: "warning",
                                                                    });
                                                                }
                                                            });
                                                        }
                                                    });

                                                    // UPDATE STATUS button function
                                                    $(document).on('click', '.updateSts', function() {

                                                        let tr = $(this).closest('tr');
                                                        let a = tr.find('td:eq(0)').text();
                                                        let b = tr.find('td:eq(1)').text();
                                                        let c = tr.find('td:eq(2)').text();

                                                        console.log(a, b);
                                                        swal("Write task status(Running/Completed) here:", {
                                                                content: "input",
                                                            })
                                                            .then((value) => {
                                                                //swal(`You typed: ${value}`);
                                                                if (value) {
                                                                    $.ajax({
                                                                        // AJAX 'post' req to API Gateway endpoint
                                                                        url: 'https://ykhzn55vn4.execute-api.us-east-1.amazonaws.com/s1',
                                                                        type: 'POST',
                                                                        data: JSON.stringify({
                                                                            "TableName": "tenant_tasks",
                                                                            "Item": {
                                                                                "tenant_id": a,
                                                                                "Name": b,
                                                                                "Task": c,
                                                                                "Status": value
                                                                            },
                                                                        }),
                                                                        success: function(data) {
                                                                            // alert("Updated successfully");
                                                                            swal("Task status has been Updated", {
                                                                                icon: "success",
                                                                            });
                                                                            setTimeout(function() {
                                                                                location.reload();
                                                                            }, 1500);

                                                                        },
                                                                        error: function(xhr, ajaxOptions, thrownError) {
                                                                            alert("Error");
                                                                        }
                                                                    });
                                                                } else {
                                                                    swal("Task status is required!", {
                                                                        icon: "warning",
                                                                    });
                                                                }
                                                            });

                                                    });

                                                    //function for DELETE status button
                                                    $(document).on('click', '.deleteSts', function() {

                                                        let tr = $(this).closest('tr');
                                                        let a = tr.find('td:eq(0)').text();
                                                        let b = tr.find('td:eq(1)').text();
                                                        let c = tr.find('td:eq(2)').text();
                                                        // alert('Table 1: ' + a + ' ' + b);

                                                        swal({
                                                                title: "Are you sure?",
                                                                text: "Once deleted, you will not be able recover your deleted data!",
                                                                icon: "warning",
                                                                buttons: true,
                                                                dangerMode: true,
                                                            })
                                                            .then((willDelete) => {

                                                                if (willDelete) {
                                                                    // AJAX 'delete' req to API Gateway endpoint
                                                                    $.ajax({
                                                                        url: 'https://ykhzn55vn4.execute-api.us-east-1.amazonaws.com/s1',
                                                                        type: 'DELETE',
                                                                        data: JSON.stringify({
                                                                            "TableName": "tenant_tasks",
                                                                            "Key": {
                                                                                "tenant_id": a,
                                                                                "Name": b
                                                                            }
                                                                        }),
                                                                        success: function(data) {
                                                                            swal("Your data has been deleted", {
                                                                                icon: "success",
                                                                            });
                                                                            setTimeout(function() {
                                                                                location.reload();
                                                                            }, 2000);
                                                                            // location.reload();
                                                                        },
                                                                        error: function(xhr, ajaxOptions, thrownError) {
                                                                            swal("Your data is safe!");
                                                                        }
                                                                    });

                                                                }
                                                            });

                                                    });
                                                </script>
                                            </table>
                                            <!-- <table> -->
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