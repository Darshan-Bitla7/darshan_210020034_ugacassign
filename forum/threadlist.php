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
    <title> Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body id="barba-wrapper">

    <style>
    @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

    .media {
        display: flex;
    }

    .container {
        width: 70%;
    }

    .display-4 {
        font-family: 'IBM Plex Mono', monospace;

    }

    body {
        background-color: #c8d8e4;
        background-color: #2b6777;
        background-color: white;
    }

    .hero {
        /* background-image: url("images/image1.jpeg"); */
        background-image: linear-gradient(to bottom, rgba(2, 0, 36, 0.21), rgba(54, 19, 38, 0.77)), url("images/image<?php echo $_GET['catid']; ?>.jpeg");
        background-image: linear-gradient(to bottom, rgba(2, 0, 36, 0.21), rgba(46, 25, 25, 0.77)), url("images/image<?php echo $_GET['catid']; ?>.jpeg");
        background-size: cover;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .hero::after {
        content: "";

        /* background: rgba(0, 0, 0, 0) linear-gradient(to bottom, rgba(0, 0, 0, 0) 0px, rgba(0, 0, 0, 0.6) 100%) repeat 0 0; */
    }

    .desc {
        color: white;
        width: 70%;
        text-align: center;
    }

    .displayhead {
        font-family: 'IBM Plex Mono', monospace;
        font-size: 7vh;
        font-size: 6.45vw;
        text-shadow: black 2em 2em 2em;

    }

    .lead {
        font-family: 'Poppins', sans-serif;
        /* font-size: 2.5vh;*/
        font-size: 1.6vw;
        text-shadow: black 0.1em 0.1em 0.2em;
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
            font-size: 3vh;
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
    <div class="barba-container">
        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `categories` WHERE category_id=$id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $catname = $row['category_name'];
            $catdesc = $row['category_description'];
        }
        ?>
        <?php
        $showAlert = false;
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $th_title = $_POST['title'];
            $th_desc = $_POST['desc'];
            $val=$_SESSION['sno'];
            $sql="INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, 
            `thread_user_id`, `timestamp`) VALUES ( '$th_title', '$th_desc', '$id', '$val', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            $showAlert = true;
        }
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your thread has been added! Please wait for community to respond.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        ?>



        <div class="hero">
            <div class="desc">
                <h1 class="displayhead" data-aos="zoom-in" data-aos-duration="1800">Welcome to <?php echo $catname;  ?>
                    Forums!</h1>
                <p class="lead" data-aos="slide-up" data-aos-duration="1800"><?php echo $catdesc;  ?></p>
                <hr class="my-4">
                <p style="font-size:1.2vw;  text-shadow: black 0.1em 0.1em 0.2em;">This is a peer to peer channel to
                    share
                    knowledge with each other</p>
                <a class="btn btn-primary btn-lg" href="#start" role="button"
                    style="background-color:black; border-color:white;">Learn
                    more</a>
            </div>
        </div>

        </script>
        <div class="container">
            <div class="adder">
                <h2 class="py-2 text-center" style="color:black; margin-top:8px;" id="start">Activity Feed</h2>
                <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Title-Keep it catchy and crisp"
                            name="title" aria-describedby="emailHelp">
                        <!-- <div id="emailHelp" class="form-text">Keep your title catchy and crisp</div> -->
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label" style="color:black;">Description</label>
                        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn" style="background-color:black; color:white;">Submit</button>
                </form>
            </div>
            <!-- <img src="images/image<?php echo$_GET['catid']; ?>.jpeg" alt=""> -->
            <!-- <h1 class="py-2">Browse Questions</h1> -->
            <?php
                $id = $_GET['catid'];
                $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
                $result = mysqli_query($conn, $sql);
            $noResult = true;
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['thread_id'];
                    $title = $row['thread_title'];
                    $desc = $row['thread_desc'];
                    $thread_time = $row['timestamp'];
                    $thread_user_id = $row['thread_user_id'];
                    $sql2="SELECT username FROM `users` WHERE id = $row[thread_user_id]";
                    $result2=mysqli_query($conn, $sql2);
                    $row2=mysqli_fetch_assoc($result2);

                    $noResult = false;
                    // echo '<div class="media my-3">
                    //        <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" width="54px" class="mr-3" alt="...">
                    //        <div class="media-body">'.
                    //             '<h5 class="mt-0"> <a class="text-dark" href="thread.php?threadid=' . $id. '">'
                    //             . $title . ' </a></h5>'. $desc . ' </div>'.'<div class="font-weight-bold my-0"> 
                        //             Asked by: '.$row2['username'].'</div>'.'</div>';
                    echo '
                    <div class="spacer">
                        <div class="commentout">
                            <img
                                class=""
                                src="images/user.png"
                                alt="Image Description"
                            />
                            <div class="commentt g-pa-30" data-aos="zoom-in">
                                <div class="commenthead">
                                <h3><a class="" style="color:black; text-decoration:none; " href="thread.php?threadid=' . $id. '">'
                                    . $title . ' </a></h3>
                                <h6 style="margin:0;" class="commenter">'.$row2['username'].'</h6>
                                <span class="comment-time">'.$thread_time.'</span>
                                </div>
                                <p>
                                '. $desc . '
                                </p>
                            </div>
                        </div>
                    </div>';            
                }
                if($noResult){
                    echo '
                    <div class="container text-center">
                        <h5 class="display-4">No Threads Found</h5>
                        <p class="">Be the first person to ask a question</p>
                    </div>
                ';
                }
            ?>

        </div>
    </div>
    <?php include 'partials/_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/354b6f899d.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/typed.js@2.0.15/dist/typed.umd.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
</body>

</html>