<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title>Dashboard</title>
    <?php
    include_once('Head.php')
    ?>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <?php include_once('topbar1.php') ?>
    <?php include_once('leftbar1.php') ?>

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
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card bg-analytics text-white">
                                <div class="card-content">
                                    <div class="card-body text-center">
                                        <div class="avatar avatar-xl bg-primary shadow mt-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-award white font-large-1"></i>
                                            </div>
                                        </div>
                                        <!-- Welcome Text -->
                                        <div class="text-center">
                                            <h1 class="mb-2 text-white">Welcome</h1>
                                            <p class="m-auto w-75"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
                    $(document).ready(function() {


                        // FETCHING DATA FROM JSON FILE 
                        $.getJSON("https://ogqyobkeo2.execute-api.us-east-1.amazonaws.com/dev/demoFunction?TableName=tenant_tasks",
                            function(data) {
                                var student = '';
                                var cols = data['Items'];
                                // ITERATING THROUGH OBJECTS 
                                console.log(cols);
                                var cnt = 0;
                                var str = [];
                                // document.getElementById('count').innerText = cnt;
                                $.each(cols, function(key, value) {

                                    //CONSTRUCTION OF ROWS HAVING 
                                    // DATA FROM JSON OBJECT 
                                    if (value.tenant_id == 'us-east-1_TTZPoPq5x'){

                                    if (value.Status == 'Just Assigned') {

                                        
                                        //console.log(`Name: ${value.Name}`);
                                        toastr.info(`${value.Name} is just assigned a new task!`, 'Task Assigned!');
                                        // toastr.info('Task Assigned!', 'Top Center!', {
                                        //     positionClass: 'toast-top-center',
                                        //     containerId: 'toast-top-center'
                                        // });
                                        // toastr.options = {
                                        //     closeButton: true,
                                        //     positionClass: 'toast-top-center',
                                        //     containerId: 'toast-top-center'
                                        // };
                                        //var str = `${value.Name} got a new task`;
                                        // str[key] = value.Name;
                                        // console.log(str);
                                        // var temp = "";
                                        // $.each(str, function(key, value) {
                                        //     temp = `${value} got a new task`;
                                        // });
                                        // document.getElementById('ntfc').append(temp);
                                        // cnt = cnt + 1;
                                    }
                                }

                                });
                                // document.getElementById('count').innerText = cnt;
                                // document.getElementById('total_cnt').innerText = cnt;

                                // //INSERTING ROWS INTO TABLE 
                                // $('#table').append(student);
                            });
                    });
                </script>


</html>