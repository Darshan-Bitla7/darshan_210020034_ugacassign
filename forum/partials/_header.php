<?php
// echo'<nav class="navbar navbar-expand-lg bg-body-tertiary" style="position:sticky; top:0; z-index:2;">
//   <div class="container-fluid">
//     <a class="navbar-brand" href="#"><img style="height:50px;" src="https://seeklogo.com/images/T/turbopack-icon-logo-77EE129FEC-seeklogo.com.png" alt="" />
//                 <span class="logo">SAIDIT</span></a>
//     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
//       <span class="navbar-toggler-icon"></span>
//     </button>
//     <div class="collapse navbar-collapse" id="navbarSupportedContent">
//       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
//       <li class="nav-item">
//           <p style="margin:0; padding:8px" class="">HELLO, '.$_SESSION['username'].' !</p>
//         </li>
        
//       <li class="nav-item" style="padding-left:250px">
//           <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
//         </li> 
//         <li class="nav-item">
//                     <a
//                       class="nav-link active"
//                       aria-current="page"
//                       href="threadlist.php?catid=1"
//                       >TECHNOLOGY</a
//                     >
//                   </li>
//                   <li class="nav-item">
//                     <a
//                       class="nav-link active"
//                       aria-current="page"
//                       href="threadlist.php?catid=2"
//                       >SPORTS</a
//                     >
//                   </li>
//                   <li class="nav-item">
//                     <a
//                       class="nav-link active"
//                       aria-current="page"
//                       href="threadlist.php?catid=3"
//                       >GAMING</a
//                     >
//                   </li>
//                   <li class="nav-item">
//                     <a
//                       class="nav-link active"
//                       aria-current="page"
//                       href="threadlist.php?catid=4"
//                       >HEALTH
//                     </a>
//                   </li>
        
//       </ul>
//       <form class="d-flex" role="search">
//         <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
//         <button class="btn" style="margin-right:3px;" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
//       </form>
//       <a href="logout.php"><button class="btn" type="submit"><i class="fa-solid fa-right-from-bracket"></i></button></a>
//     </div>
//   </div>
// </nav>';
echo '<nav class="navbar navbar-expand-lg bg-body-tertiary" style="position:sticky; top:0; z-index:2;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img style="height:50px;" src="https://seeklogo.com/images/T/turbopack-icon-logo-77EE129FEC-seeklogo.com.png" alt="" />
                <span class="logo">SAIDIT</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <p style="margin:0; padding:8px" class="">HELLO, '.$_SESSION['username'].' !</p>
        </li>
        
      <li class="nav-item" style="padding-left:250px">
          <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
        </li> 
        <li class="nav-item">
                    <a
                      class="nav-link active"
                      aria-current="page"
                      href="threadlist.php?catid=1"
                      >TECHNOLOGY</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link active"
                      aria-current="page"
                      href="threadlist.php?catid=2"
                      >SPORTS</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link active"
                      aria-current="page"
                      href="threadlist.php?catid=3"
                      >GAMING</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link active"
                      aria-current="page"
                      href="threadlist.php?catid=4"
                      >HEALTH
                    </a>
                  </li>
        
      </ul>
      
      <a href="logout.php"><button class="btn" type="submit"><i class="fa-solid fa-right-from-bracket"></i></button></a>
    </div>
  </div>
  <style>
    .navbar-nav li a {
      position: relative;
      text-decoration: none;
    }
    .navbar-nav li a::before {
      content: "";
      position: absolute;
      width: 0;
      height: 2px;
      bottom: 0;
      left: 0;
      background-color: black;
      visibility: hidden;
      transition: all 0.3s ease-in-out;
    }
    .navbar-nav li a:hover::before {
      visibility: visible;
      width: 100%;
    }
    .navbar a i {
      transition: transform 0.2s ease-in-out;
    }

    .navbar a :hover i {
      transform: scale(1.2);
    }
      </style>
    </nav>
';
?>