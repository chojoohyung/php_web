<?php
include("./dbconn.php"); // DB연결을 위한 dbconn.php 파일을 인클루드합니다.
// 세션이 있다면, 회원 정보를 가져오고 회원수정 mode로 설정
if(isset($_SESSION['ss_mb_id'])) {
    $mb_id = $_SESSION['ss_mb_id'];
    // 회원 정보를 조회하는 SQL 문
    $sql = " SELECT * FROM member WHERE mb_id = '$mb_id' ";
    $result = mysqli_query($conn, $sql);
    $mb = mysqli_fetch_assoc($result);
    mysqli_close($conn); // 데이터베이스 접속 종료

    $mode = "modify";
    $title = "회원수정";
    $modify_mb_info = "readonly";
    $href = "./member_list.php";
} else {
    $mode = "insert";
    $title = "회원가입";
    $modify_mb_info = '';
    $href = "./index.php";
}
?>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<div class="container">
    <h4 class="display-4 text-center"><?php echo $title ?></h4>

    <form action="./register_update.php" method="post">
        <input type="hidden" name="mode" value="<?php echo $mode ?>">

        <label for="mb_id">아이디</label>
        <div class="mb-3">
            <input type="text"
                   id="mb_id"
                   name="mb_id"
                   class="form-control"
                   value="<?php echo $mb['mb_id'] ?? '' ?>" <?php echo $modify_mb_info ?>>
        </div>
  <label for="mb_name">이름</label>
        <div class="mb-3">
            <input type="text"
                   id="mb_name"
                   name="mb_name"
                   class="form-control"
                   value="<?php echo $mb['mb_name'] ?? '' ?>">
        </div>
           <label for="mb_name">나이</label>
        <div class="mb-3">
            <input type="text"
                   id="mb_age"
                   name="mb_age"
                   class="form-control"
                   value="<?php echo $mb['mb_age'] ?? '' ?>">
        </div>

        <label for="mb_password">비밀번호</label>
        <div class="mb-3">
            <input type="password"
                   id="mb_password"
                   name="mb_password"
                   class="form-control">
        </div>

        <label for="mb_password_re">비밀번호 확인</label>
        <div class="mb-3">
            <input type="password"
                   id="mb_password_re"
                   name="mb_password_re"
                   class="form-control">
        </div>

      

        <label for="mb_email">핸드폰</label>
        <div class="mb-3">
            <input type="text"
                   id="mb_phone"
                   name="mb_phone"
                   class="form-control"
                   value="<?php echo $mb['mb_phone'] ?? '' ?>">
        </div>

        <label>성별</label>
        <div class="mb-3">
            <div class="form-check form-check-inline">
                <input type="radio"
                       class="form-check-input"
                       name="mb_gender"
                       id="gender1"
                       value="남자" <?php echo ($mb['mb_gender'] == "남자") ? "checked" : "";?>>
                <label for="gender1">남자</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio"
                       class="form-check-input"
                       name="mb_gender"
                       id="gender2"
                       value="여자" <?php echo ($mb['mb_gender'] == "여자") ? "checked" : "";?>>
                <label for="gender2">여자</label>
            </div>
        </div>
        <label for="mb_email">주소</label>
        <div class="mb-3">
            <input type="text"
                   id="mb_address"
                   name="mb_address"
                   class="form-control"
                   value="<?php echo $mb['mb_address'] ?? '' ?>">
        </div>

        <label>취미</label>
        <div class="mb-3">
            <div class="form-check form-check-inline">
                <input type="checkbox"
                       id="mb_hobby1"
                       name="mb_hobby[]"
                       class="form-check-input"
                       value="코딩" <?php echo str_contains($mb['mb_hobby'], '코딩') ? 'checked' : '' ?>>
                <label for="mb_hobby1">코딩</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox"
                       id="mb_hobby2"
                       name="mb_language[]"
                       class="form-check-input"
                       value="영화" <?php echo str_contains($mb['mb_hobby'], '영화') ? 'checked' : '' ?>>
                <label for="mb_hobby2">영화</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox"
                       id="mb_hobby3"
                       name="mb_hobby[]"
                       class="form-check-input"
                       value="여행" <?php echo str_contains($mb['mb_hobby'], '여행') ? 'checked' : '' ?>>
                <label for="mb_hobby3">여행</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox"
                       id="mb_hobby4"
                       name="mb_hobby[]"
                       class="form-check-input"
                       value="노래" <?php echo str_contains($mb['mb_hobby'], '노래') ? 'checked' : '' ?>>
                <label for="mb_hobby4">노래</label>
            </div>
        <div class="form-check form-check-inline">
                <input type="checkbox"
                       id="mb_hobby5"
                       name="mb_hobby[]"
                       class="form-check-input"
                       value="축구" <?php echo str_contains($mb['mb_hobby'], '축구') ? 'checked' : '' ?>>
                <label for="mb_hobby5">축구</label>
            </div>
            
            <hr><label for="mb_introduce">자기소개</label>
        <div class="mb-3">
            <input type="text"
                   id="mb_introduce"
                   name="mb_introduce"
                   class="form-control"
                   value="<?php echo $mb['mb_introduce'] ?? '' ?>">
        </div>
           
         
            <label for="mb_photo">대표사진</label>
      
            <div class ="mb-3">
      
         
                <form enctype='multipart/form-data' action='member_list.php' method='post'> <!--html 폼에서 파일을 업로드하기 위해서는 <input> 
                                                                                            태그 내 type 속성 값으로 "file"을 사용하고, 
                                        <form> 태그에 enctype 속성을 적용하고 값으로 "multipart/form-data"를 지정 -->
	<input type='file' name='myfile'>
         <hr><button type="submit" class="btn btn-primary"><?php echo $title ?></button>
        <a href="<?php echo $href ?>" class="btn btn-danger">취소</a>
	
        
</form>
            </div>
            
 

          
            </div>
            



           
    </form>
</div>

</body>
</html>