<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Title -->
        <link rel="icon" href="asset/logo/logo_1.png">
        <title>Sign Up</title>
        <!-- <link rel="stylesheet" href="style/style.css"> <link rel="stylesheet"
        href="style/style_2.css"> -->
        <link rel="stylesheet" href="style/style-sign-in.css">
        <link rel="stylesheet" href="style/global.css">
    </head>
    <body>
        <div class="container_login">
            <div class="container_login_1">
                <label class="label-cp-2 roboto bold">CREATE your</label><br>
                <label class="label-cp-2 roboto bold">casePose account</label>
            </div>
            <div class="container_login_3">
                <div class="head-login-rps">
                    <div class="logo-case-pose"></div>
                    <div class="head-login-rps-label">
                        <label for="">casePose</label>
                    </div>
                </div>
                <div class="label-sign-in">
                    <h1>Sign Up</h1>
                </div>

                <div class="label-welcome">
                    <p class="roboto grey">create your account now!</p>
                </div>
                <form method="POST" action="php/php-sign-up.php">
                    <div class="container_reg_1">

                        <div class="container_reg_1_1">
                            <div class="label-input-2">
                                <label for="firstname" class="roboto bold label-input">First name</label>
                            </div>
                            <input
                                name="firstname"
                                type="firstname"
                                class="input_4"
                                placeholder="Click here....."
                                id="firstname">
                        </div>

                        <div class="container_reg_1_2">
                            <div class="label-input-2">
                                <label for="lastname" class="roboto bold ">Last name</label>
                            </div>
                            <input
                                name="lastname"
                                type="lastname"
                                class="input_4"
                                placeholder="Click here....."
                                id="lastname">
                        </div>

                    </div>

                    <div class="label-input-2">
                        <label for="email" class="roboto bold label-input">Email</label>
                    </div>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="input_3"
                        placeholder="Click here.....">

                    <div class="label-input-2">
                        <label for="password" class="roboto bold ">Password</label>
                    </div>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="input_3"
                        placeholder="Click here.....">

                    <div class="label-input-2">
                        <label for="sbpw" class="roboto bold ">Confirm password</label>
                    </div>
                    <input
                        type="password"
                        id="sbpw"
                        name="sbpw"
                        class="input_3"
                        placeholder="Click here.....">

                    <div class="massage">
                        <label class="roboto bold red">
                        <?php 
                    if(isset($_GET['pesan'])){
                        if($_GET['pesan'] == "gagal-upi"){
                            echo "Email input must be in the format @upi or your format input is invalid";
                        }else if($_GET['pesan'] == "kosong"){
                            echo "Make sure the input data is filled in completely";
                        }else if($_GET['pesan'] == "sinkron"){
                            echo "your passwords are out of sync";
                        }else if($_GET['pesan'] == "error"){
                            echo "Sorry, the system is down";
                        }
                    }?>
                        </label><br>
                    </div>

                    <button type="submit" id="SignUpbutton" class="button_1">Sign Up</button>
                </form>
                <div class="to-sign-in">
                    <p class="roboto grey" style="text-align: center;">Have an account?
                        <a href="sign-in.php" class="roboto bold" style="color: rgb(39, 115, 255);">Sign In</a>
                    </p>
                </div>

            </div>
        </div>
        <script src="javascript/registrasi.js"></script>
    </body>
</html>