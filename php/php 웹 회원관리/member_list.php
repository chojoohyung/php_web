
<?php
include("./dbconn.php"); // DB연결을 위한 dbconn.php 파일을 인클루드합니다.
// member 테이블에 등록되어있는 회원의 수를 구함
$sql = " SELECT COUNT(*) AS `cnt` FROM member ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_count = $row['cnt'];
// 회원 목록을 조회
$sql = " SELECT * FROM member ORDER BY mb_datetime desc ";
$result = mysqli_query($conn, $sql);

if (!$_SESSION['ss_mb_id']) {
    echo "<script>alert('로그인 후 사용가능합니다.');</script>";
    echo "<script>location.replace('./index.php');</script>";
}
?>

<html>
    <head>
        <title>Member List</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        


        <div class="container">
            <h4 class="display-4 text-center">회원목록</h4>
            <div class="box">
                <table class="table table-striped">
                    <caption>Total <?php echo number_format($total_count) ?>명</caption>
                    <thead>
                        <tr>
                            <th>번호</th>
                            <th>아이디</th>
                            <th>이름</th>
                            <th>나이</th>
                            <th>휴대폰 번호</th>
                            <th>성별</th>
                            <th>주소</th>
                            <th>관심 취미</th>
                            <th>자기소개</th>
                            <th>대표 사진</th>
                            <th>가입일</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $row = mysqli_fetch_assoc($result); $i++): ?>
                            <tr>
                                <td><?php echo $i + 1 ?></td>
                                <td><?php echo $row['mb_id'] ?></td>
                                <td><?php echo $row['mb_name'] ?></td>
                                <td><?php echo $row['mb_age'] ?></td>
                                <td><?php echo $row['mb_phone'] ?></td>
                                <td><?php echo $row['mb_gender'] ?></td>
                                <td><?php echo $row['mb_address'] ?></td>
                                <td><?php echo $row['mb_hobby'] ?></td>
                                <td><?php echo $row['mb_introduce'] ?></td>
                                <td><?php echo $row['mb_photo'] ?>
                          <?php
 
	echo "<img src='./upload/hey.jpg' >"; 
?>  </td>                              
                                <td><?php echo $row['mb_datetime'] ?></td>
                            </tr>
                        <?php endfor; ?>
                        <?php
                        if ($total_count == 0) { 
                            echo '<tr><td colspan="8">등록된 회원이 없습니다.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>

                <a href="./register.php" class="btn btn-primary">회원정보수정</a>
                <a href="./logout.php" class="btn btn-danger">로그아웃</a>
            </div>
        </div>
        <?php
        mysqli_close($conn); 
        ?>
        
    </body>
</html>