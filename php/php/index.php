<?php
$num1 = isset($_POST["num1"]); //num1 변수 초기화
$num2 = isset($_POST["num2"]); //num2 변수 초기화
?>

        <html>
            <head>
                <meta charset="utf-8">
                <title>웹 기말고사 1번</title>
        </head>
        <body>
            <h1>사칙연산 계산</h1> <!--페이지를 열면 뜨는 말-->
            <form action="result.php" method="POST">             <!--result.php에 POST방식으로 넘겨서 $_POST로 받음-->
                <p><strong>숫자1:</strong>
                    <input type="text" name="num1" value="<?php echo $num1; ?>"></p> <!--type을 text로 써서 num1의 값을 입력-->
                <p><strong>숫자2:</strong>
                <input type="text" name="num2" value="<?php echo $num2; ?>"> <!--type을 text로 써서 num1의 값을 입력-->
                <input type="submit" value="계산하기"></p> <!--submit로 입력된 데이터를 서버로 전달, value로 버튼 내 텍스트 정의-->
            </form>
            </body>
    
        </html>