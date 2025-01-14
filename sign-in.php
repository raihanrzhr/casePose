<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <link rel="icon" href="asset/logo/logo_1.png">
    <title>casePose | Sign In </title>
    <link rel="stylesheet" href="style/global.css">
    <link rel="stylesheet" href="style/style-sign-in.css">
    <body>
    <div class="container_login">
        <div class="container_login_1">
            <label class="label-cp roboto bold ">WELCOME to</label><br>
            <label class="label-cp roboto bold">casePose</label>
        </div>
        <div class="container_login_2">
            <a href="index.php" class="back-button-click"><svg xmlns="http://www.w3.org/2000/svg" class="back-button" >
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
            </svg></a>
            <div class="head-login-rps">
                <div class="logo-case-pose">

                </div>
                <div class="head-login-rps-label">
                    <label for="">casePose</label>
                </div>
            </div>
            
            <div class="label-sign-in">
                <h1>Sign in</h1>
            </div>
            <div class="label-welcome">
                <label class="roboto grey">Welcome back! Please login to your account.</label>
            </div>
            <form method="post" action="php/php-sign-in.php">

                <div class="label-input">
                    <label for="email" class="roboto bold ">Email</label>
                </div>
                <input type="email" id="email" name="email" class="input_1" placeholder="Click here.....">

                <div class="label-input">
                    <label for="password" class="roboto bold ">Password</label><br>
                </div>
                

                <input type="password" id="password" name="password" class="input_1" placeholder="Click here.....">
                <!-- cek pesan notifikasi -->
                <div class="massage">
                    <label class="roboto bold red">
                    <?php 
                    if(isset($_GET['pesan'])){
                        if($_GET['pesan'] == "gagal"){
                            echo "Invalid email or password";
                        }else if($_GET['pesan'] == "kosong"){
                            echo "Make sure the input data is filled in completely";
                        }else if($_GET['pesan'] == "belum_login"){
                            echo "you should Login first";
                        }
                    }?>
                    </label><br>    
                </div>

                <button type="submit" id="signInButton" class="button_1">Sign in</button>
                
                <div class="to-sign-in">
                    <p class="grey " style="text-align: center;">New user? <a href="sign-up.php" class="roboto bold" style="color: rgb(39, 115, 255)">Sign up</a></p>
                </div>
            </form>
            
        </div>
    </div>

</body>
</html>