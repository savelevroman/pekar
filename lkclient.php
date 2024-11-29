<?php
include 'template/head.php';
include 'template/navclient.php';
include 'template/database.php';
session_start();
$id_user = $_SESSION['id_user'];
$sql = "SELECT * FROM zakaz WHERE id_user = '$id_user'";
$result=$mysqli->query($sql);
$row = mysqli_fetch_assoc($result);
?>
<div class="container">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
   
<?php
  if (!empty($result)) {
        foreach($result as $row){
$sqll = "SELECT * FROM tovar WHERE id_tovar = ".$row['id_tovar']."";
$result1=$mysqli->query($sqll);
$row1 = mysqli_fetch_assoc($result1);
$summa = $row1['price'] * $row['amount'];
  echo'<tbody>
    <tr>
      <td>'.$row1['name_tovar'].'</td>
      <td>'.$row['adress'].'</td>
      <td>'.$summa.' Руб</td>
      <td>'.$row['amount'].'</td>';
      if ($row['status'] == 'Подтверждено') {
        echo'<td><a href="comment.php?id_zakaz='.$row['id_zakaz'].'">Подтвердить получение</a></td>';
      }
      else {
        echo'<td>'.$row['status'].'</td>';
      }
      
    echo'</tr>';
        }
  }
        else {
          echo '<td>В вашей корзине еще нет заказов</td>';
          }
?> 
</tbody>
</table>
        </div>
        <div class="col-1"></div>
        </div>
        </div>