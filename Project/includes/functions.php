<?php

function inputtype($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function page_redirect($location = NULL)
{
    if ($location != NULL) {
        header("Location:{$location}");
        exit;
    }
}

function tag_upload_form2()
{

    global $connection;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['upload'])) {
            if (!empty($_POST['tag'])  && !empty($_POST["matric"]) && !empty($_POST["fname"])  && !empty($_POST["lname"]) &&  !empty($_POST["school"]) && !empty($_POST["dept"]) && !empty($_POST["gender"])) {
                $tag = ($_POST['tag']);
                $matric = inputtype($_POST["matric"]);
                $fname = inputtype($_POST["fname"]);
                $lname = inputtype($_POST["lname"]);
                $school = inputtype($_POST["school"]);
                $dept = inputtype($_POST["dept"]);
                $gender= inputtype($_POST["school"]);

                //to get specific id so we know where we are updating
                $check_code = "SELECT * FROM stock WHERE product_code='{$p_code}'";
                $check_code_result = mysqli_query($connection, $check_code);
                if ($check_code_result->num_rows > 0) {
                    global $double_code_message;
                    $double_code_message = "This Code Already In Use";
                } else {

                    $usql = "INSERT INTO stock (category,sub_category,quantity,product_code,date_created) VALUES ('{$category}','{$sub_category}','{$quantity}','{$p_code}','{$date}')";
                    $result = $connection->query($usql);
                    if ($result) {

                        global $Smessage;
                        $Smessage = "Upload Successful";
                    } else {

                        global $Emessage;
                        $Emessage = "Upload Failed";
                    }
                }
            } else {

                global $Emmessage;
                $Emmessage = "you left tabs empty";
            }
        }
    }
}

function tag_upload_form()
{

    global $connection;


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['uploadT'])) {
            if (!empty($_POST['tag'])  && !empty($_POST["matric"]) && !empty($_POST["fname"])  && !empty($_POST["lname"]) &&  !empty($_POST["school"]) && !empty($_POST["dept"]) && !empty($_POST["gender"])) {
                $tag = ($_POST['tag']);
                $matric = $_POST["matric"];
                $fname = inputtype($_POST["fname"]);
                $lname = inputtype($_POST["lname"]);
                $school = inputtype($_POST["school"]);
                $dept = inputtype($_POST["dept"]);
                $gender= inputtype($_POST["gender"]);



                $pusql = "INSERT INTO masters_tb (tag,student_id,Firstname,Lastname,school,department,gender,date_created) 
                        VALUES ('{$tag}','{$matric}','{$fname}','{$lname}','{$school}','{$dept}','{$gender}',NOW())";
                $result = $connection->query($pusql);
                if ($result) {
                    global $Smessage;
                    $Smessage = "Upload Successful";
                } else {
                    echo "<script>alert('Data Has Not been recorded')</script>";
                    global $Emessage;
                    $Emessage = "Upload Failed";
                }
            } else {

                global $Emmessage;
                $Emmessage = "you left tabs empty";
            }
        }
    }
}

function bmi_upload_form()
{

    global $connection;


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['uploadM'])) {
            if (!empty($_POST['tag']) && !empty($_POST["height"])  && !empty($_POST["weight"])) {
                $tag = $_POST["tag"];
                $height = inputtype($_POST["height"]);
                $weight = inputtype($_POST["weight"]);



                $pusql = "INSERT INTO bmi (rfid_ref,height,weight,Date_created) 
                        VALUES ('{$tag}','{$height}','{$weight}',NOW())";
                $result = $connection->query($pusql);
                if ($result) {
                    global $Smessage;
                    $Smessage = "Upload Successful";
                } else {
                    echo "<script>alert('Data Has Not been recorded')</script>";
                    global $Emessage;
                    $Emessage = "Upload Failed";
                }
            } else {

                global $Emmessage;
                $Emmessage = "you left tabs empty";
            }
        }
    }
}





?>
