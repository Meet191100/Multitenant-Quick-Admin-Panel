<!-- 3v9n4q65228giauv8a57kihlk2 --> 


<?php

// $conn = mysqli_connect('localhost', 'root', '', 'zealaqua');
// if (isset($_POST['login'])) {
//     $username = $_POST['Username'];
//     $password = $_POST['Password'];

//     $sql = "select * from user_info WHERE username ='" . $username . "' AND Password ='" . $password . "'";


//     $result = mysqli_query($conn, $sql);
//     if ($result->num_rows > 0) {
//         $details = $result->fetch_assoc();
//         session_start();
//         $_SESSION['loggedinclient'] = true;
//         $_SESSION['client_role'] = $details['role'];
//         if (isset($_SESSION['loggedinclient']) && $_SESSION['loggedinclient'] === true) {
//             $_SESSION['loggedinclient'] = true;
//             $_SESSION['client_name'] = $details['username'];
//             $_SESSION['client_id'] = $details['c_id'];
//             $_SESSION['client_role'] = $details['role'];
//             $role = $_SESSION['client_role'];
//             $sql = " select Permission from addRole where RoleName='$role'";
//             $result = $conn->query($sql);
//             $details = "";
//             if ($result->num_rows === 1) {
//                 // output data of each row
//                 $details = $result->fetch_array();
//                 $arr = explode(",", $details['Permission']);
//                 $_SESSION['role_permission'] = $arr;
//             } else {
//                 echo $sql . "  " . $conn->error;
//                 //header('Location: Client-Login.php');
//                 exit();
//             }
//             header('location: dashboard.php');
//         } else {
//             echo '<script type="text/javascript">';
//             echo ' alert("Login Failed :(")';
//             echo '</script>';
//             exit();
//         }
//     } else {
//         echo "<script>
//   alert('Invalid Username or Password:)');
// window.location.href='CustomerLogin.php';
// </script>";
//     }
// }
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->


<head>
    <title>Login</title>
   <?php  include_once ('Head.php') ?>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page"
      data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="row flexbox-container">
            <div class="col-xl-8 col-11 d-flex justify-content-center">
                    <div class="card bg-authentication rounded-0 mb-0">
                        <div class="row m-0">
                            <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                <img src="../../5846213/app-assets/images/pages/register.jpg" alt="branding logo">
                            </div>
                            <div class="col-lg-6 col-12 p-0">
                                <div class="card rounded-0 mb-0 px-2">
                                    <div class="card-header pb-1">
                                        <div class="card-title">
                                            <h4 class="mb-0">Tenant Login</h4>
                                        </div>
                                    </div>
                                    <!-- <p class="px-2">Welcome back, please login to your account.</p> -->
                                    <div class="card-content">
                                        <div class="card-body pt-1">
                                            <form method="post" name="login">
                                                <fieldset
                                                        class="form-label-group form-group position-relative has-icon-left">
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

                                                <fieldset class="form-label-group position-relative has-icon-left">
                                                <select class="form-control" style="height:40px;" name="category" id="category">
                                                                 <option value="" disabled selected>Select</option>
                                                            </select> 
                                                    <div class="form-control-position">
                                                        <i class="feather icon-lock"></i>
                                                    </div>
                                                    <label for="user-password">Password</label>
                                                </fieldset>
                                                </div>

                                                <button type="submit" name="login" onclick="check(this.form)"
                                                        class="btn btn-primary btn-block px-0">Login
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>



<!-- 

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
        <section class="row flexbox-container">
                <div class="col-xl-8 col-11 d-flex justify-content-center">
                    <div class="card bg-authentication rounded-0 mb-0">
                        <div class="row m-0">
                            <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                <img src="../../5846213/app-assets/images/pages/register.jpg" alt="branding logo">
                            </div>
                            <div class="col-lg-6 col-12 p-0">
                                <div class="card rounded-0 mb-0 px-2">
                                    <div class="card-header pb-1">
                                        <div class="card-title">
                                            <h4 class="mb-0">Tenant Login</h4>
                                        </div>
                                    </div>
                                     <p class="px-2">Welcome back, please login to your account.</p>
                                    <div class="card-content">
                                        <div class="card-body pt-1">
                                            <form method="post" name="login">
                                                <fieldset
                                                        class="form-label-group form-group position-relative has-icon-left">
                                                        <label for="sel1">Select Tenant:</label>
                                                            <select class="form-control" style="height:40px;" id="tenant" name="tenant" onChange="changecat(this.value);">
                                                                <option value="" disabled selected>Select Tenant</option>
                                                                <option value="TenantA">Tenant-A</option>
                                                                <option value="TenantB">Tenant-B</option>
                                                            </select>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                    <label for="user-name">Username</label>
                                                </fieldset>

                                                <fieldset class="form-label-group position-relative has-icon-left">
                                                <select class="form-control" style="height:40px;" name="category" id="category">
                                                                 <option value="" disabled selected>Select</option>
                                                            </select> 
                                                    <div class="form-control-position">
                                                        <i class="feather icon-lock"></i>
                                                    </div>
                                                    <label for="user-password">Password</label>
                                                </fieldset>
                                                </div>

                                                <button type="submit" name="login" onclick="check(this.form)"
                                                        class="btn btn-primary btn-block px-0">Login
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div> -->
<!-- END: Content-->
</body>

<script>
var usersByCategory = {
    TenantA: ["3v9n4q65228giauv8a57kihlk2"],
    TenantB: ["58q56o94qegd9629nenaqkho3a"]
}

    function changecat(value) {
        if (value.length == 0) document.getElementById("category").innerHTML = "<option></option>";
        else {
            var catOptions = "";
            for (categoryId in usersByCategory[value]) {
                catOptions += "<option>" + usersByCategory[value][categoryId] + "</option>";
            }
            document.getElementById("category").innerHTML = catOptions;
        }
    }

    function check(form)/*function to check userid & password*/
{
 /*the following code checkes whether the entered userid and password are matching*/
 if(form.tenant.value == "TenantA" && form.category.value == "3v9n4q65228giauv8a57kihlk2")
  {
    window.open('https://sgp2021.auth.us-east-1.amazoncognito.com/login?client_id=3v9n4q65228giauv8a57kihlk2&response_type=code&scope=email+openid&redirect_uri=http://localhost/ZealAqua-master/ZealAqua-master/4836112/html/tenantDashboard.php')/*opens the target page while Id & password matches*/
  }
  else if(form.tenant.value == "TenantB" && form.category.value == "58q56o94qegd9629nenaqkho3a"){
    window.open('https://sgp-2021.auth.us-east-1.amazoncognito.com/login?client_id=58q56o94qegd9629nenaqkho3a&response_type=code&scope=email+openid&redirect_uri=http://localhost/ZealAqua-master/ZealAqua-master/4836112/html/tenantBDashboard.php')
  }
 else
 {
   alert("Wrong Tenant-Id !")/*displays error message*/
  }
}   




</script>
<!-- END: Body-->


</html>