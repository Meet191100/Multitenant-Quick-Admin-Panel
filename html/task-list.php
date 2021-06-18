<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title>Tasks</title>
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
                            <h2 class="content-header-title float-left mb-0" style="color:#7367f0">Task-List</h2>
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
                                    <form method="post" action="addRole.php" name="role">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <!-- SELECT option for tenant -->
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
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <!-- Tenantwise Users -->
                                                    <div class="position-relative has-icon-left">
                                                        <fieldset class="form-label-group position-relative has-icon-left">
                                                            <select class="form-control" style="height:40px;" name="category" id="category">
                                                                <option value="" disabled selected>Users</option>
                                                            </select>

                                                            <div class="form-control-position">
                                                                <i class="feather icon-clipboard"></i>
                                                            </div>
                                                        </fieldset>
                                                    </div>

                                                </div>
                                                <!-- Tenant-Table -->
                                                <div class="col-12 col-sm-9 col-md-10 col-lg-10 table-responsive mx-auto">
                                                    <table id='table' class="table table-bordered table-hover w-auto mx-auto">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Name</th>
                                                                <th>Task</th>
                                                                <th>Status</th>
                                                                <!-- <th>Action</th> -->
                                                            </tr>
                                                        <tbody id="tdata">

                                                        </tbody>
                                                        </thead>
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    var cols;
    var userA = [];
    var userB = [];
    var data = [];

    // functon to fetch data from DynamoDB table
    $(document).ready(function() {

        // FETCHING DATA FROM JSON FILE 
        $.getJSON("https://ogqyobkeo2.execute-api.us-east-1.amazonaws.com/dev/demoFunction?TableName=tenant_tasks",
            function(data) {
                var student = '';
                cols = data['Items'];
                // console.log(cols);
                $.each(cols, function(key, value) {

                    // adding data into userArray accoring to tenant_id 
                    if (value.tenant_id == 'us-east-1_TTZPoPq5x') {
                        userA[key] = value.Name;
                    }
                    if (value.tenant_id == 'us-east-1_lj3qh5enJ') {
                        userB[key] = value.Name;
                    }
                });

                //INSERTING ROWS INTO TABLE 
                // $('#table').append(student);
            });
    });


    //function to changing the state of SELECT option
    $('#category').change(function() {
        $('#tdata').html("");
        $.each(cols, function(key, value) {

            var student = '';

            if (value.Name == $('#category').val()) {

                student += '<tr>';
                student += '<td>' + value.tenant_id + '</td>';

                student += '<td>' +
                    value.Name + '</td>';

                student += '<td>' +
                    value.Task + '</td>';

                student += '<td>' +
                    value.Status + '</td>';

                // student += '<td><button class="btn btn-success waves-effect waves-light updateSts">Update Status</button></td></tr>'
            }

            $('#tdata').append(student);
            console.log(student);
        });
    });

    var usersByCategory = {
        TenantA: userA,
        TenantB: userB
    }

    //function to change the state of select option of "depeartment"
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
<!-- END: Script-->

</html>