<?php
session_start();
include '../php/connection.php';
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("Location: ../sign-in.php?pesan=belum_login");
    exit();
}
include '../php/read-users.php';
include '../php/read-project.php';  

$paket = $_GET["paket"];
$i = 1;
$f = 1;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Title -->
        <link rel="icon" href="../asset/logo/logo_1.png">
        <title>Pricing</title>
        <link rel="stylesheet" href="../style/style_pricing.css">
        <!-- Google Fonts Roboto -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link
            rel="preconnect"
            href="https://fonts.gstatic.com"
            crossorigin="crossorigin">
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet">
        <!-- Link Style CSS -->
        <link rel="stylesheet" href="../style/nav_bar.css">
        <link rel="stylesheet" href="../style/footer.css"/>
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/global.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation Bar after-->
        <nav>
    <div class="navbar-toggle">
        <div class="navbar-logo"><a href="index.php"><img src="../asset/logo/logo_2.png" alt=""></a></div>
        <button class="navbar-toggle-button" onclick="toggleColor()">☰</button>
    </div>
    <div class="navbar">
            <div class="navbar-menu">
                <a href="profil.php" class="my-profil"><span class="navbar-text">My Profil</span></a>
                <a href="index.php" class="navbar-item "><span class="navbar-text">Home</span></a>
                <a href="about.php" class="navbar-item"><span class="navbar-text">About</span></a>
                <a href="pricing.php" class="navbar-item"><span class="navbar-text">Pricing</span></a>
                <a href="logactivity.php" class="logactivity" ><span class="navbar-text">Log Activity</span></a>
            </div>
        <div class="navbar-logo"><a href="index.php"><img src="../asset/logo/logo_2.png" alt=""></a></div>
        <div class="navbar-actions">
            <a href="submit-project/submit-project-1.php" class="navbar-button-alt"><div class="navbar-button-text-alt">Submit Project</div></a>
            <a href="../php/php-log-out.php" class="navbar-button-logout"><div class="navbar-button-text-alt">logout</div></a>    
            <div class="button-dropdown">
                <div class="button-dropdown-1 margin-auto">
                    <!-- <div class="foto-profil" style="background-image: url('../asset/pp.png');"></div> -->
                    <div class="foto-profil" style="<?php 
                    if ($rows["profilePicture"] == ""){
                        echo "background-image:url('../asset/users/user/default-profil.jpg');";
                    } else {
                        echo "background-image:url('../asset/users/user/".$rows["profilePicture"]."');";
                    }
                    ?>"></div>
                </div>
                <label for="" class="bold nama-profil" ><?php echo $rows['firstName']; ?></label>
                <div class="button-dropdown-2 margin-auto">
                    <img src="../asset/chevron-down.png" alt="" class="button-contained-img">
                </div>
                                
                <div class="dropdown-content">
                    <a href="profil.php"><div class="List-dropdown">
                        <label for="" class="List-dropdown-label">My Profile</label>
                    </div></a>
                    <a href="edit profil/edit_profil_general.php"><div class="List-dropdown">
                        <label for="" class="List-dropdown-label">Edit Profile</label>
                    </div></a>
                    <a ><div class="List-dropdown billing ">
                        <label for="" class="List-dropdown-label">Billing</label>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6 0.75C4.55025 0.75 3.375 1.92525 3.375 3.375V4.875C2.54657 4.875 1.875 5.54657 1.875 6.375V9.75C1.875 10.5784 2.54657 11.25 3.375 11.25H8.625C9.45343 11.25 10.125 10.5784 10.125 9.75V6.375C10.125 5.54657 9.45343 4.875 8.625 4.875V3.375C8.625 1.92525 7.44975 0.75 6 0.75ZM7.875 4.875V3.375C7.875 2.33947 7.03553 1.5 6 1.5C4.96447 1.5 4.125 2.33947 4.125 3.375V4.875H7.875Z" fill="#6B7280"/>
                        </svg>
                    </div></a>
                    <a href="logactivity.php"><div class="List-dropdown">
                        <label for="" class="List-dropdown-label">LogActivity</label>
                    </div></a>
                    <a href="../php/php-log-out.php"><div class="List-dropdown-logout">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17 4.25C17 3.00736 15.9926 2 14.75 2H9.25C8.00736 2 7 3.00736 7 4.25V6.25C7 6.66421 7.33579 7 7.75 7C8.16421 7 8.5 6.66421 8.5 6.25V4.25C8.5 3.83579 8.83579 3.5 9.25 3.5H14.75C15.1642 3.5 15.5 3.83579 15.5 4.25V15.75C15.5 16.1642 15.1642 16.5 14.75 16.5H9.25C8.83579 16.5 8.5 16.1642 8.5 15.75V13.75C8.5 13.3358 8.16421 13 7.75 13C7.33579 13 7 13.3358 7 13.75V15.75C7 16.9926 8.00736 18 9.25 18H14.75C15.9926 18 17 16.9926 17 15.75V4.25Z" fill="#B91C1C"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14 10C14 9.58579 13.6642 9.25 13.25 9.25H3.70447L4.75172 8.30747C5.05961 8.03038 5.08457 7.55616 4.80747 7.24828C4.53038 6.94039 4.05616 6.91543 3.74828 7.19253L1.24828 9.44253C1.09024 9.58476 1 9.78738 1 10C1 10.2126 1.09024 10.4152 1.24828 10.5575L3.74828 12.8075C4.05616 13.0846 4.53038 13.0596 4.80747 12.7517C5.08457 12.4438 5.05961 11.9696 4.75172 11.6925L3.70447 10.75H13.25C13.6642 10.75 14 10.4142 14 10Z" fill="#B91C1C"/>
                    </svg>
                        <label for="" class="bold List-dropdown-label">Logout</label>
                    </div></a>
                </div>

            </div>
        </div>
    </div>
    <script src="../javascript/navbar.js"></script>
    
</nav>
        <br><br><br>
        <!-- content -->
        <div class="pricing-2">
            <form action="../php/proses-pricing-2.php" method="post">
            <div class="pricing-2-1">

                        <div class="head-tabel">
                            <img src="../asset/svg/Line.png" alt=""><h2 for="">Promote Your Project</h2>
                        </div><br>

                        <label for="" class="bold">Choose your project</label><br>
                        <select class="input-1" name="projectId" id="" >
                            <option value=""selected disabled>Click Here......</option>
                            <?php while($rows = mysqli_fetch_assoc($sql_pricing)) : ?>
                            <option value="<?php echo $rows["projectId"]?>"><?php echo $rows["projectName"]?></option>
                            <?php endwhile ;?>
                        </select><br><br>
                        
                        <label for="" class="bold">Promote Package</label><br>

                            <?php if($paket == 1) { ?>
                                <div class="disabled" >
                                    <label for="">Package 1</label>                   
                                    <a href="pricing.php" class="choose-pck">Choose Package</a>
                                    <input type="text" name="pricingPackage" value="1" hidden>
                                </div>
                            <?php } else if ($paket == 2 ) {?>
                                <div class="disabled" >
                                    <label for="">Package 2</label>                   
                                    <a href="pricing.php" class="choose-pck">Choose Package</a>
                                    <input type="text" name="pricingPackage" value="2" hidden>
                                </div>
                            <?php } else if ($paket == 3 ) {?>
                                <div class="disabled" >
                                    <label for="">Package 3</label>                   
                                    <a href="pricing.php" class="choose-pck">Choose Package</a>
                                    <input type="text" name="pricingPackage" value="3" hidden>
                                </div>
                            <?php } else if ($paket == 4 ) {?>
                                <div class="disabled" >
                                    <label for="">Package 4</label>                   
                                    <a href="pricing.php" class="choose-pck">Choose Package</a>
                                    <input type="text" name="pricingPackage" value="4" hidden>
                                </div>
                            <?php }?>
                            
                        <br>
                        <label for="" class="bold">Payment</label><br>
                            <select class="input-1" name="payment" id="" >
                                <option value=""selected disabled>Click Here......</option>
                                <option value="DANA">DANA</option>
                                <option value="GO-PAY">GO-PAY</option>
                                <option value="SHOPEE-PAY">SHOPEE-PAY</option>
                            </select><br><br>

                            <label class="roboto bold red">
                        <?php
                        if(isset($_GET['pesan'])){
                            if($_GET['pesan'] == "kosong"){
                                echo "Make sure the input data is filled in completely";
                            }
                        }
                        ?>
                        </label>
                        <label class="roboto bold green" >
                            <?php
                            if(isset($_GET['pesan'])){
                                if($_GET['pesan'] == "sukses"){
                                    echo "Your Project successfully Promoted";
                                }                        
                            }
                            ?>
                        </label><br><br>
                        <button type="submit" class="btn-promote">Promote</button>
            </div>
            </form>

            <div class="pricing-2-2">

                <?php if ($paket == '1'){?>
                <div id="paket1" class="list-pricing">
                    <div class="head-list-pricing">
                        <h2>Package 1</h2><br>
                        <label class="">Rp.39.000.-</label><br>
                        <label class="">/Month</label>
                    </div>
                    <div class="content-list-pricing">
                        <div class="benefit">
                            <img src="../asset/svg/check.svg" alt="">
                            <label for="">promote your project for 1 month</label>
                        </div>
                        <div class="benefit">
                            <img src="../asset/svg/check.svg" alt="">   
                            <label for="">show in project recommendations</label>
                        </div>
                    </div>
                </div>
                <?php }?>

                <?php if ($paket == '2'){?>
                <div class="list-pricing margin-auto">
                    <div class="head-list-pricing" >
                        <h2>Package 2</h2><br>
                        <label class="">Rp.59.000.-</label><br>
                        <label class="">/Month</label>
                    </div>
                    <div class="content-list-pricing">
                        <div class="benefit">
                            <img src="../asset/svg/check.svg" alt="">
                            <label for="">promote your project for 1 Month</label>
                        </div>
                        <div class="benefit">
                            <img src="../asset/svg/check.svg" alt="">
                            <label for="">show in project recommendations</label>
                        </div>
                        <div class="benefit">
                            <img src="../asset/svg/check.svg" alt="">
                            <label for="">show in top 3 homepage</label>
                        </div>
                        <div class="benefit">
                            <img src="../asset/svg/check.svg" alt="">
                            <label for="">label Sponsor</label>
                        </div>    
                    </div>   
                </div>
                <?php }?>

                <?php if ($paket == '3'){?>
                <div class="list-pricing">
                    <div class="head-list-pricing">
                        <h2>Package 3</h2><br>
                        <label class="">Rp.159.000.-</label><br>
                        <label class="">/Month</label>
                    </div>
                    <div class="content-list-pricing">
                        <div class="benefit">
                            <img src="../asset/svg/check.svg" alt="">
                            <label for="">promote your project for 1 years</label>
                        </div>
                        <div class="benefit">
                            <img src="../asset/svg/check.svg" alt="">
                            <label for="">show in project recommendations</label>
                    </div>
                    <div class="benefit">
                            <img src="../asset/svg/check.svg" alt="">
                            <label for="">show in top 3 homepage</label>
                        </div>
                        <div class="benefit">
                            <img src="../asset/svg/check.svg" alt="">
                            <label for="">label Sponsor</label>
                        </div>      
                 </div>
                <?php }?>
                
                <?php if ($paket == '4'){?>
                <div class="list-pricing margin-auto">
                    <div class="head-list-pricing" >
                        <h2>Package 4</h2><br>
                        <label class="">Rp.119.000.-</label><br>
                        <label class="">/Month</label>
                    </div>
                    <div class="content-list-pricing">
                        <div class="benefit">
                            <img src="../asset/svg/check.svg" alt="">
                            <label for="">promote your project for 1 Years</label>
                        </div>
                        <div class="benefit">
                            <img src="../asset/svg/check.svg" alt="">
                            <label for="">show in project recommendations</label>
                        </div> 
                    </div>   
                </div>
                <?php }?>

                <?php if ($paket == '5'){?>
                <div class="list-pricing margin-auto">
                    <div class="head-list-pricing" >
                        <h2>Package 5</h2><br>
                        <label class="">Rp.159.000.-</label><br>
                        <label class="">/Month</label>
                    </div>
                    <div class="content-list-pricing">
                        <div class="benefit">
                            <img src="../asset/svg/check.svg" alt="">
                            <label for="">promote your project for 1 Years</label>
                        </div>
                        <div class="benefit">
                            <img src="../asset/svg/check.svg" alt="">
                            <label for="">show in project recommendations</label>
                        </div>
                        <div class="benefit">
                            <img src="../asset/svg/check.svg" alt="">
                            <label for="">show in top 3 homepage</label>
                        </div>
                        <div class="benefit">
                            <img src="../asset/svg/check.svg" alt="">
                            <label for="">label Sponsor</label>
                        </div>    
                    </div>   
                </div>
                <?php }?>


            </div>
        </div>

        <div class="pricing-3">
                    <div class="head-tabel">
                    <img src="../asset/svg/Line.png" alt=""><h2 for="">Successfully Promoted</h2>
                    </div>
                    <div class="div-tabel">
                        <table class="tabel-1">
                            <thead>
                                <tr>
                                    <th class="th-no"><div class="div-th">No</div></th>
                                    <th class="th-project-id"><div class="div-th">Project Id</div></th>
                                    <th class="th-title"><div class="div-th">Project Title</div></th>
                                    <th class="th-promote"><div class="div-th">Package</div></th>
                                    <th class="th-promote"><div class="div-th">Payment</div></th>
                                    <th class="th-promote"><div class="div-th">Date Expired</div></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                
                                while($rows_2 = mysqli_fetch_assoc($sql_pricing_2)) : ?>
                                <tr>
                                    <td><div class="div-th"><?php echo $i++?></div></td>
                                    <td><div class="div-th"><?php echo $rows_2["projectId"]?></div></td>
                                    <td><div class="div-th"><?php echo $rows_2["projectName"]?></div></td>
                                    <td><div class="div-th"><?php echo $rows_2["pricingPackage"]?></div></td>
                                    <td><div class="div-th"><?php echo $rows_2["payment"]?></div></td>
                                    <td><div class="div-th"><?php echo $rows_2["dateExpired"]?></div></td>
                                </tr>
                                <?php endwhile ;?>
                            </tbody>
                        </table>
                    </div>
        </div>
        <!-- Footer -->
        <footer class="footer">
            <div class="footer-navigation">
                <div class="footer-navigation-item margin-auto">
                    <a href="index.php" class="footer-frame">
                        <div class="footer-text-wrapper-1">Home</div>
                    </a>
                    <a href="about.php" class="footer-frame">
                        <div class="footer-text-wrapper-1">About</div>
                    </a>
                    <a href="pricing.php" class="footer-frame">
                        <div class="footer-text-wrapper-1">Pricing</div>
                    </a>
                    <a href="faqs.php" class="footer-frame">
                        <div class="footer-text-wrapper-1">FAQs</div>
                    </a>
                </div>
                <div class="footer-navigation-button margin-auto">
                    <a
                        href="https://instagram.com"
                        class="footer-social-button"
                        target="_blank"
                        rel="noopener"
                        title="Follow us on Instagram">
                        <span class="visually-hidden">Follow us on Instagram</span>
                        <svg
                            width="32"
                            height="33"
                            viewbox="0 0 32 33"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="ri:instagram-fill">
                                <path
                                    id="Vector-icon"
                                    d="M17.3707 3.1665C18.8707 3.1705 19.632 3.1785 20.2893 3.19717L20.548 3.2065C20.8467 3.21717 21.1413 3.2305 21.4973 3.2465C22.916 3.31317 23.884 3.53717 24.7333 3.8665C25.6133 4.20517 26.3547 4.66384 27.096 5.40384C27.774 6.07037 28.2986 6.87662 28.6333 7.7665C28.9627 8.61584 29.1867 9.58384 29.2533 11.0038C29.2693 11.3585 29.2827 11.6532 29.2933 11.9532L29.3013 12.2118C29.3213 12.8678 29.3293 13.6292 29.332 15.1292L29.3333 16.1238V17.8705C29.3366 18.843 29.3264 19.8156 29.3027 20.7878L29.2947 21.0465C29.284 21.3465 29.2707 21.6412 29.2547 21.9958C29.188 23.4158 28.9613 24.3825 28.6333 25.2332C28.2996 26.1235 27.7748 26.93 27.096 27.5958C26.4293 28.2736 25.6231 28.7982 24.7333 29.1332C23.884 29.4625 22.916 29.6865 21.4973 29.7532C21.181 29.7681 20.8645 29.7814 20.548 29.7932L20.2893 29.8012C19.632 29.8198 18.8707 29.8292 17.3707 29.8318L16.376 29.8332H14.6307C13.6577 29.8365 12.6847 29.8263 11.712 29.8025L11.4533 29.7945C11.1368 29.7825 10.8204 29.7687 10.504 29.7532C9.08533 29.6865 8.11733 29.4625 7.26666 29.1332C6.37689 28.799 5.57095 28.2743 4.90533 27.5958C4.22672 26.9296 3.70163 26.1233 3.36666 25.2332C3.03733 24.3838 2.81333 23.4158 2.74666 21.9958C2.73181 21.6795 2.71847 21.363 2.70666 21.0465L2.7 20.7878C2.67543 19.8156 2.66431 18.8431 2.66666 17.8705V15.1292C2.66294 14.1566 2.67272 13.1841 2.696 12.2118L2.70533 11.9532C2.716 11.6532 2.72933 11.3585 2.74533 11.0038C2.812 9.58384 3.036 8.61717 3.36533 7.7665C3.70015 6.87571 4.22629 6.0692 4.90666 5.40384C5.57212 4.7258 6.37752 4.20115 7.26666 3.8665C8.11733 3.53717 9.084 3.31317 10.504 3.2465C10.8587 3.2305 11.1547 3.21717 11.4533 3.2065L11.712 3.1985C12.6843 3.17481 13.6568 3.16459 14.6293 3.16784L17.3707 3.1665ZM16 9.83317C14.2319 9.83317 12.5362 10.5355 11.286 11.7858C10.0357 13.036 9.33333 14.7317 9.33333 16.4998C9.33333 18.2679 10.0357 19.9636 11.286 21.2139C12.5362 22.4641 14.2319 23.1665 16 23.1665C17.7681 23.1665 19.4638 22.4641 20.714 21.2139C21.9643 19.9636 22.6667 18.2679 22.6667 16.4998C22.6667 14.7317 21.9643 13.036 20.714 11.7858C19.4638 10.5355 17.7681 9.83317 16 9.83317ZM16 12.4998C16.5253 12.4998 17.0454 12.6031 17.5308 12.8041C18.0161 13.005 18.4571 13.2996 18.8286 13.6709C19.2001 14.0423 19.4948 14.4832 19.6959 14.9685C19.897 15.4538 20.0006 15.9739 20.0007 16.4992C20.0007 17.0245 19.8974 17.5446 19.6964 18.03C19.4955 18.5153 19.2009 18.9563 18.8296 19.3278C18.4582 19.6993 18.0173 19.994 17.532 20.1951C17.0467 20.3962 16.5266 20.4998 16.0013 20.4998C14.9405 20.4998 13.923 20.0784 13.1729 19.3283C12.4228 18.5781 12.0013 17.5607 12.0013 16.4998C12.0013 15.439 12.4228 14.4216 13.1729 13.6714C13.923 12.9213 14.9405 12.4998 16.0013 12.4998M23.0013 7.83317C22.5593 7.83317 22.1354 8.00877 21.8228 8.32133C21.5103 8.63389 21.3347 9.05781 21.3347 9.49984C21.3347 9.94186 21.5103 10.3658 21.8228 10.6783C22.1354 10.9909 22.5593 11.1665 23.0013 11.1665C23.4434 11.1665 23.8673 10.9909 24.1798 10.6783C24.4924 10.3658 24.668 9.94186 24.668 9.49984C24.668 9.05781 24.4924 8.63389 24.1798 8.32133C23.8673 8.00877 23.4434 7.83317 23.0013 7.83317Z"
                                    fill="white"/>
                            </g>
                        </svg>
                    </a>
                    <a
                        href="https://linkedin.com"
                        class="footer-social-button"
                        target="_blank"
                        rel="noopener"
                        title="Connect with us on LinkedIn">
                        <span class="visually-hidden">Connect with us on LinkedIn</span>
                        <svg
                            width="32"
                            height="33"
                            viewbox="0 0 32 33"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                id="Vector-icon"
                                d="M9.25338 7.16654C9.25302 7.87378 8.97173 8.55192 8.47139 9.05176C7.97104 9.55161 7.29262 9.83222 6.58538 9.83187C5.87813 9.83152 5.2 9.55022 4.70015 9.04988C4.2003 8.54953 3.91969 7.87111 3.92004 7.16387C3.9204 6.45662 4.20169 5.77849 4.70204 5.27864C5.20238 4.77879 5.8808 4.49818 6.58804 4.49854C7.29529 4.49889 7.97342 4.78018 8.47327 5.28053C8.97312 5.78087 9.25373 6.45929 9.25338 7.16654ZM9.33338 11.8065H4.00004V28.4999H9.33338V11.8065ZM17.76 11.8065H12.4534V28.4999H17.7067V19.7399C17.7067 14.8599 24.0667 14.4065 24.0667 19.7399V28.4999H29.3334V17.9265C29.3334 9.69987 19.92 10.0065 17.7067 14.0465L17.76 11.8065Z"
                                fill="white"/>
                        </svg>
                    </a>
                    <a
                        href="https://twitter.com"
                        class="footer-social-button"
                        target="_blank"
                        rel="noopener"
                        title="Follow us on Twitter">
                        <span class="visually-hidden">Follow us on Twitter</span>
                        <svg
                            width="32"
                            height="33"
                            viewbox="0 0 32 33"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                id="Vector-icon"
                                d="M24.2733 3.5H28.684L19.048 14.5133L30.384 29.5H21.5067L14.5547 20.4107L6.59999 29.5H2.18666L12.4933 17.72L1.62 3.5H10.72L17.004 11.808L24.2733 3.5ZM22.7253 26.86H25.1693L9.39333 6.00133H6.77066L22.7253 26.86Z"
                                fill="white"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="footer-logo">
                <div class="footer-copyright">
                    <div class="footer-text-wrapper-2">casePose</div>
                    <div class="footer-text-wrapper-3">© 2024</div>
                </div>
            </div>
        </footer>
    </body>
</html>