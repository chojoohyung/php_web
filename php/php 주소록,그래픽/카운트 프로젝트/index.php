<?php
$fp = fopen("count.txt", "r+");
$num = fgets($fp, 10);
$num = $num + 1;
rewind($fp);
fputs($fp, $num, 10);
$num = strval($num);
$len = strlen($num);
echo "<center><b>Welcome </b><br><hr>";
echo " 그래픽 이미지를 이용한 카운트 입니다...<br><br>";
for ($s=0; $s <= $len-1; $s++)
{
    echo "<img src = $num[$s].gif >";
}
echo "</center>";
fclose($fp);
?>