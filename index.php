<?php
ob_start();
include 'config.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- aos animation -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- loading bar -->
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="./css/flash.css">
    <title>Hotel blue bird</title>
</head>

<body>
    <!--  carousel -->
    <section id="carouselExampleControls" class="carousel slide carousel_section" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="carousel-image" src="./image/hospital1.jpg">
            </div>
            <div class="carousel-item">
                <img class="carousel-image" src="./image/hospital2.jpg">
            </div>
            <div class="carousel-item">
                <img class="carousel-image" src="./image/hospital3.jpg">
            </div>
            <div class="carousel-item">
                <img class="carousel-image" src="./image/hospital4.jpg">
            </div>
        </div>
    </section>

    <!-- main section -->
    <section id="auth_section">

        <div class="logo">
            <img class="bluebirdlogo" src="./image/metanetlogo.jpg" alt="logo">
            <p>메타넷 병원 예약 시스템</p>
        </div>

        <div class="auth_container">
            <!--============ login =============-->

            <div id="Log_in">
                <h2>로그인</h2>
                <div class="role_btn">
                    <div class="btns active">환자</div>
                    <div class="btns">직원</div>
                </div>

                <!-- // ==userlogin== -->
                <?php
                if (isset($_POST['user_login_submit'])) {
                    $Email = $_POST['Email'];
                    $Password = $_POST['Password'];

                    $sql = "SELECT * FROM signup WHERE Email = '$Email' AND Password = BINARY'$Password'";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        $_SESSION['usermail']=$Email;
                        $Email = "";
                        $Password = "";
                        header("Location: home.php");
                        exit();
                    } else {
                        echo "<script>swal({
                            title: 'Something went wrong',
                            icon: 'error',
                        });
                        </script>";
                    }
                }
                ?>
                <form class="user_login authsection active" id="userlogin" action="" method="POST">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="Username" placeholder=" ">
                        <label for="Username">아이디</label>
                    </div>
                    <div class="form-floating">
                        <input typuser_logine="email" class="form-control" name="Email" placeholder=" ">
                        <label for="Email">이메일</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="Password" placeholder=" ">
                        <label for="Password">비밀번호</label>
                    </div>

                    <button type="submit" name="user_login_submit" class="auth_btn">로그인</button>

                    <div class="footer_line">
                        <h6>아이디가 없으십니까? <span class="page_move_btn" onclick="signuppage()">회원가입</span></h6>
                    </div>
                </form>

                <!-- == Emp Login == -->
                <?php
                    if (isset($_POST['Emp_login_submit'])) {
                        $Email = $_POST['Emp_Email'];
                        $Password = $_POST['Emp_Password'];

                        $sql = "SELECT * FROM emp_login WHERE Emp_Email = '$Email' AND Emp_Password = BINARY'$Password'";
                        $result = mysqli_query($conn, $sql);

                        if ($result->num_rows > 0) {
                            $_SESSION['usermail']=$Email;
                            $Email = "";
                            $Password = "";

                            header("Location: admin/admin.php");
                            exit();
                        } else {
                            echo "<script>swal({
                                title: 'Something went wrong',
                                icon: 'error',
                            });
                            </script>";
                        }
                    }
                ?>
                <form class="employee_login authsection" id="employeelogin" action="" method="POST">
                    <div class="form-floating">
                        <input type="email" class="form-control" name="Emp_Email" placeholder=" ">
                        <label for="floatingInput">이메일</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="Emp_Password" placeholder=" ">
                        <label for="floatingPassword">비밀번호</label>
                    </div>
                    <button type="submit" name="Emp_login_submit" class="auth_btn">로그인</button>
                </form>

            </div>

            <!--============ signup =============-->
            <?php
                if (isset($_POST['user_signup_submit'])) {
                    $Username = $_POST['Username'];
                    $Email = $_POST['Email'];
                    $Password = $_POST['Password'];
                    $CPassword = $_POST['CPassword'];

                    if($Username == "" || $Email == "" || $Password == ""){
                        echo "<script>swal({
                            title: 'Fill the proper details',
                            icon: 'error',
                        });
                        </script>";
                    }
                    else{
                        if ($Password == $CPassword) {
                            $sql = "SELECT * FROM signup WHERE Email = '$Email'";
                            $result = mysqli_query($conn, $sql);

                            if ($result->num_rows > 0) {
                                echo "<script>swal({
                                    title: 'Email already exits',
                                    icon: 'error',
                                });
                                </script>";
                            } else {
                                $sql = "INSERT INTO signup (Username,Email,Password) VALUES ('$Username', '$Email', '$Password')";
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    $_SESSION['usermail']=$Email;
                                    $Username = "";
                                    $Email = "";
                                    $Password = "";
                                    $CPassword = "";
                                    header("Location: home.php");
                                    exit();
                                } else {
                                    echo "<script>swal({
                                        title: 'Something went wrong',
                                        icon: 'error',
                                    });
                                    </script>";
                                }
                            }
                        } else {
                            echo "<script>swal({
                                title: 'Password does not matched',
                                icon: 'error',
                            });
                            </script>";
                        }
                    }

                }
            ?>
            <div id="sign_up">
                <h2>회원가입</h2>

                <form class="user_signup" id="usersignup" action="" method="POST">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="Username" placeholder=" ">
                        <label for="Username">이름</label>
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control" name="Email" placeholder=" ">
                        <label for="Email">이메일</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="Password" placeholder=" ">
                        <label for="Password">비밀번호</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="CPassword" placeholder=" ">
                        <label for="CPassword">비밀번호확인</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="idnum" placeholder=" ">
                        <label for="idnum">주민등록번호</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="address" placeholder=" ">
                        <label for="address">주소</label>
                    </div>

                    <button type="submit" name="user_signup_submit" class="auth_btn">회원가입</button>

                    <div class="footer_line">
                        <h6>이미 계정이 있으십니까? <span class="page_move_btn" onclick="loginpage()">로그인</span></h6>
                    </div>
                </form>
            </div>
    </section>
</body>


<script src="./javascript/index.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- aos animation-->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</html>
