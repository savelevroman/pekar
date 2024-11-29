<?php
include 'template/head.php';
include 'template/navclient.php';
include 'template/database.php';
session_start();
$sql = "SELECT * FROM zakaz, users WHERE zakaz.id_user = users.id_user";
$result=$mysqli->query($sql);
$row = mysqli_fetch_assoc($result);
?>
<div class="container">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <br>
            <br>
            <h3>Заказы пользователей</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ФИО заказчика</th>
      <th scope="col">Email</th>
      <th scope="col">Товар</th>
      <th scope="col">Количество</th>
      <th scope="col">Статус</th>
    </tr>
  </thead>
<?php
  if (!empty($result)) {
        foreach($result as $row){
$sqll = "SELECT * FROM tovar WHERE id_tovar = ".$row['id_tovar']."";
$result1=$mysqli->query($sqll);
$row1 = mysqli_fetch_assoc($result1);
$summa = $row1['price'] * $row['amount'];
  echo'<tbody>
    <tr>
      <td>'.$row['fio'].'</td>
      <td>'.$row['email'].'</td>
      <td>'.$row1['name_tovar'].'</td>
      <td>'.$row['amount'].'</td>';
      if ($row['status'] == 'новый') {
        echo'<td><a href="status.php?id_zakaz='.$row['id_zakaz'].'"><button type="submit" class="btn btn-primary">Подтвердить</button></a></td>';
      }
      elseif ($row['status'] == 'подтвержден') {
        echo'<td>'.$row['status'].'</td>';
        echo'<td></td>';
      }
    echo'</tr>';
        }
  }
        else {
          echo '<td>Eще нет заказов</td>';
          }

?> 
</tbody>
</table>


        </div>
        <div class="col-1"></div>
        </div>
        </div>