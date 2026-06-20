<?php
if (isset($_SESSION['uid'])) {
    $UID = $_SESSION['uid'];
    $sql = "SELECT * FROM users WHERE id = $UID";
    $user = $connect->query($sql)->fetch();
}else{
    $user = null;
    $user['role'] = 'guest';
}
if (isset($_POST['exit'])) {
    session_unset();
    echo '<script>location.href="?"</script>';
}
?>