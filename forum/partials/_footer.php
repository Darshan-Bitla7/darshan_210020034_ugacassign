<!-- <div class="container-fluid bg-dark text-light  ">
    <p class="text-center">
        Copyright &copy; 2023 | All Rights Reserved
    </p>
</div> -->
<style>
.footer-basic {
    padding: 40px 0;
    background-color: #ffffff;
    background-color: #eeeeee;
    /* background-color: ; */
    color: #4b4c4d;
    color: black;
}

.footer-basic ul {
    padding: 0;
    list-style: none;
    text-align: center;
    font-size: 18px;
    line-height: 1.6;
    margin-bottom: 0;
}

.footer-basic li {
    padding: 0 10px;
}

.footer-basic ul a {
    color: inherit;
    text-decoration: none;
    opacity: 0.8;
    position: relative;
}

.footer-basic ul a::before {
    content: "";
    position: absolute;
    width: 100%;
    height: 2px;
    bottom: -5px;
    left: 0;
    background-color: #000;
    visibility: hidden;
    transform: scaleX(0);
    transition: all 0.2s ease-in-out;
}

.footer-basic ul a:hover::before {
    visibility: visible;
    transform: scaleX(1);
}

.footer-basic ul a:hover {
    opacity: 1;
}

.footer-basic .social {
    text-align: center;
    padding-bottom: 25px;
}

.footer-basic .social>a {
    font-size: 24px;
    width: 40px;
    height: 40px;
    line-height: 40px;
    display: inline-block;
    text-align: center;
    border-radius: 50%;
    border: 1px solid #ccc;
    margin: 0 8px;
    color: inherit;
    opacity: 0.75;
    transition: transform 0.3s ease-in-out;
}

.footer-basic .social>a:hover {
    opacity: 0.9;
    transform: scale(1.2);
}

.footer-basic .copyright {
    margin-top: 15px;
    text-align: center;
    font-size: 13px;
    color: #aaa;
    margin-bottom: 0;
}
</style>
<div class="footer-basic">
    <footer>
        <div class="social"><a href="#"><i class="fa-brands fa-instagram "></i></a><a href="#"><i
                    class="fa-brands fa-snapchat"></i></a><a href="#"><i class="fa-brands fa-twitter"></i></a><a
                href="#"><i class="fa-brands fa-facebook-f"></i></a></div>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Home</a></li>
            <li class="list-inline-item"><a href="#">Services</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
        </ul>
        <p class="copyright">SAIDIT &copy 2023</p>
    </footer>
</div>