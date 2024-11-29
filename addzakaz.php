<?php
include 'template/head.php';
include 'template/navclient.php';
include 'template/database.php';
session_start();
$id_tovar = $_GET['id_tovar'];
    $sql1 = "SELECT * FROM tovar WHERE id_tovar = '$id_tovar'";
    $result1=$mysqli->query($sql1);
    $row1=mysqli_fetch_assoc($result1);
    if(!empty($_POST)){
      $id_user = $_SESSION['id_user'];
      $id_tovar = $_POST['id_tovar'];
      $amount = $_POST['amount'];
      $adress = $_POST['adress'];
      $sql = "insert into zakaz(id_user, id_tovar, amount, adress) values ('$id_user','$id_tovar','$amount','$adress')";
      var_dump($sql);
      $result=$mysqli->query($sql);
      header ("Location: lkclient.php");
    }
?>
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8"><?php
echo'<br><br><br>
  <form action="addzakaz.php?id_tovar='.$row['id_tovar'].'" method="POST">
      <div class="mb-3">
        <label for="amount" class="form-label">Количество товара</label>
        <input type="nimber" required class="form-control" name="amount" id="amount">
      </div>
      <div class="mb-3">
        <label for="adress" class="form-label">Адрес доставки</label>
        <input type="text" required class="form-control" name="adress" id="adress">
      </div>
      <div class="mb-3">
        <label for="tovar" required class="form-label">Название товара</label>
    <input type="text" disabled class="form-control" value="'.$row1['name_tovar'].'" id="tovar" name="tovar">
  </div>
      </div>
            <div class="col-12 text-center">
            <div class="d-grid gap-2 col-4 mx-auto">
            <td><a href="addzakaz.php?id_tovar='.$row['id_tovar'].'"><button type="submit" class="btn btn-dark text-center">Заказать</button></a>
            </div> 
          </div>    <input type="hidden" value="'.$_GET['id_tovar'].'" id="id_tovar" name="id_tovar">

    </form>';
    ?>


        </div>
        <div class="col-2"></div>
        </div>
        </div>