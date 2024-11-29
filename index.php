<?php
include 'template/head.php';
include 'template/database.php';
if($userdata['role'] == 'Клиент'){
  include 'template/navclient.php';
}
elseif($userdata['role'] == 'Менеджер'){
  include 'template/navmanager.php';
}
else{
    include 'template/nav.php';
}

?>
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Товар</th>
      <th scope="col">Цена</th>
      <th scope="col">Заказ</th>
    </tr>
  </thead>
  <tbody>
    
          <?php
        $sql = 'SELECT * FROM tovar';
        $result = $mysqli->query($sql);
        $row = mysqli_fetch_assoc($result);
        session_start();
          foreach ($result as $row) {
                echo'<tr>
      <td>'.$row['name_tovar'].'</td>
      <td>'.$row['price'].' рублей</td>
      <td><a href="addzakaz.php?id_tovar='.$row['id_tovar'].'">Заказать</a></td>
    </tr>';
          }
          ?>
  </tbody>
</table>
        </div>
        <div class="col-2"></div>
    </div>
</div>