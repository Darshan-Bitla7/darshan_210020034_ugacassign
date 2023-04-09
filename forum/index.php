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
    <title>SaidIt Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


</head>

<body>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@500&family=Poppins&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Viga&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap');


    /* .cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        margin-top: 5%;
    } */
    .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-left: 5%;
        margin-right: 5%;
        margin-top: 5%;
    }

    .card {
        width: calc(25% - 20px);
        margin-bottom: 40px;
        position: relative;
        overflow: hidden;
        /* cursor: pointer; */
        /* box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1); */
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.7);
        transition: all 0.3s ease-out;
    }

    .card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: opacity 0.3s ease-in-out;
    }

    .card-title {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        padding: 10px;
        margin-bottom: 0px;
        color: #fff;
        font-size: 18px;
        text-align: center;
        /* opacity: 0; */
        transition: opacity 0.3s ease-in-out;
    }

    /* .card-title {
  display: block;
  text-align: center;
  color: #fff;
  background-color: #6184a8;
  padding: 2%;
  border-top-right-radius: 4px;
  border-top-left-radius: 4px;
} */

    .card:hover .card-title {
        opacity: 0;
    }

    .card:hover {
        transform: translateY(-12px);
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.9);
    }

    .card-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        padding: 20px;
        background-color: rgba(0, 0, 0, 0.5);
        transform: translateY(100%);
        transition: transform 0.3s ease-in-out;
    }

    .card:hover .card-overlay {
        transform: translateY(0);
    }

    .card-overlay h3 {
        color: #fff;
        margin-bottom: 10px;
    }

    .card-overlay p {
        color: #fff;
        font-size: 14px;
    }

    @media (max-width: 768px) {
        .card {
            width: 100%;
            max-width: 300px;
        }

        .card img {
            height: auto;
            max-height: 200px;
        }

        .card-overlay {
            padding: 10px;
        }

        .card-overlay h3 {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .card-overlay p {
            font-size: 12px;
        }
    }


    .hero {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        /* background-image: linear-gradient(to bottom,
                rgba(2, 0, 36, 0.21),
                rgba(46, 25, 25, 0.77)),
            url("images/back1.jpeg");
        background-size: cover; */
        height: 100vh;
        color: white;
    }

    .desc {
        /* display: flex;
        flex-direction: column;
        justify-content: center; */
        margin-left: 3%;
        font-family: 'IBM Plex Mono', monospace;
        font-family: 'Poppins', sans-serif;
    }

    h1 {
        margin: 0;
        font-size: 5vw;
        font-family: 'Viga', sans-serif;
    }

    h2 {
        margin: 0;
        font-size: 5vw;
        font-family: 'Press Start 2P', cursive;
        font-family: 'Black Ops One', cursive;
    }

    /* .heroimg {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 5%;
    }

    .heroimg img {
        width: 300px;
    } */

    @media (max-width: 600px) {
        .heroimg img {
            width: 150px;
        }

    }

    #pre-loader {
        position: fixed;
        width: 100%;
        height: 100vh;
        background: #36465d url("images/loader.gif") no-repeat center center;
        z-index: 9999;
    }
    </style>

    <?php include 'partials/_header.php';
          include('partials/_dbconnect.php'); ?>
    <div id="pre-loader"></div>
    <div class="hero" id="hero">
        <div class="desc">
            <div class="text-center">
                <img src="images/turbopack-icon.svg" alt="" />
            </div>
            <h1 data-aos="zoom-out" data-aos-duration="6500">Say it with SAIDIT</h1>
            <h2 class="auto-type">Create</h2>
            <!-- <h2 class="auto-type">Converse</h2>
            <h2 class="auto-type">Collaborate</h2> -->
        </div>
        <!-- <div class="heroimg">
            <img src="images/turbopack-icon.svg" alt="" />
        </div> -->
    </div>
    <h1 class="text-center" style="padding-top:20px;" data-aos="zoom-in" data-aos-duration="600">Explore different
        categories</h1>
    <div class="cards">
        <?php
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);
        $delay = 400;
        echo '<div class="card-container">';
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['category_id'];
                // echo '<div class="card" style="width: 16rem;">
                //     <img src="https://source.unsplash.com/500x300" class="card-img-top" alt="...">
                //     <div class="card-body">
                //         <h5 class="card-title"><a href="threadlist.php?catid='.$id.'"> ' . $row['category_name'] . '</a> </h5>
                //         <p class="card-text">' . $row['category_description'] . '</p>
                         
                //     </div>
                //     </div>';
                echo '<div data-aos="slide-right" data-aos-duration="'.$delay.'" class="card">
                            <img src="images/card'.$id.'.jpg" alt="card image" />
                            <h3 class="card-title"><a style="color:white; text-decoration:none;" href="threadlist.php?catid='.$id.'"> ' . $row['category_name'] . '</a></h3>
                            <div class="card-overlay">
                            <h3 class="text-center"><a style="color:white; text-decoration:none;" href="threadlist.php?catid='.$id.'"> ' . $row['category_name'] . '</a></h3>
                            <p><a style="color:white; text-decoration:none;" href="threadlist.php?catid='.$id.'">' . $row['category_description'] . '</a></p>
                            </div>
                       </div>';
                $delay = $delay + 600;
            }
        echo '</div>';
            ?>
    </div>

    <!-- </div> -->
    <?php include 'partials/_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/354b6f899d.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.rings.min.js"></script>
    <script>
    VANTA.RINGS({
        el: "#hero",
        mouseControls: true,
        touchControls: true,
        gyroControls: false,
        minHeight: 200.00,
        minWidth: 200.00,
        scale: 1.00,
        scaleMobile: 1.00
    })
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://unpkg.com/typed.js@2.0.15/dist/typed.umd.js"></script>
    <script>
    var typed = new Typed(".auto-type", {
        strings: ["Create.", "Converse.", "Collaborate."],
        typeSpeed: 80,
        backSpeed: 50,
        loop: true
    });
    </script>
    <script>
    AOS.init();
    </script>

    <script>
    window.addEventListener('load', delay);

    function delay() {
        console.log('before timeout');
        setTimeout(function() {
            console.log('after timeout');
            document.getElementById('pre-loader').style.display = 'none';
        }, 2000);
    }
    </script>
</body>

</html>