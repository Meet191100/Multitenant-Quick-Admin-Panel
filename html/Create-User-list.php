<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title>Uesr List</title>
    <?php include_once('Head.php'); ?>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <?php include_once('Topnavbar.php'); ?>
    <?php include_once('Leftmenu.php'); ?>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-center mb-0" style="color:#7367f0;">User List</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Zero configuration table -->
                <section id="basic-datatable">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="fonticon-wrap">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"></h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive text-center">
                                            <table class="table table-hover w-auto mx-auto" id="table">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>TENANT ID</th>
                                                        <th>NAME</th>
                                                        <th>TASK
                                                        <th>STATUS</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                <tbody></tbody>
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
                                                                console.log(cols);
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



                                                                });

                                                                //INSERTING ROWS INTO TABLE 
                                                                $('#table').append(student);
                                                            });
                                                    });
                                                </script>
                                            </table>
                                            <script>
                                            </script>
                                            </td>
                                            </tr>
                                            </tbody>
                                            </table> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="drag-target"></div>
            </div>
        </div>
    </div>
    <?php include_once('Footer.php'); ?>
</body>
<!-- END: Body-->

</html>