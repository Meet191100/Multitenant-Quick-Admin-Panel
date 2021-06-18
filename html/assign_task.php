<?php
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title>Create User</title>
    <?php include_once('Head.php'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.common.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.5/sweetalert2.min.js"></script>
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
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0" style="color:#7367f0">Assign Task</h2>
                        </div>
                    </div>
                </div>
            </div>

            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form method="post" action="#" name="role" id="frm">

                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="position-relative has-icon-left">
                                                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                            <label for="sel1">Select Tenant:</label>
                                                            <select class="form-control" style="height:40px;" id="tenant" name="tenant" onChange="changecat(this.value);" required data-validation-required-message="This field is required">
                                                                <option value="" disabled selected>Select Tenant</option>
                                                                <option value="TenantA">Tenant-A</option>
                                                                <option value="TenantB">Tenant-B</option>
                                                            </select>
                                                            <div class="form-control-position">
                                                                <i class="feather icon-user"></i>
                                                            </div>
                                                            <!-- <label for="user-name">Username</label> -->
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="position-relative has-icon-left">
                                                        <fieldset class="form-label-group position-relative has-icon-left">
                                                            <select class="form-control" style="height:40px;" name="category" id="category" required data-validation-required-message="This field is required">
                                                                <option value="" disabled selected>Select User</option>
                                                            </select>

                                                            <div class="form-control-position">
                                                                <i class="feather icon-user"></i>
                                                            </div>

                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-label-group">
                                                        <div class="controls">
                                                            <!-- <label>Name</label> -->
                                                            <fieldset class="form-label-group position-relative has-icon-left mx-auto">
                                                                <input type="text" id="tsk" class="form-control" placeholder="Enter Task" name="task" required data-validation-required-message="This field is required">

                                                                <div class="form-control-position">
                                                                    <i class="feather icon-monitor"></i>
                                                                </div>
                                                                <label for="user-name">Enter Task</label>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div style="text-align: center;height:20px;">
                                                        <button type="submit" name="submit" class="btn btn-primary mr-2 mb-5" style="height:40px;" id="getReq">Assign
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <?php include_once('Footer.php'); ?>

</body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    var cols;
    var userA = [];
    var userB = [];
    userA[0] = 'Select User';
    userB[0] = 'Select User';
    var sts = 'Running';
    // var data = [];

    // function for fetching the data from DynamoDb table
    $(document).ready(function() {
        $('#frm').submit(function(e) {
            e.preventDefault();
            // console.log($('#tenant').val(),$('#uid').val(),$('#uname').val(),$('#category').val());
        });

        $("#getReq").click(function() {


            let ta = 'us-east-1_TTZPoPq5x';
            if ($('#tenant').val() == 'TenantB') {
                ta = 'us-east-1_lj3qh5enJ';
            }
            if ($('#tsk').val()) {
                $.ajax({
                    url: 'https://ykhzn55vn4.execute-api.us-east-1.amazonaws.com/s1',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        "TableName": "tenant_tasks",
                        "Item": {
                            "tenant_id": ta,
                            "Name": $('#category').val(),
                            "Task": $('#tsk').val(),
                            "Status": "Just Assigned"
                        }
                    }),
                    success: function(data) {
                        swal("Successful", "Task is successfully assigned!", "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1700);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert("Error");
                    }
                });
            }

        });

        $.getJSON("https://ogqyobkeo2.execute-api.us-east-1.amazonaws.com/dev/demoFunction?TableName=tenant_tasks",
            function(data) {
                var student = '';
                // var userA = '';
                // var userB = '';
                cols = data['Items'];
                // console.log(cols);
                $.each(cols, function(key, value) {

                    // userA[];
                    // userB[];
                    if (value.tenant_id == 'us-east-1_TTZPoPq5x') {
                        userA[key + 1] = value.Name;
                    }
                    if (value.tenant_id == 'us-east-1_lj3qh5enJ') {
                        userB[key + 1] = value.Name;
                    }
                });

            });
    });

    // function for checking the status of task according to tenantUSer
    $('#category').change(function() {

        console.log(cols);

        $.each(cols, function(key, value) {

            var student = '';
            // console.log(value.Status, $('#category').val());
            if (value.Status == 'Running' && value.Name == $('#category').val()) {
                // alert("User is already busy with some other task !");
                // sweetAlert("Oops...", "Something went wrong!", "error");
                // console.log("From condition");
                swal("Oops...User is already busy some other task!", {
                    icon: "warning",
                });
                setTimeout(function() {
                    location.reload();
                }, 2000);

            } else if (value.Status == 'Just Assigned' && value.Name == $('#category').val()) {
                // alert("User is already busy with some other task !");
                // sweetAlert("Oops...", "Something went wrong!", "error");
                // console.log("From condition");
                swal("Oops...User is just assigned one task!", {
                    icon: "warning",
                });
                setTimeout(function() {
                    location.reload();
                }, 2000);

            } else {
                sts = 'Just Assigned';
            }
        });
    });

    var usersByCategory = {
        TenantA: userA,
        TenantB: userB
    }

    // function to change the value of SELECT 'tenant'
    function changecat(value) {
        if (value.length == 0) document.getElementById("category").innerHTML = "<option></option>";
        else {
            var catOptions = "";
            for (categoryId in usersByCategory[value]) {
                catOptions += "<option value='" + usersByCategory[value][categoryId] + "'>" + usersByCategory[value][categoryId] + "</option>";
            }
            document.getElementById("category").innerHTML = catOptions;
        }
    }
</script>
</script>
<!-- END: Script-->

</html>