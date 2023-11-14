<html>
    <body>
       <?php
 echo "결과 값";
$num1 = $_POST["num1"]; //index.php에서 num1 POST 전달받음
$num2 = $_POST["num2"]; //index.php에서 POST 전달받음
?>
 <table border="1" cellpadding="1"> <!--더하기,빼기,곱셈,나눗셈을 넣어줄 표 만들기-->
<tr><td>덧셈</td><td>뺄셈</td><td>곱셈</td><td>나눗셈</td></tr><!--여기는 표에 글자 넣음-->
<tr><td><?php echo ($num1+$num2); ?></td><!--num1와 num2의 값을 입력받고 더하기 -->
<td><?php echo ($num1-$num2); ?></td><!--num1와 num2의 값을 입력받고 빼기 -->
<td><?php echo ($num1*$num2); ?></td><!--num1와 num2의 값을 입력받고 곱하기 -->
 <td><?php echo ((double)$num1/$num2); ?></td></tr><!--num1와 num2의 값을 입력받고 나누기 , 대신 나눗셈이기 때문에 실수형을 만들어야해서 double사용 -->
 </body>
 </table>
    </html>