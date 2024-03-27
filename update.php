<?php
  require_once("db.class.php");

  $db = new Db();

  $Ma_NV = $_POST['Ma_NV'];
  $Ten_NV = $_POST['Ten_NV'];
  $Phai = $_POST['Phai'];
  $Noi_Sinh = $_POST['Noi_Sinh'];
  $Luong = $_POST['Luong'];
  $sql = "update nhanvien set Ten_NV='$Ten_NV', Phai='$Phai', Noi_Sinh='$Noi_Sinh', Luong='$Luong' where Ma_NV=$Ma_NV";
  $result = $db->query_execute($sql);
  $conn->close();
  header("location: index.php");
?>