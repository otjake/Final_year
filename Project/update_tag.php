<?php
include("includes/header.php");

//select and echo previous value query
if (isset($_GET['master_id'])) {
    $id = $_GET['master_id'];
    $psql = "SELECT * FROM masters_tb WHERE master_id={$id}";
    $result_psql = mysqli_query($connection, $psql);
    if ($result_psql->num_rows > 0) {
        while ($rows = mysqli_fetch_assoc($result_psql)) {
            $id_for_update = $rows['master_id'];
            $tag = $rows['tag'];
            $matric_no = $rows['student_id'];
            $Firstname = $rows['Firstname'];
            $Lastname = $rows['Lastname'];
            $school = $rows['School'];
            $department = $rows['Department'];
            $gender = $rows['Gender'];
        }
        $bmi_update = "SELECT * FROM bmi where rfid_ref= '{$tag}'";
        $result_bmisql = mysqli_query($connection, $bmi_update);
        if ($result_bmisql->num_rows > 0) {
            while ($bmi_rows = mysqli_fetch_assoc($result_bmisql)) {
                $bmi_id_for_update = $bmi_rows['bmi_id'];
                $bmi_tag = $bmi_rows['rfid_ref'];
                $height = $bmi_rows['Height'];
                $weight = $bmi_rows['Weight'];
            }
        }else{
            $noBMI="This user has no BMI DATA,  <a href='medical.php'>add one</a>";
        }
    }
}
//update query
if (isset($_POST['updateTag'])) {
    $update_id = ($_POST['id']);
    $up_tag = $_POST['tag'];
    $up_matric=$_POST['matric'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $school = $_POST['school'];
    $department = $_POST['dept'];
    $gender = $_POST['gender'];


    $usql = "UPDATE masters_tb SET tag='{$up_tag}',student_id='{$up_matric}',Firstname='{$firstname}',Lastname='{$lastname}',School='{$school}',Department='{$department}',Gender='{$gender}' WHERE master_id='$update_id' ";
    $result_usql = mysqli_query($connection, $usql);
    if ($result_usql) {
        echo "<script>alert('Tag details updated')</script>";
//        header('Location:all_tags.php');
        page_redirect('all_tags.php?Umessage=correct');
    } else {

        $Emessage = " Unable to Update";
    }
}



//update query for bmi
if (isset($_POST['update_bmi'])) {
    $bmi_up_tag = $_POST['uptag'];
    $height_up= $_POST['height'];
    $weight_up = $_POST['weight'];


    $usql = "UPDATE bmi SET Height='{$height_up}',Weight='{$weight_up}'WHERE rfid_ref='$bmi_up_tag' ";
    $result_usql = mysqli_query($connection, $usql);
    if ($result_usql) {
        echo "<script>alert('Tag BMI details updated')</script>";
//        header('Location:all_tags.php');
        page_redirect('all_tags.php?Umessage=correct');
    } else {

        $Emessage = " Unable to Update";
    }
}



?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>UPDATE TAG DETAILS</div>
                <div class="card-body">

                    <?php
                    if (!empty($Smessage)) {
                        echo "<p class='alert alert-success'> $Smessage  <a  id=\"linkClose\" href=\"allproduct.php\" class=\"close\" >&times;</a></p>";
                    }
                    if (!empty($Emessage)) {
                        echo " >&times;</a> </p>";
                    }
                    if (!empty($Emmessage)) {
                        echo "<p class='alert alert-danger'> $Emmessage <a  id=\"linkClose\" href=\"allproduct.php\" class=\"close\" >&times;</a></p>";
                    }

                    ?>

                    <form method="POST" action="update_tag.php" enctype="multipart/form-data">


                        <div class="form-group">

                            <input type="text" class="form-control" hidden name="id" value="<?php echo $id_for_update; ?>" />


                        </div>
                        <div class="form-group">
                            <b>TAG:
                                <input type="text" class="form-control" name="tag" value="<?php echo $tag; ?>" />

                            </b>
                        </div>

                        <div class="form-group">
                            <b>MATRIC NO.:
                                <input type="text" class="form-control" name="matric" value="<?php echo $matric_no; ?>" />

                            </b>
                        </div>
                        <div class="form-group">
                            <b>FIRST NAME:
                                <input type="text" class="form-control" name="fname" value="<?php echo $Firstname; ?>" />

                            </b>
                        </div>

                        <div class="form-group">
                            <b>LAST NAME:
                                <input type="text" class="form-control" name="lname" value="<?php echo $Lastname; ?>"  />

                            </b>
                        </div>
                        <div class="form-group">
                            <b>SCHOOL:
                                <input type="text" class="form-control" name="school" value="<?php echo $school; ?>"  />

                            </b>
                        </div>

                        <div class="form-group">
                            <b>DEPARTMENT:
                                <input type="text" class="form-control" name="dept" value="<?php echo $department; ?>" />

                            </b>

                        </div>

                        <div class="form-group">
                            <b>GENDER:
                                <input type="text" class="form-control" name="gender" value="<?php echo $gender; ?>" />
                            </b>


                        </div>


                        <button type="submit" id="upload" name="updateTag" class="btn btn-primary">Update Tag</button>
                        <a href="allproduct.php" class="btn btn-danger">Cancel</a>


                    </form>
<hr class="mt-4">

                </div>
            </div>
            <?php
            if (!empty($noBMI)) {
                echo "<p class='alert alert-info'> $noBMI <a  id=\"linkClose\"  class=\"close\" >&times;</a></p>";
            }else{
            ?>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>UPDATE BMI DETAILS</div>
                <div class="card-body">

                    <form method="POST" action="update_tag.php">


                        <div class="form-group">

                                <input type="text" class="form-control" name="uptag" hidden placeholder="Tag ID" value="<?php echo $bmi_tag; ?>"   />
                        </div>
                        <div class="form-group">
                            <b>HEIGHT:
                                <input type="text" class="form-control" name="height" placeholder="Student height" value="<?php echo $height; ?>" required />

                            </b>
                        </div>
                        <div class="form-group">
                            <b>WEIGHT:
                                <input type="text" class="form-control" name="weight" placeholder="Student weight" required value="<?php echo $weight; ?>" />

                            </b>
                        </div>


                        <button type="submit" id="upload" name="update_bmi" class="btn btn-primary">Update</button>

                    </form>
                </div>
            </div>
            <?php
            }
 ?>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>