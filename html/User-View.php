<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title>User View</title>
    <?php include_once('Head.php'); ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js">
    </script>
    <script src="https://cdn.datatables.net/1.10.24/css/dataTables.jqueryui.min.css"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.jqueryui.min.js"></script>
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
                                    <div class="card-title d-flex" style="color:#7367f0;">Tenant Information</div>
                                </div>
                                <!-- Table -->
                                <div class="card-body">
                                    <div class="row w-100 text-center mx-auto justify-content-center">

                                        <div class="col-12 col-sm-12 col-md-10 col-lg-10 table-responsive">
                                            <table id='table' class="table table-bordered table-hover w-auto mx-auto">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th name="tenantId">Tenant Id</th>
                                                        <th name="id">Id</th>
                                                        <th>Name</th>
                                                        <th>Department</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
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

<!-- BEGIN: Script-->

<script src="https://code.jquery.com/jquery-3.5.1.js">
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    // functiton for fetching data from DynamoDB
    $(document).ready(function() {

        // FETCHING DATA FROM JSON FILE 
        $.getJSON("https://ogqyobkeo2.execute-api.us-east-1.amazonaws.com/dev/demoFunction?TableName=tenant_info",
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
                        value.id + '</td>';

                    student += '<td>' +
                        value.Name + '</td>';

                    student += '<td>' +
                        value.Department + '</td>';

                    student += '<td class="product-action"><button id="Delete-btn" class="btn btn-danger waves-effect waves-light delbtn"><i class="fa fa-trash"></i></button>   <button class="btn btn-primary waves-effect waves-light updatebtn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';

                });
                //INSERTING ROWS INTO TABLE 
                $('#table').append(student);
            });
    });

    // DELETE button function for deleting tenant-User
    $(document).on('click', '.delbtn', function() {

        let tr = $(this).closest('tr');
        let a = tr.find('td:eq(0)').text();
        let b = tr.find('td:eq(1)').text();
        let c = tr.find('td:eq(2)').text();

        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able recover your deleted data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {

                if (willDelete) {
                    //AJAX 'DELETE' req to API Gateway End-Point
                    $.ajax({
                        url: 'https://p0rlgcfihc.execute-api.us-east-1.amazonaws.com/v1',
                        type: 'DELETE',
                        data: JSON.stringify({
                            "TableName": "tenant_info",
                            "Key": {
                                "tenant_id": a,
                                "id": b,
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

                    //AJAX 'DELETE' req to API Gateway End-Point
                    $.ajax({
                        url: 'https://ykhzn55vn4.execute-api.us-east-1.amazonaws.com/s1',
                        type: 'DELETE',
                        data: JSON.stringify({
                            "TableName": "tenant_tasks",
                            "Key": {
                                "tenant_id": a,
                                "Name": c
                            }
                        }),
                        success: function(data) {
                            console.log("User is also deleted from task-list!");
                            // location.reload();
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            swal("Your data is safe!");
                        }
                    });

                }
            });
    });


    // UPDATE button function for Updating tenant Info
    $(document).on('click', '.updatebtn', function() {

        let tr = $(this).closest('tr');
        let a = tr.find('td:eq(0)').text();
        let b = tr.find('td:eq(1)').text();

        swal("Write department name here:", {
                content: "input",
            })
            .then((value) => {
                //swal(`You typed: ${value}`);

                //AJAX 'PATCH' req to API Gateway-Endpoint
                $.ajax({
                    url: 'https://p0rlgcfihc.execute-api.us-east-1.amazonaws.com/v1',
                    type: 'PATCH',
                    data: JSON.stringify({
                        "TableName": "tenant_info",
                        "Item": {
                            "tenant_id": a,
                            "id": b,
                            "updateKey": "Department",
                            "updateValue": value
                        },
                    }),
                    success: function(data) {
                        swal("Your department has been Updated", {
                            icon: "success",
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 2000);

                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert("Error");
                    }
                });
            });
    });
</script>
<!-- END: Script-->

</html>