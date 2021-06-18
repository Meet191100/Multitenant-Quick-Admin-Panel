<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title>Create User</title>
    <?php include_once('Head.php'); ?>
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
                            <h2 class="content-header-title float-left mb-0" style="color:#7367f0">Create User</h2>
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
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="position-relative has-icon-left">
                                                        <fieldset class="form-label-group position-relative has-icon-left">
                                                            <select class="form-control" style="height:40px;" name="category" id="category" required data-validation-required-message="This field is required">
                                                                <option value="" disabled selected>Department</option>
                                                            </select>

                                                            <div class="form-control-position">
                                                                <i class="feather icon-clipboard"></i>
                                                            </div>

                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-label-group">
                                                        <div class="controls">
                                                            <!-- <label>Name</label> -->
                                                            <fieldset class="form-label-group position-relative has-icon-left">
                                                                <input type="text" id="uname" class="form-control" placeholder=" Name" name="username" required data-validation-required-message="This field is required">

                                                                <div class="form-control-position">
                                                                    <i class="feather icon-user"></i>
                                                                </div>
                                                                <label for="user-name">Username</label>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-label-group">
                                                        <div class="controls">
                                                            <!-- <label tenant-id-column">Id</label> -->
                                                            <div class="position-relative has-icon-left">

                                                                <input type="number" id="uid" class="form-control" placeholder=" Id" name="username" required data-validation-required-message="This field is required">

                                                                <div class="form-control-position">
                                                                    <i class="feather icon-user"></i>
                                                                </div>
                                                            </div>
                                                            <!-- <label for="user-id">Id</label> -->

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div style="text-align: center;height:20px;">
                                                        <button type="submit" name="submit" class="btn btn-primary mr-2 mb-5" style="height:40px;" id="getReq">Create User</button>
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
<!-- END: Body-->

<!-- BEGIN: Script-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    var cols;
    var userA = [];
    var userB = [];
    var data = [];
    var unm = [];
    var uidA = [];
    var uidB = [];
    var flag = true;;


    // function to get data from DynamoDB
    $(document).ready(function() {

        var unm = [];

        $('#frm').submit(function(e) {
            e.preventDefault();
            // console.log($('#tenant').val(),$('#uid').val(),$('#uname').val(),$('#category').val());
        });

        $.getJSON("https://ogqyobkeo2.execute-api.us-east-1.amazonaws.com/dev/demoFunction?TableName=tenant_info",
            function(data) {
                var student = '';
                cols = data['Items'];
                // console.log(cols);
                $.each(cols, function(key, value) {

                    // inserting data into table of tenantA  
                    unm[key] = value.Name;
                    if (value.tenant_id == 'us-east-1_TTZPoPq5x') {
                        userA[key] = value.Department;
                        uidA[key] = value.id;
                    }
                });

                $.each(cols, function(key, value) {

                    // inserting data into table of tenantB
                    if (value.tenant_id == 'us-east-1_lj3qh5enJ') {
                        userB[key] = value.Department;
                        uidB[key] = value.id;
                    }
                });
            });


        // function for creating-tenant 
        $("#getReq").click(function() {

            let ta = 'us-east-1_TTZPoPq5x';
            if ($('#tenant').val() == 'TenantB') {
                ta = 'us-east-1_lj3qh5enJ';
            }

            var x = $('#uid').val().toString();
            console.log(typeof(x), x);

            $.ajax({
                        url: 'https://p0rlgcfihc.execute-api.us-east-1.amazonaws.com/v1',
                        type: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify({
                            "TableName": "tenant_info",
                            "Item": {
                                "tenant_id": ta,
                                "id": x,
                                "Name": $('#uname').val(),
                                "Department": $('#category').val()
                            }
                        }),
                        success: function(data) {
                            // alert("POSTed successfully");
                            swal("Successful", "User is successfully created!", "success");
                            setTimeout(function() {
                                location.reload();
                            }, 1500);
                            // location.reload();
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert("Error");
                        }
                    });

                    $.ajax({
                        url: 'https://ykhzn55vn4.execute-api.us-east-1.amazonaws.com/s1',
                        type: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify({
                            "TableName": "tenant_tasks",
                            "Item": {
                                "tenant_id": ta,
                                "Name": $('#uname').val(),
                                "Task": "-",
                                "Status": "-"
                            }
                        }),
                        success: function(data) {
                            console.log("User is also Created in task-list");
                            // swal("Successful", "User is successfully created!", "success");
                            // location.reload();
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert("Error");
                        }
                    });







            // console.log(typeof(x), x);
            //x = x + 1;

            // console.log($('#tenant').val(),$('#uid').val(),$('#uname').val(),$('#category').val());
            // if ($('#uname').val() && $('#uid').val()) {
            // if (ta == 'us-east-1_TTZPoPq5x') {

            //     if (x in uidA) {
            //         console.log(uidA);
            //         // console.log(typeof(x));
            //         swal("UserId is already exists in tenant-A!", {
            //             icon: "warning",
            //         });

            //     } else {
            //         console.log(x);
            //         swal("UserId is unique in tenant-A!");
            //         // $.ajax({
            //         //     url: 'https://p0rlgcfihc.execute-api.us-east-1.amazonaws.com/v1',
            //         //     type: 'POST',
            //         //     contentType: 'application/json',
            //         //     data: JSON.stringify({
            //         //         "TableName": "tenant_info",
            //         //         "Item": {
            //         //             "tenant_id": ta,
            //         //             "id": x,
            //         //             "Name": $('#uname').val(),
            //         //             "Department": $('#category').val()
            //         //         }
            //         //     }),
            //         //     success: function(data) {
            //         //         // alert("POSTed successfully");
            //         //         swal("Successful", "User is successfully created!", "success");
            //         //         setTimeout(function() {
            //         //             location.reload();
            //         //         }, 1500);
            //         //         // location.reload();
            //         //     },
            //         //     error: function(xhr, ajaxOptions, thrownError) {
            //         //         alert("Error");
            //         //     }
            //         // });

            //         // $.ajax({
            //         //     url: 'https://ykhzn55vn4.execute-api.us-east-1.amazonaws.com/s1',
            //         //     type: 'POST',
            //         //     contentType: 'application/json',
            //         //     data: JSON.stringify({
            //         //         "TableName": "tenant_tasks",
            //         //         "Item": {
            //         //             "tenant_id": ta,
            //         //             "Name": $('#uname').val(),
            //         //             "Task": "-",
            //         //             "Status": "-"
            //         //         }
            //         //     }),
            //         //     success: function(data) {
            //         //         console.log("User is also Created in task-list");
            //         //         // swal("Successful", "User is successfully created!", "success");
            //         //         // location.reload();
            //         //     },
            //         //     error: function(xhr, ajaxOptions, thrownError) {
            //         //         alert("Error");
            //         //     }
            //         // });

            //     }

            // }
            // if (ta == 'us-east-1_lj3qh5enJ') {

            //     //x = x + 4;
            //     console.log(uidB);
            //     if (x in uidB) {
            //         // console.log(typeof(uidB));
            //         console.log(typeof(x), x);
            //         swal("UserId is already exists in tenant-B!", {
            //             icon: "warning",
            //         });

            //     } else {
            //         //     console.log(x, typeof(x));
            //         // swal("UserId is unique in tenant-B!");                               

            //         $.ajax({
            //             url: 'https://p0rlgcfihc.execute-api.us-east-1.amazonaws.com/v1',
            //             type: 'POST',
            //             contentType: 'application/json',
            //             data: JSON.stringify({
            //                 "TableName": "tenant_info",
            //                 "Item": {
            //                     "tenant_id": ta,
            //                     "id": x,
            //                     "Name": $('#uname').val(),
            //                     "Department": $('#category').val()
            //                 }
            //             }),
            //             success: function(data) {
            //                 // alert("POSTed successfully");
            //                 swal("Successful", "User is successfully created!", "success");
            //                 setTimeout(function() {
            //                     location.reload();
            //                 }, 1500);
            //                 // location.reload();
            //             },
            //             error: function(xhr, ajaxOptions, thrownError) {
            //                 alert("Error");
            //             }
            //         });

            //         $.ajax({
            //             url: 'https://ykhzn55vn4.execute-api.us-east-1.amazonaws.com/s1',
            //             type: 'POST',
            //             contentType: 'application/json',
            //             data: JSON.stringify({
            //                 "TableName": "tenant_tasks",
            //                 "Item": {
            //                     "tenant_id": ta,
            //                     "Name": $('#uname').val(),
            //                     "Task": "-",
            //                     "Status": "-"
            //                 }
            //             }),
            //             success: function(data) {
            //                 console.log("User is also Created in task-list");
            //                 // swal("Successful", "User is successfully created!", "success");
            //                 // location.reload();
            //             },
            //             error: function(xhr, ajaxOptions, thrownError) {
            //                 alert("Error");
            //             }
            //         });

            //     }

            // }


            // // $.each(unm, function(key, value) {

            // //     if (ta == 'us-east-1_TTZPoPq5x') {

            // //         if (uidA[key] != $('#uid').val()) {
            // //             //flag = false;
            // //             console.log(uidA[key], $('#uid').val(), ta);
            // //             swal("UserId is unique in tenant-A!");

            // //         } else {
            // //             console.log(uidA[key], $('#uid').val(), ta);
            // //             swal("UserId is not exists in tenant-A!", {
            // //                 icon: "warnings",
            // //             });
            // //         }

            // //         // else {
            // //         //     flag = true;
            // //         // }

            // //         //swal("Successful", "User is successfully created!", "success");


            // //     } else if (ta == 'us-east-1_lj3qh5enJ') {
            // //         if (uidB[key] == $('#uid').val()) {
            // //             //flag = false;
            // //             swal("UserId is already exists in tenant-B!", {
            // //                 icon: "warning",
            // //             });
            // //         }
            // //         // else {
            // //         //     flag = true;
            // //         // }
            // //     }

            // // if (flag) {
            // //     swal("Successful", "Unique!", "success");
            // // }
            // // });

            // //  }
        });

    });

    // assign array of tenants to respective userArray
    var usersByCategory = {
        TenantA: userA,
        TenantB: userB
    }

    // function for changing the state of Select Option
    function changecat(value) {
        if (value.length == 0) document.getElementById("category").innerHTML = "<option></option>";
        else {
            var catOptions = "";
            for (categoryId in usersByCategory[value]) {
                catOptions += "<option value='" + usersByCategory[value][categoryId] + "'>" + usersByCategory[value][categoryId] + "</option>";
            }
            document.getElementById("category").innerHTML = catOptions;
            // alert(catOptions);
        }
    }
</script>
</script>
<!-- END: Script-->

</html>