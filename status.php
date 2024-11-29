<?php include 'template/database.php';
if (!empty($_GET) ) {
    $id_zakaz = $_GET['id_zakaz'];
        $sql = "UPDATE zakaz SET status='подтвержден' WHERE id_zakaz='$id_zakaz'";
        var_dump($sql);
        $result=$mysqli->query($sql);
        var_dump($result);
        header("Location: lkmanager.php");
    }
?>