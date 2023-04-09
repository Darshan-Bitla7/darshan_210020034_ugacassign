<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>
    <style>
    .media {
        display: flex;
    }

    @media (min-width: 0) {
        .g-pa-30 {
            padding: 2.14286rem !important;
            padding: 1.5rem !important;
        }
    }

    .commentt {
        /* font-family: 'Poppins', sans-serif; */
        background-color: #2b6777;
        background-color: #c8d8e4;
        background-color: #eeeeee;
        /* border-radius: 5%; */
        width: 80%;
        margin-left: 10px;
        margin-bottom: 20px;
        color: white;
        color: black;
        color: #2b6777;
        color: black;
    }

    .commenthead h3,
    h5 {
        margin: 0;
    }

    /* .commenthead h3 {
    font-size: 2vw;
    } */
    @media (max-width: 400px) {
        .commenthead h3 {
            font-size: 400vh;
        }
    }

    @media (min-width: 401px) {
        .commenthead h3 {
            font-size: 2vw;
        }
    }

    .commentout img {
        width: 50px;
        height: 50px;
        margin-top: 10px;
    }

    .commentout {
        display: flex;
        margin: 0;
    }

    .spacer {
        margin-left: 10%;
    }

    .adder {
        margin-bottom: 20px;
    }
    </style>
    <?php include 'partials/_header.php'; ?>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
    }
    ?>
    <?php
    $showAlert = false;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $comment = $_POST['comment'];
        $val=$_SESSION['sno'];
        // echo var_dump($val);
         $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`,
          `comment_time`) VALUES ( '$comment', '$id', '$val' , current_timestamp())";
         $result = mysqli_query($conn, $sql);
         $showAlert = true;
    }
    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your comment has been added! 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4 py-2"> <?php echo $title;  ?></h1>
            <p class="lead py-2"><?php echo $desc;  ?></p>
            <hr class="my-4">
            <p class="py-2" style="margin-top:-20px;">This is a peer to peer channel to share knowledge with each other
            </p>
            <!-- <p>Posted by </p> -->
        </div>
    </div>
    <div class="container">
        <h3 class="py-2">Add a comment</h3>
        <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
            <div class="mb-3">
                <label for="desc" class="form-label">Type your comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                <input type="hidden" name="sno" value=<?php $_SESSION['sno']?>>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color:black; border-color:white;">Post
                Comment</button>

        </form>
    </div>
    <div class="container">
        <h1 class="py-2">Discussions </h1>
        <?php
            $id = $_GET['threadid'];
            $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['comment_id'];
                $content = $row['comment_content'];
                $time = $row['comment_time'];
                $thread_user_id = $row['comment_by'];
                $sql2="SELECT username FROM `users` WHERE id = '$thread_user_id'";
                $result2=mysqli_query($conn, $sql2);
                $row2=mysqli_fetch_assoc($result2);
            
                // echo'<div class="media">
                //         <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" width="34px" height="34px"
                //         class="mr-3" alt="...">
                //         <p class="font-weight-bold my-0">Posted by '.$row2['username'] .' </p>
                //         <hr><br>
                //         <div class="media-body mb-3">
                //         <p>'.'  '.$content.'</p>
                //         </div>
                        
                //     </div>';
                echo '<div class="commentout">
                            <img
                                class=""
                                src="images/user.png"
                                alt="Image Description"
                            />
                            <div class="commentt g-pa-30" data-aos="zoom-in">
                                <div class="commenthead">
                                <h5 class="commenter">'.$row2['username'] .'</h5>
                                <span class="comment-time">'.$time.'</span>
                                </div>
                                <p>
                                '.$content.'
                                </p>
                            </div>
                        </div>';
                            
            }
        ?>
    </div>

    <?php include 'partials/_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/354b6f899d.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
</body>

</html>