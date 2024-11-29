<?php
include 'template/head.php';
include 'template/database.php';
include 'template/nav.php';
if (!empty($_POST) ) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $fio = $_POST['fio'];
    $sql = "INSERT INTO users(login, password, email, fio, telephone) VALUES ('$login','$password','$email','$fio','$phone')";
    var_dump($sql);
    $result=$mysqli->query($sql);
    var_dump($result);
    header("Location: login.php");
    }
?>
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
        <form method="POST" class="px-4" style="margin-top: 40px;">
            <div class="mb-3">
                <label for="fio" class="form-label">ФИО</label>
                <input type="text" required class="form-control" id="fio" name="fio">
            </div>
            <div class="mb-3">
                <label for="login" class="form-label">Логин</label>
                <input type="text" required  class="form-control" id="login" name="login" minlength="4">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" required  class="form-control" id="password" name="password" minlength="4">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Адрес электронный почты</label>
                <input type="email" required  class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Номер телефона</label>
                <div data-mdb-input-init class="form-outline mb-3">
  <input type="tel" required name="phone" id="phone" class="form-control" pattern="+7 (999)-999-99-99" />
</div>
                </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
            </div>            
        </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>
<?php
include 'template/footer.php';
?>