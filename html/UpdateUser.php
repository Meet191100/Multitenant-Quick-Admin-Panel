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
                            <h2 class="content-header-title float-left mb-0" style="color:#7367f0">Update User</h2>
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
                                                            <select class="form-control" style="height:40px;" id="tenant" name="tenant" onChange="changecat(this.value);">
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
                                                            <select class="form-control" style="height:40px;" name="category" id="category">
                                                                <option value="" disabled selected>Id</option>
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
                                                            <!-- <label for="first-name-column">Id</label> -->
                                                            <div class="position-relative has-icon-left">

                                                                <input type="text" id="uid" class="form-control" placeholder=" Id" name="username" required data-validation-required-message="This field is required">

                                                                <div class="form-control-position">
                                                                    <i class="feather icon-user"></i>
                                                                </div>
                                                            </div>
                                                            <!-- <label for="user-password">Id</label> -->

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div style="text-align: center;height:20px;">
                                                        <button type="submit" name="submit" class="btn btn-primary mr-2 mb- updatebtn" style="height:40px;" id="getReq">Update
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    var cols;
    var userA = [];
    var userB = [];
    var data = [];

    $(document).ready(function() {
        $('#frm').submit(function(e) {
            e.preventDefault();
            // console.log($('#tenant').val(),$('#uid').val(),$('#uname').val(),$('#category').val());
        });
        $(".updatebtn").click(function() {
            let ta = 'us-east-1_TTZPoPq5x';
            if ($('#tenant').val() == 'TenantB') {
                ta = 'us-east-1_lj3qh5enJ';
            }
            // console.log($('#tenant').val(),$('#uid').val(),$('#uname').val(),$('#category').val());
            $.ajax({
                url: 'https://ogqyobkeo2.execute-api.us-east-1.amazonaws.com/dev/demoFunction?TableName=tenant_info',
                type: '',
                contentType: 'application/json',
                data: JSON.stringify({
                    "TableName": "tenant_info",
                    "Item": {
                        "tenant_id": ta,
                        "id": $('#uid').val(),
                        "Name": $('#uname').val(),
                        "Department": $('#category').val()
                    }
                }),
                success: function(data) {
                    alert("POSTed successfully");
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert("Error");
                }
            });
        });
        // FETCHING DATA FROM JSON FILE 
        $.getJSON("https://ogqyobkeo2.execute-api.us-east-1.amazonaws.com/dev/demoFunction?TableName=tenant_info",
            function(data) {
                var student = '';
                // var userA = '';
                // var userB = '';
                cols = data['Items'];
                // console.log(cols);
                $.each(cols, function(key, value) {

                    // student += '<tbody><tr>';
                    // student += '<td>' + value.tenant_id + '</td>';

                    // student += '<td>' +
                    //     value.Name + '</td>';

                    // student += '<td>' +
                    //     value.Task + '</td>';

                    // student += '<td>' +
                    //     value.Status + '</td>';

                    if (value.tenant_id == 'us-east-1_TTZPoPq5x') {
                        userA[key] = value.id;
                    }
                    if (value.tenant_id == 'us-east-1_lj3qh5enJ') {
                        userB[key] = value.id;
                    }
                });

                //INSERTING ROWS INTO TABLE 
                // $('#table').append(student);
            });
    });

    var usersByCategory = {
        TenantA: ["", "Development", "Finance"],
        TenantB: ["", "Production", "Sales"]
    }

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


<!-- 
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="2-columns">
    <?php include_once('Topnavbar.php'); ?>
    <?php include_once('Leftmenu.php'); ?>
 
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Create Tenant</h2>
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
                                <form class="form" method="POST">
                                    <div class="form-body">
                                        <div class="row">
                                        <div class="col-md-5 col-12">
                                                <div class="form-label-group">
                                                    <div class="controls">
                                                        <label for="first-name-column">Id</label>
                                                        <div class="position-relative has-icon-left">

                                                            <input type="text" id="first-name-column"
                                                                   class="form-control" placeholder=" Tenant Id"
                                                                   name="username"
                                                                   required
                                                                   data-validation-required-message="This field is required">

                                                            <div class="form-control-position">
                                                                <i class="feather icon-user" ></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="col-md-5 col-12">
                                                <div class="form-label-group">
                                                    <div class="controls">
                                                        <label for="first-name-column">Department</label>
                                                        <div class="position-relative has-icon-left">

                                                            <input type="text" id="last-name-column"
                                                                   class="form-control" placeholder="Department"
                                                                   name="department">

                                                            <div class="form-control-position">
                                                                <i class="feather icon-layers"></i>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-12">
                                                <div class="form-label-group">
                                                    <div class="controls">
                                                        <label for="first-name-column">Name</label>
                                                        <div class="position-relative has-icon-left">

                                                            <input type="text" id="first-name-column"
                                                                   class="form-control" placeholder=" Name"
                                                                   name="username"
                                                                   required
                                                                   data-validation-required-message="This field is required">

                                                            <div class="form-control-position">
                                                                <i class="feather icon-user" ></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-12">
                                                <div class="form-label-group">
                                                    <div class="controls">
                                                        <label for="first-name-column">Id</label>
                                                        <div class="position-relative has-icon-left">

                                                            <input type="text" id="first-name-column"
                                                                   class="form-control" placeholder=" Name"
                                                                   name="username"
                                                                   required
                                                                   data-validation-required-message="This field is required">

                                                            <div class="form-control-position">
                                                                <i class="feather icon-user" ></i>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div style="text-align: right;">
                                                    <button type="submit" name="submit"
                                                            class="btn btn-primary mr-1 mb-1">Create
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
    </div>
  

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>



    <?php include_once('Footer.php'); ?>

</body> -->
<!-- END: Body-->

</html>