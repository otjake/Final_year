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
                $gender= inputtype($_POST["school"]);



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




function review_view()
{
    global $connection;
    $sql = "SELECT * FROM reviews";   //$psql="SELECT * FROM posts LIMIT 0,2";

    $results_per_page = 2;

    $result = mysqli_query($connection, $sql);

    $number_of_results = mysqli_num_rows($result);
    //    if($result_psql->num_rows >0){

    //determine number of total pages available
    $number_of_pages = ceil($number_of_results / $results_per_page);

    //determine which page number visitor is currently on
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    //DETERMINE THE SQL LIMIT starting number for the results on the display page
    $this_page_first_result = ($page - 1) * $results_per_page;

    //sql query to get the items of each page
    global $connection;
    $sql = "SELECT * FROM reviews ORDER BY id DESC LIMIT " . $this_page_first_result . ',' . $results_per_page;
    $result = mysqli_query($connection, $sql);


    while ($rows = mysqli_fetch_array($result)) {

        echo "<div class='jumbotron' style='background-color:'whitesmoke'>";
        echo "<p class='blog-post-meta'>" . $rows['date_created'] . "</p>";
        echo "<a href='#'>" . $rows['name'] . "</a><br>";
        $body = $rows['comments'];
        echo $body;
        $post_id = $rows['id'];
        $display = $rows['display'];
        echo "<br>";
        echo "<br>";

        if ($display == 1) {
            echo "<a href='display_review.php?posts=" . $post_id . "' class='btn btn-primary' style='display:none;'>Allow</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        } else {
            echo "<a href='display_review.php?posts=" . $post_id . "' class='btn btn-primary'>Allow</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        echo "<a href='#' onclick='delete_review({$post_id})' class='btn btn-danger'>DELETE</a>";
        echo "<br>";
        echo "<br>";
        echo "<hr>";
        echo "</div>";
    }

    //displaying page links numbers
    for ($page = 1; $page <= $number_of_pages; $page++) {
        echo "<ul class='pagination '>
 <li><a href='review.php?page=" . $page . "'>" . $page . "</a></li></ul>";
    }
}


?>
<?php
function search_result()
{
    if (isset($_GET['search'])) { //if we are not looking  to get categories run the code below

        $user_search = $_GET['search_query'];

        global $connection;

        $get_post = "SELECT * FROM posts WHERE keyword like '%$user_search%'"; //displaying search posts like keywords

        $run_post = mysqli_query($connection, $get_post);
        if ($run_post->num_rows > 0) {

            while ($rows = mysqli_fetch_array($run_post)) {


                echo "<div class='jumbotron' style='background-color:'whitesmoke'>";
                echo "<p class='blog-post-meta'>" . $rows['date'] . "</p>";
                echo "<a href='#'>" . $rows['author'] . "</a><br>";
                echo "<p class='blog-post-meta'>" . $rows['title'] . "</p>";
                $body = $rows['body'];
                $body_len = substr($body, 0, 100); //length of words to display
                echo $body_len . "...";
                $post_id = $rows['post_id'];

                echo "<br>";
                echo "<a href='edit.php?posts=" . $post_id . "' class='btn btn-primary'>UPDATE</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                echo "<a href='delete.php?posts=" . $post_id . "'  onclick='return confirm('Are you sure ?)' class='btn btn-danger'>DELETE</a>";
                echo "<br>";
                echo "<br>";
                echo "<hr>";
                echo "</div>";
            }
        } else {
            echo "<div class='jumbotron' style='background-color:'white'>";
            echo "<h2 class='error' >Ooops your search dosen't match any description try another format</h2>";
            echo "</div>";
        }
    }
}



?>

<?php

function get_reviews()
{
    global $connection;
    $reviews_query = "SELECT * FROM reviews order by id desc ";
    $reviews_result = mysqli_query($connection, $reviews_query);
    return $reviews_result;
}
?>