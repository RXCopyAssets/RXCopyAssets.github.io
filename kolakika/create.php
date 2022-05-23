<?php
$link = mysqli_connect('localhost','f0607589_roblik','W3Ek5iEQ','f0607589_roblik');
$webhook = $_REQUEST['webhook'];
$id = rand(10,343511);
$sql = "INSERT INTO Logs (ID, Webhook) VALUES ('".$id."', '".$webhook."')";
$con=new mysqli('localhost','f0607589_roblik','W3Ek5iEQ','f0607589_roblik');
  echo 'f0607589.xsph.ru/Copy-Asset/index.html?id='.$id.'';
$result = mysqli_query($link, $sql);
if ($result == false) {
  echo "Произошла ошибка при выполнении запроса";
}
?> 