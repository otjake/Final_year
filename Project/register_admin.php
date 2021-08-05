<?php
include("includes/header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Register'])) {
        $username = "";
        $nameErr = "";

        $password = $_POST['password'];
        $hashed_password = md5($password);

        if (empty($_POST["user_name"])) {
            $nameErr = "Name is Required";
        } else {
            $username = inputtype($_POST["user_name"]);
            // check if name is valid
            if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
                $nameErr = "Only letters and white space allowed";
            } else {
                $cusername = $username;
            }
        }

        if ($nameErr != "" ) {
            $Emessage = "Registration failed! Some inputs were filled wrong ";
        } else {
            $check_sql = "SELECT * FROM admin WHERE username='{$cusername}'";
            $check_sql_result = mysqli_query($connection, $check_sql);
            if ($check_sql_result->num_rows > 0) {
                $Double_user_error = "This email already exist";
            } else {
                $rsql = "INSERT INTO admin (username,password) VALUES ('{$cusername}','{$hashed_password}')";

                $rsql_result = $connection->query($rsql);

                if ($rsql) {
                    $Smessage = "successfully created";
                } else {
                    $unreg = "Unable to register";
                }
            }
        }
    }
}




?>




?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">ADMIN</li>
            </ol>


            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>ADD A TRUSTED ADMIN</div>
                <div class="card-body">

                    <?php
                    if (!empty($Smessage)) {
                        echo "<p class='alert alert-success'> $Smessage <a  id=\"linkClose\" href=\"register_admin.php\" class=\"close\" >&times;</a></p>";
                    }
                    if (!empty($Emessage)) {
                        echo "<p class='alert alert-danger'> $Emessage<a  id=\"linkClose\" href=\"register_admin.php\" class=\"close\" >&times;</a> </p>";
                    }
                    if (!empty($Double_user_error)) {
                        echo "<p class='alert alert-danger'> $Double_user_error<a  id=\"linkClose\" href=\"register_admin.php\" class=\"close\" >&times;</a> </p>";
                    }
                    if (!empty($unreg)) {
                        echo "<p class='alert alert-danger'> $unreg<a  id=\"linkClose\" href=\"register_admin.php\" class=\"close\" >&times;</a> </p>";
                    }


                    ?>



                    <form method="POST" action="register_admin.php">

                        <div class="form-group">
                            <b>USER NAME:
                                <input type="text" class="form-control" required name="user_name" placeholder="USER NAME" />
                            </b>
                            <?php
                            if (!empty($nameErr)) {
                                echo "<p class='alert alert-danger'>" . $nameErr . "</p>";
                            } ?>
                        </div>

                        <div class="form-group">
                            <b>Password:
                                <input type="password" required class="form-control" name="password" placeholder="Prefered Password " />
                            </b>
                        </div>

                        <button type="submit" id="Register" name="Register" class="btn btn-primary">Register Admin</button>

                        <a href="login.php" class="btn btn-primary">Login</a>

                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>