<?php
session_start();
require_once 'config.php';  // config.php 파일을 포함하여 DB 연결 정보 사용

// 로그인 여부 확인
if (!isset($_SESSION['usermail'])) {
    // 로그인하지 않았다면 로그인 페이지로 리다이렉트
    header("Location: login.php");
    exit();
}

// 로그인된 사용자 이메일
$usermail = $_SESSION['usermail'];
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>관리자 대시보드</title>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./admin/css/roombook1.css">
</head>

<body>
<nav id="aqw">
        <div class="logo">
        <img class="bluebirdlogo" src="./image/metanetlogo.jpg" alt="logo">
        <p>메타넷병원</p>
        </div>
        <ul>

        <a href="./logout.php"><button class="btn btn-danger">로그아웃</button></a>
        </ul>
    </nav>
    <!-- 관리자 대시보드 콘텐츠 -->
    <div class="container mt-5">
   
        <h2>안녕하세요, <?php echo htmlspecialchars($usermail); ?>님!</h2>
        <p>관리자 대시보드에 오신 것을 환영합니다.</p>
        <!-- 예시: 예약 목록 테이블 -->
        <h3>예약 목록</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>예약 ID</th>
                    <th>이름</th>
                    <th>증상</th>
                    <th>진료과</th>
                    <th>예약 일정</th>
                    <th>기타 요청</th>
                </tr>
            </thead>
            <tbody>
                <!-- 여기서는 PHP를 사용하여 데이터베이스에서 예약 목록을 조회하여 출력하는 코드가 들어갑니다 -->
                <?php
                // 이미 config.php에서 DB 연결을 설정했으므로 $conn을 사용하여 쿼리 실행
                $query = "SELECT * FROM reservation";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td>" . htmlspecialchars($row['id']) . "</td>
                            <td>" . htmlspecialchars($row['name']) . "</td>
                            <td>" . htmlspecialchars($row['symptom']) . "</td>
                            <td>" . htmlspecialchars($row['department']) . "</td>
                            <td>" . htmlspecialchars($row['schedule']) . "</td>
                            <td>" . htmlspecialchars($row['require']) . "</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>예약이 없습니다.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- JS 파일 및 Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>

