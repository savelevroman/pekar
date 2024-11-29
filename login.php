<?php
include 'template/head.php';
include 'template/nav.php';
include 'template/database.php';
$msg = '';
if (!empty($_POST)) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE login = '$login' and password = '$password'";
    $result=$mysqli->query($sql);
    if(!empty($result)){
        $userdata = $result->fetch_assoc();
        session_start();
        var_dump($userdata);
        $_SESSION['id_user'] = $userdata['id_user'];
        $_SESSION['role'] = $userdata['role'];
        if($userdata['role'] == 'Клиент'){
        header('location: lkclient.php');
    }
    elseif($userdata['role'] == 'Менеджер'){
        header('location: lkmanager.php');
    }
    else{
        $msg ="Неверный логин или пароль";
    }
}
}
?>
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
        <form method="POST" class="px-4" style="margin-top: 40px;">
            <div class="mb-3">
                <label for="login" class="form-label">Логин</label>
                <input type="text" class="form-control" id="login" name="login">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
        <? echo'<h3>'.$msg.'</h3>';?>
        </div>
        <div class="col-3"></div>
    </div>
</div>
<?php
include 'template/footer.php';
?>