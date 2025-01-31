<?php

include 'config.php';
session_start();

// page redirect
$usermail = "";
$usermail = $_SESSION['usermail'];
if ($usermail == true) {

} else {
  header("location: index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/home.css">
  <title>메타넷병원</title>
  <!-- boot -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <!-- fontowesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- sweet alert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="./admin/css/roombook.css">
  <style>
    #guestdetailpanel {
      display: none;
    }

    #guestdetailpanel .middle {
      height: 450px;
    }
  </style>
</head>

<body>
  <nav>
    <div class="logo">
      <img class="bluebirdlogo" src="./image/metanetlogo.jpg" alt="logo">
      <p>메타넷병원</p>
    </div>
    <ul>
      <li><a href="#firstsection">Home</a></li>
      <li><a href="#secondsection">진료예약</a></li>
      <li><a href="#thirdsection">시설</a></li>
      <li><a href="#contactus">연락처</a></li>
      <a href="./logout.php"><button class="btn btn-danger">로그아웃</button></a>
    </ul>
  </nav>

  <section id="firstsection" class="carousel slide carousel_section" data-bs-ride="carousel">
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

      <div class="welcomeline">
        <h1 class="welcometag">정확한 진단, 따뜻한 치료</h1>
      </div>

      <!-- bookbox -->
      <div id="guestdetailpanel">
        <form action="" method="POST" class="guestdetailpanelform">
          <div class="head">
            <h3>예약</h3>
            <i class="fa-solid fa-circle-xmark" onclick="closebox()"></i>
          </div>
          <div class="middle">
            <div class="guestinfo">
              <h4>환자 정보</h4>
              <input type="text" name="name" placeholder="이름">
              <input id="aa" type="text" name="symptom" placeholder="증상">

            </div>


            <div class="reservationinfo">
              <h4>예약 정보</h4>
              <select name="department" class="selectinput">

                <option value selected>진료과</option>
                <option value="내과">내과</option>
                <option value="외과">외과</option>
                <option value="치과">치과</option>
                <option value="소아과">소아과</option>
                <option value="산부인과">산부인과</option>
                <option value="안과">안과</option>
                <option value="이비인후과">이비인후과</option>
                <option value="피부과">피부과</option>
                <option value="정형외과">정형외과</option>
                <option value="신경과">신경과</option>
                <option value="정신과">정신과</option>
                <option value="비뇨기과">비뇨기과</option>
                <option value="산재진료과">산재진료과</option>
                <option value="신경외과">신경외과</option>
                <option value="심장내과">심장내과</option>
                <option value="심장외과">심장외과</option>
                <option value="소화기내과">소화기내과</option>
                <option value="내분비내과">내분비내과</option>
                <option value="호흡기내과">호흡기내과</option>
                <option value="한방과">한방과</option>
                <option value="알레르기내과">알레르기내과</option>
                <option value="재활의학과">재활의학과</option>
                <option value="감염내과">감염내과</option>
                <option value="심리상담">심리상담</option>
                <option value="치료과">치료과</option>
                <option value="마취과">마취과</option>
                <option value="응급의료과">응급의료과</option>
                <option value="진단검사의학과">진단검사의학과</option>
                <option value="영상의학과">영상의학과</option>
                <option value="약물치료과">약물치료과</option>
                <option value="영양학과">영양학과</option>
                <option value="임상병리과">임상병리과</option>
                <option value="혈액학과">혈액학과</option>
                <option value="간호학과">간호학과</option>
                <option value="재활의학과">재활의학과</option>


              </select>
              예약 날짜
              <input name="schedule" type="date">
              <input id="aaa" type="text" name="require" placeholder="추가요청사항">
            </div>
          </div>
          <div class="footer">
            <button class="btn btn-success" name="guestdetailsubmit">제출</button>
          </div>
        </form>

        <!-- ==== room book php ====-->
        <?php
if (isset($_POST['guestdetailsubmit'])) {
  $name = $_POST['name'];
  $symptom = $_POST['symptom'];
  $department = $_POST['department'];
  $schedule = $_POST['schedule']; // 'yyyy-mm-dd' 형식으로 받아짐
  $require = $_POST['require'];

  // 필수 값 체크
  if ($name == "" || $symptom == "" || $department == "" || $schedule == "") {
      echo "<script>swal({
                  title: 'Fill the proper details',
                  icon: 'error',
              });
              </script>";
  } else {
      $sta = "NotConfirm";
      // 쿼리 실행 (날짜 값은 그대로 사용 가능)
      $sql = "INSERT INTO reservation(`name`, symptom, department, schedule, `require`) 
              VALUES ('$name', '$symptom', '$department', '$schedule', '$require')";
      $result = mysqli_query($conn, $sql);

      if ($result) {
          echo "<script>swal({
                          title: '예약 성공',
                          icon: 'success',
                      });
                  </script>";
      } else {
          echo "<script>swal({
                          title: '모두 채워주세요',
                          icon: 'error',
                      });
                  </script>";
      }
  }
}

        ?>
      </div>

    </div>
  </section>

  <section id="secondsection">
    <img src="./image/homeanimatebg.svg">
    <div class="ourroom">
      <h1 class="head">
        <진료예약>
      </h1>
      <div class="roomselect">
        <div class="roombox">
          <div class="hotelphoto h1"></div>
          <div class="roomdata">
            <h2>내과</h2>

            <button class="btn btn-primary bookbtn" onclick="openbookbox()">에약</button>
          </div>
        </div>
        <div class="roombox">
          <div class="hotelphoto h2"></div>
          <div class="roomdata">
            <h2>외과</h2>

            <button class="btn btn-primary bookbtn" onclick="openbookbox()">에약</button>
          </div>
        </div>
        <div class="roombox">
          <div class="hotelphoto h3"></div>
          <div class="roomdata">
            <h2>특수 진료과</h2>

            <button class="btn btn-primary bookbtn" onclick="openbookbox()">에약</button>
          </div>
        </div>
        <div class="roombox">
          <div class="hotelphoto h4"></div>
          <div class="roomdata">
            <h2>기타 진료과</h2>

            <button class="btn btn-primary bookbtn" onclick="openbookbox()">에약</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="thirdsection">
    <h1 class="head">
      <시설>
    </h1>
    <div class="facility">
      <div class="box">
        <h2>진료실</h2>
      </div>
      <div class="box">
        <h2>검사실</h2>
      </div>
      <div class="box">
        <h2>수술실</h2>
      </div>
      <div class="box">
        <h2>입원 병동</h2>
      </div>
      <div class="box">
        <h2>응급실</h2>
      </div>
    </div>
  </section>

  <section id="contactus">
    <div class="social">
      <i class="fa-brands fa-instagram"></i>

      <i class="fa-solid fa-envelope"></i>
    </div>
    <div class="createdby">
      <h5>메타넷병원 02-1234-5678</h5>
    </div>
  </section>
</body>

<script>

  var bookbox = document.getElementById("guestdetailpanel");

  openbookbox = () => {
    bookbox.style.display = "flex";
  }
  closebox = () => {
    bookbox.style.display = "none";
  }
</script>

</html>
